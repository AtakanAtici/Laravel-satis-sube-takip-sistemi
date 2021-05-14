<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class personnelController extends Controller
{
    public function showList()
    {
    	$user = User::all();
    	return view('pages.ListPersonnel', compact('user'));
    }
}
