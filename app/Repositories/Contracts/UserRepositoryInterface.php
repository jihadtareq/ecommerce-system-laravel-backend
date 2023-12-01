<?php
namespace App\Repositories\Contracts;
use App\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    function getUserByEmail(string $email) : ?Model ;

}