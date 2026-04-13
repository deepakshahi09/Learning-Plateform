<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quiz extends Model
{
    //
    function category(){
        return $this->BelongsTo(Category::class);
    }
    function Mcq(){
        return $this->hasMany(Mcq ::class);
    }
    function Records(){
        return $this->hasMany(Record::class);
    }
}
