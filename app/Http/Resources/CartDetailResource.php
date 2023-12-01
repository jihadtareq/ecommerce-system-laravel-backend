<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'cartId'=> $this->cart_id,
            'productId'=> $this->product_id,
            'quantity'=> $this->quantity,
            'price'=> $this->getProductPrice(),
            'product'=> new ProductResource($this->product),
        ];
    }
}
