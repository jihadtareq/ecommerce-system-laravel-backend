<?php

namespace App\Repositories\Eloquent;

use App\Models\CartDetail;
use App\Repositories\Contracts\CartDetailsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class CartDetailsRepository extends BaseRepository implements CartDetailsRepositoryInterface
{

    public function __construct(CartDetail $cartDetail)
    {
        parent::__construct($cartDetail);
    }

    public function getCartDetailByCartAndProduct(int $cartId,int $productId) : ?Model
    {
        return $this->model->where('cart_id',$cartId)
        ->where('product_id',$productId)
        ->first();
    }

    public function updateQuantity(int $id,int $quantity) :bool
    {
       $model =  $this->model->findOrFail($id);
        return  $model->update([
            'quantity'=>$quantity,
        ]);
    }
}
