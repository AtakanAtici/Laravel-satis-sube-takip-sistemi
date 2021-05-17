<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function showEdit(Request $request)
    {
        $id = $request->id;
        $personnel = User::find($id);
        return view('pages.EditPersonnel', compact('personnel'));
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $password = $request->password;
        if ($password != null) {
            $password = Hash::make($request->password);
        }
        else{
            $user = User::find($id);
            $password = $user->password;
        }
        
        User::where('id', $id)->update([
            'name'  => $request->name,
            'tel_no' => $request->tel_no,
            'email' => $request->email,
            'sicil_no' => $request->sicil_no,
            'author_no' => $request->author_no,
            'prsnl_no' => $request->prsnl_no,
            'password' => $password,
            'adress' => $request->adress
        ]);
        return redirect()->route('show.personnelList');
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

        $email = $request->email;
        $findEmail = User::where('email', '=', $email)->first();

        $prsnlNo = $request->prsnl_no;
        $findPrsnlNo = User::where('prsnl_no', '=', $prsnlNo)->first();

        if ($findEmail != null)
        {
            Alert::warning('Hata!', 'Bu eposta başka bir kullanıcı için tanımlı.');
            return redirect()->route('show.add.personnel');
        }
        else if($findPrsnlNo != null)
        {
            Alert::warning('Hata!', 'Bu personel numarası başka bir kullanıcı tarafından kullanılıyor.');
            return redirect()->route('show.add.personnel');
        }
        else
        {
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
}
