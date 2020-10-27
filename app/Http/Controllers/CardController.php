<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Category;

class CardController extends Controller
{

    public function index() {
        $cards = Card::orderBy('score', 'desc')->get();
        return $cards;
    }

    public function show(Card $card) {
      $card = Card::find($card->id);

      return view('layouts.card.show',['card'=>$card]);
    }

    public function create() {
        $categories = Category::all();
        return view('layouts.card.create',['categories' => $categories]);
    }

    public function updateScore(Card $card, Request $request) { 
        $card->update($request->all());
        return $card;
    }

    public function store(Request $request) {
        $attributes = $request->validate(['name' => 'required','category_id' => 'required', 'score' =>'', 'image' =>'file|image|mimes:png,jpg,jpeg|max:5000' ,'description' =>'string|max:10']);

        $card =Card::create($attributes);

        if($request->has('image')){
            $card->update(
                ['image' => $request->image->store('uploads','public')]
            );    
        }
        return redirect('/');
    }

    public function delete(Card $post) {
        $post = Card::find($post->id);
        $post->delete();
        return redirect('/');
    }


}
