<?php
namespace App\Repositories\Contracts;
use Illuminate\Database\Eloquent\Model;

interface CartDetailsRepositoryInterface extends EloquentRepositoryInterface
{
    function getCartDetailByCartAndProduct(int $cartId,int $productId) : ?Model;
    function updateQuantity(int $id,int $quantity) : bool;
}