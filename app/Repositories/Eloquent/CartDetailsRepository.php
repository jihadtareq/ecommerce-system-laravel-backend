<?php

namespace App\Repositories\Eloquent;

use App\Models\CartDetail;
use App\Repositories\Contracts\CartRepositoryInterface;
class CartDetailsRepository extends BaseRepository implements CartRepositoryInterface
{

    public function __construct(CartDetail $cartDetail)
    {
        parent::__construct($cartDetail);
    }
}
