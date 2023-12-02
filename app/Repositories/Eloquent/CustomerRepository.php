<?php

namespace App\Repositories\Eloquent;

use App\Models\Customer;
use App\Repositories\Contracts\CustomerRepositoryInterface;
class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function __construct(Customer $customer)
    {
        parent::__construct($customer);
    }
}
