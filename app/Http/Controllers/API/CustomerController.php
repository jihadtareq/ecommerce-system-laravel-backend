<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CustomerService;
class CustomerController extends Controller
{

    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $customers = $this->customerService->all();
            return response()->json(['message'=>'success','data'=>$customers],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $customers = $this->customerService->create($request->all());
            return response()->json(['message'=>'success','data'=>$customers],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $customers = $this->customerService->getCustomerById($id);
            return response()->json(['message'=>'success','data'=>$customers],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->customerService->updateCustomer($id,$request->all());
            return response()->json(['message'=>'success','data'=>'Data updated successfully'],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $customers = $this->customerService->deleteCustomer($id);
            return response()->json(['message'=>'success','data'=>$customers],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);
        }
    }
}
