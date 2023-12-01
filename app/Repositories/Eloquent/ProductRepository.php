<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function setTranslations(Product $product,array $payload): void
    {
        $product->setNameTranslations($payload['name']);
        $product->setDescriptionTranslations($payload['description']);
    }
}
