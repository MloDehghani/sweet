<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        return '/cards/' . $this->id;
    }

    public function category(){
        return $this->belongsTo("App\Models\Category");
    }
    
}
