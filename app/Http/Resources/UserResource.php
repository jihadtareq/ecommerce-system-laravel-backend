<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=> $this->name,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'picture'=> ($this->picture) ? url('/images').'/'.$this->picture:"",
            'typeId'=> $this->type_id,
            'type'=> new UserTypeResource($this->type),
            'createdAt'=> $this->created_at,
            'updatedAt'=> $this->updated_at,
            'accessToken'=> $this->accessToken,
        ];
    }
}
