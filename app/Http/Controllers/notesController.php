<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use App\Models\User;
use Auth;

class notesController extends Controller
{
    public function showNotes()
    {
    	$myid = Auth::id();
    	$myRole = User::find($myid);
    	$notes = Notes::join('users', 'users.prsnl_no', '=', 'notes.senderID')->get();
    	return view('pages.ListNotes', compact('notes', 'myRole'));
    }
    public function readNote(Request $request)
    {
    	$id = $request->note_id;

    	$note = Notes::where('note_id', '=' , $id)->get();

    	return view('pages.ReadNotes')->with('note', $note);
    }
}
