<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Company;
use Auth;

class branchController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function showBranches()
    {
    $list = Branch::all();
    return view('pages.ListBranches', compact('list'));    
    }
    function addNewBranchShow()
    {
		$branchNo = rand();
    	return view('pages.AddBranch', compact('branchNo'));
    }
    function showEdit(Request $request)
    {
        $id = $request->id;
        $branchInfo = Branch::find($id);
        return view('pages.EditBranch', compact('branchInfo'));
    }

    function addNewBranch(Request $request)
    {
    	$AddBranch = [
    		'name' => $request->name,
    		'author_name' => $request->author_name,
    		'tel_no' => $request->tel_no,
    		'author_tel' => $request->author_tel,
    		'email' => $request->email,
    		'start_date' => $request->start_date,
    		'branch_no' => $request->branch_no,
    		'adress' => $request->adress
    	];

    	$add = Branch::create($AddBranch);
        if ($add) {
            return redirect('/subeler/');
        }
        else{
            Alert::warning('Hata!', 'Beklenmedik bir hata oluştu');
            return redirect('/giris-yap');
        }
    	
    }

    function deleteBranch(Request $request)
    {
    	$id = $request->branchNo;
    	Branch::where('branch_no',$id)->delete();
        return response()->json([], 200);
    }

    function edit(Request $request)
    {
        $id = $request->id;
        Branch::where('id', $id)->update([
            'name'  => $request->name,
            'author_name' => $request->author_name,
            'tel_no' => $request->tel_no,
            'author_tel' => $request->author_tel,
            'email' => $request->email,
            'start_date' => $request->start_date,
            'branch_no' => $request->branch_no,
            'adress' => $request->adress
        ]);
        return redirect()->route('show.branchList');
    }




}
