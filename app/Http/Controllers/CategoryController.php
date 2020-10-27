<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Card;


class CategoryController extends Controller
{
    public function home() {
        return view('Home');
    }

    public function index(){
        $categories = Category::all();

        return $categories;
        // return view('layouts.category.index', ['items' => $categories]);
    }

    public function show(Category $category) {
      $category = Category::find($category->id);
      $cards =Card::inRandomOrder()->where('category_id',$category->id)->get();
      return view('layouts.category.show',['category' =>$category ,'cards'=>$cards]);
    }

    public function store(Request $request){
        $attribute = $request->validate(['name' => 'required' ,'image' =>'file|image|mimes:png,jpg|max:5000']);

        auth()->user()->categories()->create($attribute);
        
        if($request->has('image')){
            $card->update(
                ['image' => $request->image->store('uploads','public')]
            );    
        }        
        return redirect('/');
    }

    public function create() {
        return view('layouts.category.create');
    }

    public function poling(Category $category) {
        $category = Category::find($category->id);

        $cards = Card::inRandomOrder()->where('category_id',$category->id)->get();
        if(count($cards) < 2) {
            return 'تعداد کارت ها کافی نیست';
        }

        if(count($cards) <= 20) {
            $items = $this->cards($category,count($cards));
        }else{
           $items = $this->cards($category,20);
        }
        // inRandomOrder()
        // dd($items);
        return view('layouts.category.poling',['cards'=>$items]);
    }

    private function cards(Category $category,$number) {
         return Card::inRandomOrder()->where('category_id',$category->id)->take($number)->get();
    }


}
