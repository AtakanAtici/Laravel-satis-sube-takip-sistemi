<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\User;
use App\Models\Customer;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert; 

class salesController extends Controller
{
    public function showSales()
    {
    	$sales = DB::table('sales')
    	->join('users', 'sales.personelID', '=' , 'users.prsnl_no')
    	->join('customers', 'sales.customerID', '=' , 'customers.customer_no')
    	->select('customers.name', 'sales.product_name', 'sales.piece', 'sales.piece_price', 'sales.total_price', 'sales.id')->get();	

    	return view('pages.ListSales', compact('sales'));
    }
    public function showSale(Request $request)
    {
    	$id = $request->id;
    	$sales = DB::table('sales')
    	->join('users', 'sales.personelID', '=' , 'users.prsnl_no')
    	->join('customers', 'sales.customerID', '=' , 'customers.customer_no')
    	->select('customers.name','customers.owner_name','customers.email','customers.adress' ,'sales.product_name', 'sales.piece', 'sales.piece_price', 'sales.total_price', 'sales.id', 'sales.created_at')
    	->where('sales.id','=', $id)
    	->first();	

    	return view('pages.showSale', compact('sales'));
    }

    public function showAdd()
    {
    	$id = Auth::id();
    	$user = User::find($id);
    	$customer = Customer::all();
    	return view('pages.AddSale', compact('customer','user'));
    }
    public function add(Request $request)
    {
    	 $addSale = [
                'customerID'  => $request->customerID,
                'personelID'  => $request->personelID,
                'product_name'=> $request->product_name,
                'piece'       => $request->piece,
                'piece_price' => $request->piece_price,
                'sales_note'  => $request->sales_note,
                'total_price' => ($request->piece * $request->piece_price)
            ];
            Sales::create($addSale);
            Alert::success('Başarılı', 'Satış bilgisi başarı ile eklendi');
            return redirect()->route('hompage');
    }
}
