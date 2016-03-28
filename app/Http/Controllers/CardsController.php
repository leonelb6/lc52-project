<?php

namespace App\Http\Controllers;

//use DB;
use App\Card;
use Illuminate\Http\Request;

use App\Http\Requests;

class CardsController extends Controller
{
    public function index()
    {
    	//$cards = DB::table('cards')->get();
    	$cards = Card::all();
    	return view('cards.index', compact('cards'));
    }

    //public function show($id)
    //{
    //	$card = Card::find($id);
    	//return $card;
    //	return view('cards.show', compact('card'));
    //}
    
    	// width type hitting (hint what i want)
    public function show(card $card)
    {
    	$card->load('notes.user');
    	//return $card;

    	return view('cards.show', compact('card'));
    }
}
