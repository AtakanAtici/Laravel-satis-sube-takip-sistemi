<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class branchController extends Controller
{
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

    	Branch::create($AddBranch);
    	return redirect('/subeler/');
    }





}
