<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use App\Models\BranchVisit;
use RealRashid\SweetAlert\Facades\Alert; 
use DB;
use Auth;
use Stevebauman\Location\Facades\Location;

class visitController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
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
        ->where('status', '=', 0)
        ->get();
        return view('pages.ShowVisit', compact('visit'));
    }
    public function showVisitHistory()
    {
         $visit = DB::table('branch_visits')
        ->join('users', 'branch_visits.personelID', '=', 'users.prsnl_no')
        ->join('branches', 'branch_visits.branchID', '=', 'branches.branch_no')
        ->select('users.name', 'branches.name as b_name', 'branch_visits.visit_date', 'users.email', 'branch_visits.description', 'branch_visits.id')
        ->where('status', '=', 1)
        ->get();
        return view('pages.ShowVisitHistory', compact('visit'));
    }
    public function showMyVisits()
    {
        $id = Auth::id();
        $myPrsnlNo = User::where('id', '=', $id)->first();
         $visit = DB::table('branch_visits')
        ->join('users', 'branch_visits.personelID', '=', 'users.prsnl_no')
        ->join('branches', 'branch_visits.branchID', '=', 'branches.branch_no')
        ->select('users.name', 'branches.name as b_name', 'branch_visits.visit_date', 'users.email', 'branch_visits.description', 'branch_visits.id', 'branches.adress')
        ->where('status', '=', 0)
        ->where('personelID', '=', $myPrsnlNo->prsnl_no)
        ->get();

        return view('pages.showMyVisits', compact('visit'));
    }
    public function showMyVisitHistory()
    {
        $id = Auth::id();
        $myPrsnlNo = User::where('id', '=', $id)->first();
         $visit = DB::table('branch_visits')
        ->join('users', 'branch_visits.personelID', '=', 'users.prsnl_no')
        ->join('branches', 'branch_visits.branchID', '=', 'branches.branch_no')
        ->select('users.name', 'branches.name as b_name', 'branch_visits.visit_date', 'users.email', 'branch_visits.description', 'branch_visits.id', 'branches.adress')
        ->where('status', '=', 1)
        ->where('personelID', '=', $myPrsnlNo->prsnl_no)
        ->get();

        return view('pages.showMyVisitHistory', compact('visit'));
    }
    public function showComplete(Request $request)
    {
        $id = $request->id;
        $visit = BranchVisit::find($id);
        return view('pages.CompleteVisit', compact('visit'));
    }
    public function complete(Request $request)
    {
        $location = null;
        // Lokasyon
        if ($position = Location::get()) {
            $location = $position->regionName." " . $position->cityName ." ". $position->countryName;

        } else {
            dd('Konum Bilgisi Alınamadı');
        }
    $img = $request->image;
    $folderPath = public_path('img/visit/');
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);

    $id = $request->id;

        BranchVisit::where('id', $id)->update([
            'status'       => 1,
            'image'     => $fileName,
            'updated_at' => date('Y-m-d H:i:s'),
            'description' => $request->description,
            'personel_location' => $location
        ]);
        Alert::success('Başarılı', 'Ziyareti Tamamladınız.');
        return redirect()->route('hompage');

    }
    public function showviewVisit(Request $request)
    {
        $id = $request->id;
        $visit = BranchVisit::where('id', $id)->first();
        $personel = User::where('prsnl_no', '=', $visit->personelID)->first();
        $branch = Branch::where('branch_no', '=', $visit->branchID)->first();
        return view('pages.viewVisit', compact('visit', 'personel', 'branch'));
    }
}
