<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantResource extends UserResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request) + array(
            'commercialRegistrationNumber'=>$this->merchant->commercial_registration_number,
            'taxRegistrationNumber'=>$this->merchant->tax_registration_number
        );
    }
}
