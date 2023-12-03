<?php

namespace App\Services;

use App\Repositories\Contracts\CustomerRepositoryInterface;
use App\Http\Resources\CustomerResource;
class CustomerService 
{
    private $customerRepository;
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function all()
    {
        return CustomerResource::collection($this->customerRepository->all());
    }

    public function create($payload)
    {
       return new CustomerResource( $this->customerRepository->create($payload));
    }

    public function getCustomerById($id)
    {
        return new CustomerResource($this->customerRepository->findById($id));
    }

    public function updateCustomer($id,$payload)
    {
        return $this->customerRepository->update($id,$payload);

    }

    public function deleteCustomer($id)
    {
        return new CustomerResource($this->customerRepository->deleteById($id));

    }


}