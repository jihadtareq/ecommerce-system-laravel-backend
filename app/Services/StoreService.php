<?php

namespace App\Services;

use App\Repositories\Contracts\StoreRepositoryInterface;
use App\Http\Resources\StoreResource;
use App\Exceptions\BusinessException;
use Illuminate\Support\Facades\Auth;
class StoreService 
{
    private $storeRepository;
    protected $merchantId;
    public function __construct(StoreRepositoryInterface $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function all()
    {
        return StoreResource::collection($this->storeRepository->all());
    }

    public function setMerchantId()
    {
        $this->merchantId = Auth::user()->id;
    }

    public function create($data)
    {
        $data['merchantId'] = $this->merchantId;
        $store  = $this->storeRepository->create($data);
        return new StoreResource($store);
    }
    public function getStoreById($id)
    {
        $store = $this->storeRepository->findById($id);

        if($store->merchant_id != $this->merchantId)
            throw new BusinessException('not the owner of store');

        return new StoreResource($store);

    }

}