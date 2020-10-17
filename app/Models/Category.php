<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        return '/categories/' . $this->id;
    }

    public function owner(){
        return $this->belongsTo("App\Models\User");
    }

    public function cards(){
        return $this->hasMany("App\Models\Card", 'category_id');
    }
}
