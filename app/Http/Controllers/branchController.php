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
}
