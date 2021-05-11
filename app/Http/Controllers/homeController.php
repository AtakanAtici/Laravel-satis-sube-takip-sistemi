<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
     
    public function showHompage()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect('/giris-yap');
        }
    	else
        {
            return view('hompage');
        }
    }
}
