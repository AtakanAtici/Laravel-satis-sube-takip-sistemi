<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Sales;
use App\Models\BranchVisit;
use App\Models\Customer;

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
            if ($user == null) 
            {
                return redirect('/giris-yap');
            }
            else
            {
                $sumSale = Sales::count();
                $sumVisit = BranchVisit::count();
                $sumCustomer = Customer::count();
                $sum = ['sale' => $sumSale, 'visit' => $sumVisit, 'customer' => $sumCustomer ];
                return view('hompage', compact('sum') );
            }
        }
        
    }

   
}
