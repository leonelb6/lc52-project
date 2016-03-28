<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Note;
use App\Card;

class NotesController extends Controller
{
    public function store(Request $request, Card $card)
    {
    	// - testing -
    	//return $request->all();<-good...
    	//return \request::all();
    	//return request()->all();
    	//return $card;

    	// - Option 1 - 
    	// $note= new Note;
    	// $note->body = $request->body;
    	// $card->notes()->save($note);
    	// return back();

    	// - Option 2 - must have the fillable fields that we want to pass
    	// $note= new Note(['body' => $request->body]);
    	// $note->body = $request->body;
    	// $card->notes()->save($note);
    	// return back();

    	// - Option 3 - 
    	// $card->notes()->save(
    	// new Note(['body' => $request->body])
    	// );
    	// return back();

    	// - Option 4 - 
    	// $card->notes()->create(
    	// 	['body' => $request->body]
    	// );
    	// return back();

    	// - Option 5 - 
    	// $card->notes()->create($request->all());
    	// return back();

    	// - Option 6 - //must create a function (addNote) on model
        // $card->addNote(
        //     new Note($request->all())
        // );
        // return back();

        // passing user id
        // $note = new Note($request->all());
        // $note->user_id = 1; //Auth::id();
        // $card->addNote($note);
        // return back();

        // passing user id with method on card.php
        //validate
        $this->validate($request, 
            ['body'=> 'required|min:3']
        );
        $note = new Note($request->all());
        $card->addNote($note, 1);
        return back();
    }
    
    public function edit(Note $note)
    {
    	return view('notes.edit', compact('note'));
    }
    
    public function update(Request $request, Note $note)
    {
    	$note->update($request->all());
    	return back();
    }
    
}