<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cricket_details;
class SportsController extends Controller
{
    public function cricket_details(Request $req){
    	// dd($req->all());
    	$data = new cricket_details();
    	$data->name = $req->name;
    	$data->email = $req->email;
    	$data->mobile = $req->mobile;
    	$data->Department = $req->Department;
    	$data->participate1 = $req->participate1;
    	$data->participate2 = $req->participate2;
    	$data->participate3 = $req->participate3;
    	$data->participate4 = $req->participate4;
    	$data->participate5 = $req->participate5;
    	$data->participate6 = $req->participate6;
    	$data->participate7 = $req->participate7;
    	$data->participate8 = $req->participate8;
    	$data->participate9 = $req->participate9;
    	$data->participate10 = $req->participate10;
    	$data->participate11 = $req->participate11;
    	$data->participate12 = $req->participate12;
    	$data->participate13 = $req->participate13;
    	$data->participate14 = $req->participate14;
    	$data->participate15 = $req->participate15;
    	$data->save();


    }


    public function sports() {
    return view('sports.sports');
	}


	public function events() {
	    return view('events.events');
	}

	public function cricket_registration() {
    return view('sports.cricket_registration');
	}
	public function football_registration(){
		return view('sports.football_registration');
	}
	public function  Kabaddi_registration(){
		return view('sports.Kabaddi_registration');
	}

	public function PUBG_registration(){
		return view('sports.PUBG_registration');
	}
	public function Tennis_registration(){
		return view('sports.Tennis_registration');
	}

}
