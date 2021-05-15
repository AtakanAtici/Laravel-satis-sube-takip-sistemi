<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use App\Models\BranchVisit;
use RealRashid\SweetAlert\Facades\Alert; 
use DB;

class visitController extends Controller
{
    public function showAdd()
    {
    	$personel = User::where('author_no', '=', '2')->get();
    	$branch   = Branch::all();
    	return view('pages.AddVisit', compact('personel', 'branch'));
    }
    public function add(Request $request)
    {
    	$addVisit =[
    		'personelID' => $request->personelID,
    		'branchID'	 => $request->branchID,
    		'status'	 => 0,
    		'visit_date' => $request->visit_date
    	];

    	BranchVisit::create($addVisit);
    	Alert::success('Başarılı', 'Ziyaret planı başarı ile oluşturuldu');
    	return redirect()->route('hompage');
    }
    public function showVisit()
    {
        $visit = DB::table('branch_visits')
        ->join('users', 'branch_visits.personelID', '=', 'users.prsnl_no')
        ->join('branches', 'branch_visits.branchID', '=', 'branches.branch_no')
        ->select('users.name', 'branches.name as b_name', 'branch_visits.visit_date', 'users.email')
        ->get();
        return view('pages.ShowVisit', compact('visit'));
    }
}
