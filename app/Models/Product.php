<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslation;

class Product extends Model
{
    use HasFactory,HasTranslation;

    protected $table='products';
    protected $guarded = [];


    public function store() 
    {
        return $this->belongsTo(Store::class);
    }
    function setName($text,$languageId)
    {
       $this->setTranslation('name',$text,$languageId); 
    }

    function setNameTranslations($textArr)
    {
      $this->setTranslationCollection('name',$textArr); 
    }

    function getName()
    {
      return  $this->getTranslation('name'); 
    }

    function setDescription($text,$language)
    {
       $this->setTranslation('description',$text,$language); 
    }

    function setDescriptionTranslations($textArr)
    {
       $this->setTranslationCollection('description',$textArr); 
    }

    function getDescription()
    {
       return $this->getTranslation('description'); 
    }

    function updateDescriptionTranslations($textArr)
    {
       $this->updateTranslationCollection('description',$textArr); 
    }
    function updateNameTranslations($textArr)
    {
       $this->updateTranslationCollection('name',$textArr); 
    }

    function getNameTranslations()
    {
       return $this->getTranslationsCollection('name'); 
    }

    function getDescriptionTranslations()
    {
       return $this->getTranslationsCollection('description'); 
    }

    public function getStoreVat() 
    {
        return $this->store->vat_percentage;
    }
    public function calculatePriceVat() 
    {
        return $this->price * ($this->getStoreVat()/100);
    }
    public function calculatePrice() 
    {
        return $this->price + $this->calculatePriceVat();
    }
}
