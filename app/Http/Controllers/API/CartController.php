<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Services\CartDetailsService;
use App\Http\Requests\Cart\CartRequest;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    protected $cartService;
    protected $cart;
    protected $cartDetailsService;    
    public function __construct(CartService $cartService,CartDetailsService $cartDetailsService)
    {
        $this->cartService = $cartService;
        $this->cartDetailsService = $cartDetailsService;
    }


    public function create(CartRequest $request)
    {
        try {
            DB::transaction(function () use($request){
                $this->cart = $this->cartService->getOrCreateCart($request->all());
                $this->cartDetailsService->updateOrCreate($this->cart->id,$request->all());
            });
            return response()->json(['message'=>'success','data'=>$this->cart],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'failed', 'error'=>$th->getMessage()],500);
        }
    }

    public function show($id)
    {
        try {
            $cart = $this->cartService->getCartById($id);
            return response()->json(['message'=>'success','data'=>$cart],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
    }
}
