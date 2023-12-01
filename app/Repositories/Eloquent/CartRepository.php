<?php

namespace App\Repositories\Eloquent;

use App\Models\Cart;
use App\Repositories\Contracts\CartRepositoryInterface;
class CartRepository extends BaseRepository implements CartRepositoryInterface
{

    public function __construct(Cart $cart)
    {
        parent::__construct($cart);
    }
}
