<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\BusinessException;
class LoginService 
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getToken($data)
    {
        $user =  $this->userRepository->getUserByEmail($data['email']);
        if($user && Hash::check($data['password'], $user->password))
        {
            $user->accessToken = $user->createToken('users')->accessToken; 
            return new UserResource($user);
        }

        throw new BusinessException("Credentials do not match our records");
            
    }

}