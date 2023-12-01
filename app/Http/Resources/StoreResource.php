<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'includeVat'=>$this->include_vat,
            'vatPercentage'=>$this->vat_percentage,
            'shippingCost'=>$this->shipping_cost,
            'merchant'=>new MerchantResource($this->merchant),

        ];
    }
}
