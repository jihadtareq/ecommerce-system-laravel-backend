<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\StoreService;
use App\Http\Requests\StoreRequest;
class StoreController extends Controller
{
    protected $storeService;

    public function __construct(StoreService $storeService)
    {
        $this->storeService = $storeService;
    }
    public function index()
    {
        try {
            $stores = $this->storeService->all();
            return response()->json(['message'=>'success','data'=>$stores],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
        
    }

    public function create(StoreRequest $request)
    {
       try {
            $this->storeService->setMerchantId();
            $store = $this->storeService->create($request->all());
            return response()->json(['message'=>'success','data'=>$store],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'failed', 'error'=>$th->getMessage()],500);
        }
    }

    public function show($id)
    {
        try {
            $this->storeService->setMerchantId();
            $user = $this->storeService->getStoreById($id);
            return response()->json(['message'=>'success','data'=>$user],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
    }

}
