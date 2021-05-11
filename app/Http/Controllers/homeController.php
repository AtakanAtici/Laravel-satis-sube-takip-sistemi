<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class homeController extends Controller
{
     
    public function showHompage()
    {

        $companyInfo = company::find(1);
        if($companyInfo == null)
        {
            return view('setup.welcome');
        }
        else
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
}
