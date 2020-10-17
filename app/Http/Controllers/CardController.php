<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Category;

class CardController extends Controller
{

    public function index() {
        $cards = Card::orderBy('score', 'desc')->get();
        return view('layouts.card.index',['items'=>$cards]);
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
        // $card = Card::find($card->id);
        // $score = $request->validate(['score' => 'required']);    
        $card->update($request->all());
        return $card;
    }

    public function store(Request $request) {
        $attributes = $request->validate(['name' => 'required','category_id' => 'required', 'score' =>'', 'image' =>'file|image|mimes:png,jpg|max:5000' ,'description' =>'string']);

        $card =Card::create($attributes);

        if($request->has('image')){
            $card->update(
                ['image' => $request->image->store('uploads','public')]
            );    
        }
        return redirect('/cards');
    }


}
