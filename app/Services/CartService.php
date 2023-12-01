<?php

namespace App\Services;

use App\Repositories\Contracts\CartRepositoryInterface;
use App\Http\Resources\CartResource;
use App\Repositories\Eloquent\CartDetailsRepository;
use Illuminate\Support\Facades\Auth;
class CartService 
{
    private $cartRepository;
    private $cartDetailsRepository;
    protected $cartPayload = [];
    protected $cartDetailsPayload = [];
    public function __construct(CartRepositoryInterface $cartRepository,CartDetailsRepository $cartDetailsRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->cartDetailsRepository = $cartDetailsRepository;
    }

    public function all()
    {
        return CartResource::collection($this->cartRepository->all());
    }

    public function create($payload)
    {
        $this->setCart($payload);
        $cart = $this->cartRepository->create($this->cartPayload);
       return new CartResource($cart);
    }

    public function setCart($payload)
    {
       $this->cartPayload = [
        "userId" => Auth::user()->id,
       ];

    }
    public function calculateTotalPrice()
    {
        
    }
    public function getCartById($id)
    {
        return new CartResource($this->cartRepository->findById($id));
    }

    public function getOrCreateCart($payload)
    {
        if (Auth::user()->cart) 
        {
            $cart = $this->getCartById(Auth::user()->cart->id);
        }else
        {
            $cart = $this->create($payload);
        }
        return $cart;
    }

}