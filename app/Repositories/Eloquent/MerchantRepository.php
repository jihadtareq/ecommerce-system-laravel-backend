<?php

namespace App\Repositories\Eloquent;

use App\Models\MerchantDetail;
use App\Repositories\Contracts\MerchantRepositoryInterface;
class MerchantRepository extends BaseRepository implements MerchantRepositoryInterface
{

    public function __construct(MerchantDetail $merchantDetail)
    {
        parent::__construct($merchantDetail);
    }
}
