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
    public function delete(Request $request)
    {
    	$id = $request->prsnlNo;
    	User::where('prsnl_no', $id)->delete();
    	return response()->json([], 200);
    }
}
