<?php
namespace App\Repositories\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface extends EloquentRepositoryInterface
{
    function setTranslations(Product $product,array $payload) :void;
}