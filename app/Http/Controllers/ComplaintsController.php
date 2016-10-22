<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Complaint;
use Illuminate\Support\Facades\Input;


// use App\View;

class ComplaintsController extends Controller
{
	public function show()
	{
		$complaints=Complaint::all();
		$roomcomplaints=Complaint::where('category','=','room')->get();
		$washroomcomplaints=Complaint::where('category','=','washroom')->get();
		$readingroomcomplaints=Complaint::where('category','=','readingroom')->get();
		$commonroomcomplaints=Complaint::where('category','=','commonroom')->get();
		$tvroomcomplaints=Complaint::where('category','=','tvroom')->get();
		$othercomplaints=Complaint::where('category','=','others')->get();
		// return $complaints;
		return view('complaints.show',compact('complaints','roomcomplaints','washroomcomplaints','readingroomcomplaints','commonroomcomplaints','othercomplaints','tvroomcomplaints'));
	}

	public function display(){
		$complaints=Complaint::all();
		return view('user.complaint',compact('complaints'));
	}


   public function store(){
		$complaints=new Complaint() ;
		$complaints->category = Input::get("category");
		$complaints->sub_category = Input::get("sub_category");
		$complaints->description = Input::get("description");

		$complaints->save();

		return back();
	}
}
