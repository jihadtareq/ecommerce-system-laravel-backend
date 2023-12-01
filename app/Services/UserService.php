<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Resources\UserResource;
class UserService 
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return UserResource::collection($this->userRepository->all());
    }

    public function register($data)
    {
        $pictureName = time().'.'.$data['picture']->getClientOriginalExtension();
        $data['picture']->move(public_path('images'), $pictureName);
        $data['picture'] = $pictureName;
        $data['password'] = bcrypt($data['password']);
        $user =  $this->userRepository->create($data);
        $user->accessToken = $user->createToken('users')->accessToken; 
        return new UserResource($user);
    }

    public function getUserById($id)
    {
        return new UserResource($this->userRepository->findById($id));

    }

}