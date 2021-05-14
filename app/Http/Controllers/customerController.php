<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;    

class customerController extends Controller
{
    public function showCustomer()
    {
    	$customer = Customer::all();
    	return view('pages.ListCustomer', compact('customer'));
    }
     function delete(Request $request)
    {
    	$id = $request->customerNo;
    	Customer::where('customer_no',$id)->delete();
        return response()->json([], 200);
    }
    public function showAdd()
    {
        return view('pages.AddCustomer');
    }
    public function addCustomer(Request $request)
    {
        $customerNo = $request->customer_no;
        $validate = Customer::where('customer_no', $customerNo)->first();
        if($validate)
        {
            Alert::warning('Hata!', 'Müşteri Numarası başka bir müşteri adına kayıtlı.');
            return redirect()->back();

        }
        else if(!$validate)
        {
            $addCustomer = [
                'customer_no' => $request->customer_no,
                'name'        => $request->name,
                'tel_no'      => $request->tel_no,
                'email'       => $request->email,
                'adress'      => $request->adress,
                'owner_name'  => $request->owner_name
            ];
            Customer::create($addCustomer);
            return redirect()->route('show.customer');
        }
    }

    
}
