<?php

namespace App\Traits;
use App\Models\Translation;
use App\Models\Language;
use App;
trait HasTranslation
{
    public $languageId;
    public $language;
    public function __construct()
    {
        // $this->language = App::getLocale();
        $this->language = request()->header('Language') ?? 'en';
        $this->with[]="translations.language";
    }


    public function translations(){

        return $this->morphMany(Translation::class,'translatable')->orderBy('created_at','desc');
        
    }
    public function setTranslation($fieldName,$text,$languageId)
    {
        $this->translations()->create([
            'field_name'=>$fieldName,
            'text'=>$text,
            'language_id'=>$languageId,

        ]);
    }

    public function setTranslationCollection($fieldName,$textArr)
    {
        foreach ($textArr as $language => $text) {
            $languageId  = Language::where('language',$language)->first()->id;
            $this->setTranslation($fieldName,$text,$languageId);
        }
    }
    

    public function getTranslation($fieldName,$language = null)
    {
        $this->languageId = Language::where('language',$this->language)->first()->id ?? config('settings.languages.englishId');

       return $this->translations()->where('field_name',$fieldName)
        ->where('language_id',$this->languageId)
        ->first()->text ?? null;
    }

    public function updateTranslation($fieldName,$text,$languageId)
    {
       return $this->translations()
        ->where('field_name',$fieldName)
        ->where('language_id',$languageId)
        ->update([
            'text'=>$text,
        ]);
    }

    public function updateTranslationCollection($fieldName,$textArr)
    {
        foreach ($textArr as $language => $text) {
            $languageId  = Language::where('language',$language)->first()->id;
            $translateField = $this->updateTranslation($fieldName,$text,$languageId);
            if(!$translateField)
                $this->setTranslation($fieldName,$text,$languageId);
        }
    }

    public function getTranslationsCollection($fieldName)
    {
        return $this->translations()->where('field_name',$fieldName)->get();
    }

}