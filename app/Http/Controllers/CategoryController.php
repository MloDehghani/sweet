<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return Category::all();
    }

    public function show(Category $category) {
      return Category::find($category);
    }

    public function store(Request $request){
        $attribute = $request->validate(['name' => 'required']);

        auth()->user()->categories()->create($attribute);

        return redirect('/categories');
    }

    public function create() {
        return ['a'];
    }
}
