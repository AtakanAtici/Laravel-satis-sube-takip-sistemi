<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;	

class authController extends Controller
{
    public function showLogin()
    {
    	return view('auth.login');
    }

    function login(Request $request)
    {
        $remember = $request->remember;
    	 if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $passH = Hash::make($request->password);
            $email = $request->email;
            $userInfo = User::query()
            ->where('email' , $email)
            ->where('password', $passH)
            ->get();
            return redirect('/');
           }
           else
           {
           	Alert::warning('Hatalı Giriş', 'Kullanıcı adı veya şifreniz hatalı');
            return redirect('/giris-yap');
           }
    }

}
