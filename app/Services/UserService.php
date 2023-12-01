<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use App\Http\Resources\UserResource;
use App\Http\Resources\MerchantResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserType;
class UserService 
{
    private $userRepository;
    private $merchantService;
    protected $image;
    protected $user;
    protected $password;
    public function __construct(UserRepositoryInterface $userRepository,MerchantService $merchantService)
    {
        $this->userRepository = $userRepository;
        $this->merchantService = $merchantService;
    }

    public function all()
    {
        return UserResource::collection($this->userRepository->all());
    }

    public function register($data)
    {
 
        $this->hashPassword($data['password']);
        $data['password'] = $this->password;
        if(isset($data['picture']))
        {
            $this->setImage($data['picture']);
            $data['picture'] = $this->image;
        }
        DB::transaction(function () use($data){
            $this->user =  $this->userRepository->create($data);
            if($this->user->getType() == UserType::MERCHANT)
            {
                $this->merchantService->setMerchantArray($this->user,$data);
                $this->merchantService->createMerchantDetail();
            }
            $this->user->accessToken = $this->user->createToken('users')->accessToken; 
        });
        return new UserResource($this->user);
    }

    public function setImage($image)
    {
        $this->image = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $this->image);
    }

    public function hashPassword($password)
    {
        $this->password =bcrypt($password);
    }


    public function getUser()
    {
        $userId = Auth::user()->id;
        return (Auth::user()->type_id == 2) ? new UserResource($this->userRepository->findById($userId)) : new MerchantResource($this->userRepository->findById($userId)) ;

    }
    public function getUserById($id)
    {
        return new UserResource($this->userRepository->findById($id));

    }

}