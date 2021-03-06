<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class setupController extends Controller
{
	public function showSetupWelcome()
	{
		$companyInfo = company::find(1);
        if($companyInfo == null)
        {
            return redirect('kurulum');
        }
        else
        {
            Alert::warning('Kurulum Yapıldı', 'Kurulumu daha önce yaptınız, destek için sistem yöneticisi ile iletişime geçin.');
            return redirect('/giris-yap');
        }
        
		
	}
    public function showAddFirstManager()
    {
    	return view('setup.addFirstManager');
    }
    public function showAddCompany()
    {
    	return view('setup.addCompany');
    }
    public function showSetupDone()
    {
    	return view('setup.setupDone');
    }
    function addFirstManager(Request $request)
    {
    	 $validateData = $request->validate(
            [
                'name'  =>'required|string',
                'email' =>'required|string',
                'tel_no'=>'required|string',
                'password' => 'required|string',
                'prsnl_no' => 'PRSNL-01'
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel_no = $request->tel_no;
        $user->password = Hash::make($request->password);
        $user->author_no = "1";
        $user->save();

        return redirect('kurulum/firma-bilgileri');
    }
    function addCompany(Request $request)
    {
    	 $validateData = $request->validate
        (
            [
                'name'  =>'required|string',
                'sector'=>'required|string',
                'email' =>'required|string',
                'tel_no'=>'required|string',
            ]
        );

        $company = new Company();
        //Companies tablosunda id'si 1 olan veri yoksa kurulum yapacak
        $company->id = 1;
        $company->name = $request->name;
        $company->sector = $request->sector;
        $company->email = $request->email;
        $company->tel_no = $request->tel_no;
        $company->save();

        return redirect('/kurulum/kurulumu-bitir');
    }
}
