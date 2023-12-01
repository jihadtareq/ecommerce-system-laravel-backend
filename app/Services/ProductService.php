<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Resources\ProductResource;
use App\Exceptions\BusinessException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProductService 
{
    private $productRepository;
    protected $image;
    protected $product;
    protected $productPayload = [];
    protected $translationsPayload = [];
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        return ProductResource::collection($this->productRepository->all());
    }

    public function setMerchantId()
    {
        $this->merchantId = Auth::user()->id;
    }

    public function create($payload)
    {
        
        $this->setImage($payload['image']);
        $this->setProduct($payload);
        $this->setProductTranslations($payload);
        DB::transaction(function () use($payload){
           $this->product  = $this->productRepository->create($this->productPayload);
           $this->productRepository->setTranslations($this->product,$this->translationsPayload);
        });
       return new ProductResource($this->product);
    }

    public function setProduct($payload)
    {
       $this->productPayload = [
        "storeId" => $payload['storeId'],
        "availableQuantity" => $payload['availableQuantity'],
        "price" => $payload['price'],
        "image" => $this->image,
       ];

    }

    public function setProductTranslations($payload)
    {
        $this->translationsPayload = [
            "name" => $payload['name'],
            "description" => $payload['description']
        ];

    }

    public function setImage($image)
    {
        $this->image = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('products'), $this->image);
    }
    public function getProductById($id)
    {
       return new ProductResource($this->productRepository->findById($id));
    }

}