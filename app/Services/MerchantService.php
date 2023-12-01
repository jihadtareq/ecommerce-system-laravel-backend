<?php

namespace App\Services;

use App\Repositories\Contracts\MerchantRepositoryInterface;
use App\Http\Resources\MerchantResource;
use Illuminate\Support\Facades\Auth;
class MerchantService 
{
    private $userRepository;
    private $merchantDetailRepository;

    protected $image;
    protected $password;
    protected $merchantArray = [];
    public function __construct(MerchantRepositoryInterface $merchantDetailRepository)
    {
       $this->merchantDetailRepository = $merchantDetailRepository;

    }

    public function setMerchantArray($user,$data) 
    {
        $this->merchantArray = [
            'userId'=>$user->id,
            'commercialRegistrationNumber'=>$data['commercialRegistrationNumber'],
            'taxRegistrationNumber'=>$data['taxRegistrationNumber'],
        ];
        
    }

    public function createMerchantDetail()
    {
        $merchant = $this->merchantDetailRepository->create($this->merchantArray );
        return new MerchantResource($merchant);

    }

}