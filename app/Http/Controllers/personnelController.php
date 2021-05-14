<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function showAddNewPersonnel()
    {
        return view('pages.AddPersonnel');
    }

    function addPersonnel(Request $request)
    {
        $validateData = $request->validate(
            [
                'name'  =>'required|string',
                'email' =>'required|string',
                'tel_no'=>'required|string',
                'password' => 'required|string',
                'prsnl_no' => 'required|string'
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel_no = $request->tel_no;
        $user->prsnl_no = $request->prsnl_no;
        $user->sicil_no = $request->sicil_no;
        $user->password = Hash::make($request->password);
        $user->author_no = $request->author_no;
        $user->adress = $request->adress;
        $user->save();

        return redirect()->route('show.personnelList');
    }
}
