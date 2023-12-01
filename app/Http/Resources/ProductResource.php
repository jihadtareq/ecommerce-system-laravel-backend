<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'image'=> ($this->image) ? url('/products').'/'.$this->image:"",
            'storeId'=>$this->store_id,  
            'price'=>$this->price,  
            'availableQuantity'=>$this->available_quantity,  
            'store'=>new StoreResource($this->store),  
        ];
    }
}
