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

    protected $totalPrice = 0;
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
       return new CartResource( $this->cartRepository->create($this->cartPayload));
    }

    public function setCart($payload)
    {
       $this->cartPayload = [
        "userId" => Auth::user()->id,
       ];

    }
    public function calculateTotalPrice($details)
    {
        foreach ($details as  $detail) 
        {
            $this->totalPrice += $detail->calculatePrice();
        }
        
    }
    public function getCartById($id)
    {
        $cart = $this->cartRepository->findById($id);
        $this->calculateTotalPrice($cart->details);
        $cart->totalPrice = $this->totalPrice;
        return new CartResource($cart);
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