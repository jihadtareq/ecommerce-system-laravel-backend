<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\Product\ProductRequest;

class ProductController extends Controller
{
    protected $productService;
    
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        try {
            $products = $this->productService->all();
            return response()->json(['message'=>'success','data'=>$products],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
        
    }

    public function create(ProductRequest $request)
    {
       try {
            $product = $this->productService->create($request->all());
            return response()->json(['message'=>'success','data'=>$product],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'failed', 'error'=>$th->getMessage()],500);
        }
    }

    public function show($id)
    {
        try {
            $product = $this->productService->getProductById($id);
            return response()->json(['message'=>'success','data'=>$product],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
    }
    


}
