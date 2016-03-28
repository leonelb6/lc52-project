<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	public function notes()
	{
		return $this->hasMany(Note::class);
	}
	
   // to make option 6 work
   public function addNote(Note $note, $userid)
   {
   	$note->user_id=$userid;
   	return $this->notes()->save($note);
   }
}
