<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class IntroHowWork extends BaseModel
{
    use HasTranslations;
    const IMAGEPATH = 'how_works' ;

    const searchAttributes = ['title'];
    protected $fillable = ['title','image'];
    public $translatable = ['title'];
    
}
