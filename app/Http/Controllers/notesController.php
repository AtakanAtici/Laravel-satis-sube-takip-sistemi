<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert; 

class notesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
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
    	$note = Notes::where('note_id', '=' , $id)->first();
        $senderID = $note->senderID;
        $user = User::where('prsnl_no', '=', $senderID)->first();


    	return view('pages.ReadNotes', compact('note', 'user'));
    }
    public function showAdd()
    {
        $myID = Auth::id();
        $me = User::where('id', '=', $myID)->first();
        return view('pages.AddNote', compact('me'));
    }
    public function add(Request $request)
    {
        $addNote = [
                'senderID' => $request->senderID,
                'subject'    => $request->subject,
                'to_roleID'  => $request->to_roleID,
                'note'       => $request->note
            ];
            Notes::create($addNote);
            Alert::success('Başarılı', 'Not Gönderildi');
            return redirect()->route('hompage');
    }
}
