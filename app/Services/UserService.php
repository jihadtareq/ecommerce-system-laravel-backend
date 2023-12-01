<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use App\Http\Resources\UserResource;
use App\Http\Resources\MerchantResource;
use Illuminate\Support\Facades\Auth;
class UserService 
{
    private $userRepository;
    private $merchantService;
    protected $image;
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
 
        $this->setImage($data['picture']);
        $this->hashPassword($data['password']);
        $data['picture'] = $this->image;
        $data['password'] = $this->password;
        $user =  $this->userRepository->create($data);
        $this->merchantService->setMerchantArray($user,$data);
        $this->merchantService->createMerchantDetail();
        $user->accessToken = $user->createToken('users')->accessToken; 
        return new UserResource($user);
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