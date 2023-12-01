<?php

namespace App\Repositories\Eloquent;

use App\Models\MerchantDetail;
use App\Models\User;
use App\Repositories\Contracts\MerchantRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class MerchantRepository extends BaseRepository implements MerchantRepositoryInterface
{

    public function __construct(MerchantDetail $merchantDetail)
    {
        parent::__construct($merchantDetail);
    }

    public function create(array $payload) : ?Model 
    {
        $payload = $this->customizePayload($payload);
        $model = $this->model->create($payload);
        return $model->fresh();        
    }
    
}
