<?php

namespace App\Services;

use App\Http\Resources\CartDetailResource;
use App\Repositories\Eloquent\CartDetailsRepository;
class CartDetailsService 
{
    private $cartDetailsRepository;
    protected $cartDetails;
    protected $cartDetailsPayload = [];
    public function __construct(CartDetailsRepository $cartDetailsRepository)
    {
        $this->cartDetailsRepository = $cartDetailsRepository;
    }

    public function all()
    {
        return CartDetailResource::collection($this->cartDetailsRepository->all());
    }
    public function create($cartId,$payload)
    {
       $this->setCartDetails($cartId,$payload);
       return new CartDetailResource($this->cartDetailsRepository->create($this->cartDetailsPayload));
    }

    public function setCartDetails($cartId,$payload)
    {
       $this->cartDetailsPayload = [
            "cartId" => $cartId,
            "productId" => $payload['productId'],
            "quantity" => $payload['quantity'],
       ];

    }

    public function getCartDetailById($id)
    {
       return new CartDetailResource($this->cartDetailsRepository->findById($id));
    }

    public function getCartDetailByCartAndProduct($cartId,$productId)
    {
       return new CartDetailResource($this->cartDetailsRepository->getCartDetailByCartAndProduct($cartId,$productId));
    }

    public function updateQuantity($cartDetailId,$quantity)
    {
        return $this->cartDetailsRepository->updateQuantity($cartDetailId,$quantity);
    }

    public function updateOrCreate($cartId,$payload)
    {
       $cartDetail =  $this->getCartDetailByCartAndProduct($cartId,$payload['productId']);
       if($cartDetail)
       {
          $quantity = $payload['quantity'] + $cartDetail->quantity;
          $this->updateQuantity($cartDetail->id,$quantity);
       }else
       {
          $cartDetail = $this->create($cartId,$payload);
       }
        
    }

}