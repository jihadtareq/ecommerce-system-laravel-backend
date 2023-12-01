<?php

namespace App\Repositories\Eloquent;

use App\Models\Store;
use App\Repositories\Contracts\StoreRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{

    public function __construct(Store $store)
    {
        parent::__construct($store);
    }

    public function all(array $columns = ['*'],array $relations = []) :Collection
    {
        return $this->model->where('merchant_id',Auth::user()->id)->with($relations)->get($columns);
    }
    
}
