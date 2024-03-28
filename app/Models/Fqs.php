<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Fqs extends BaseModel
{
    use HasTranslations;

    const searchAttributes = ['question','answer'];
    protected $fillable = ['question','answer'];
    public $translatable = ['question','answer'];
    
}
