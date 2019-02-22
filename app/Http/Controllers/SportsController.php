<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cricket_details;
use App\football_registration;
use App\pubg_registration;
use App\tennis_registration;
use Mail;
use DB;
use PDF;

class SportsController extends Controller
{
    public function cricket_details(Request $req){
    	// dd($req->all());
        $this->validate($req,[
            'name'=> 'required|regex:/^[a-zA-Z ]+$/',
            'mobile'=> 'required|numeric|digits:10',
            'email'=> 'required|email',
            'Department' => 'required',

        ]);

        $verification_string = md5(microtime());
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
        $data->verification_string = $verification_string;

        $title="Student Registration";
            $message = "Registration is successful.";
            $email = $req->email;

            $message_data = ["message" => $message, "email"=>$email];
            Mail::send('sports.cricket.mail_verify_cricket', ['title' => $title, 'message_data' => $message_data, 'verification_string'=> $verification_string], function ($message) use($message_data)
             {
                $message->from('rathodrahul1705@gmail.com');
                $message->to($message_data['email'])->subject('Verification of University of Mumbai');
            });
    	$data->save();

    }

    public function verify_mail_cricket($verification_string){
        $data = cricket_details::all();
        $result = DB::table('cricket_details')->where('verification_string', $verification_string)->first();
        if($result != NULL) {
            return view('sports.cricket.mail_verify_successfull_cricket');
        }
        else {
            
            return view('sports.cricket.mail_verify_failed_cricket');

        }
    }




    // ==============================cricket end=======================================




    public function sports() {
    return view('sports.sports');
	}


	public function events() {
	    return view('events.events');
	}

	public function cricket_registration() {
    return view('sports.cricket.cricket_registration');
	}
	public function football_registration(){
		return view('sports.football.football_registration');
	}
	// public function  Kabaddi_registration(){
	// 	return view('sports.Kabaddi_registration');
	// }

	public function PUBG_registration(){
		return view('sports.pubg.PUBG_registration');
	}
	public function Tennis_registration(){
		return view('sports.tennis.Tennis_registration');
	}




    // ===============================================================================





    public function football_details(Request $req) {
        // dd($req->all());

        $this->validate($req,[
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'mobile' => 'required|numeric|digits:10',
            'email'=>'required',
            'Department' => 'required',

        ]);
        $verification_string = md5(microtime());
        $data = new football_registration();
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
        $data->verification_string = $verification_string;

        $title="Student Registration";
            $message = "Registration is successful.";
            $email = $req->email;

            $message_data = ["message" => $message, "email"=>$email];
            Mail::send('sports.football.mail_verify_football', ['title' => $title, 'message_data' => $message_data, 'verification_string'=> $verification_string], function ($message) use($message_data)
             {
                $message->from('rathodrahul1705@gmail.com');
                $message->to($message_data['email'])->subject('Verification of University of Mumbai');
            });


        $data->save();

    }

    public function verify_mail_football($verification_string) {

        $data = football_registration::all();
        $result = DB::table('football_registrations')->where('verification_string', $verification_string)->first();

        if($result != NULL) {
            return view('sports.football.mail_verify_successfull_football');
        }
        else {
            
            return view('sports.football.mail_verify_failed_football');
        }
    }





    // ==============================football end=========================================


    public function pubg_details(Request $req){
        // dd($req->all());

        $this->validate($req,[
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'mobile' => 'required|numeric|digits:10',
            'email'=>'required',
            'Department' => 'required',

        ]);
        $verification_string = md5(microtime());
        $data = new pubg_registration();
        $data->name = $req->name;
        $data->email = $req->email;
        $data->mobile = $req->mobile;
        $data->Department = $req->Department;
        $data->participate1 = $req->participate1;
        $data->participate2 = $req->participate2;
        $data->participate3 = $req->participate3;
        $data->participate4 = $req->participate4;
        $data->verification_string = $verification_string;

        // $registraion_id = md5(microtime());
        function registrationIdGenerate($length) {
             $token = "";
            $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
             $max = strlen($codeAlphabet); // edited

            for ($i=0; $i < $length; $i++) {
                $token .= $codeAlphabet[random_int(0, $max-1)];
            }

            return $token;
        }

        $id = registrationIdGenerate(5);
        $registration_id = 'CAD'.$id;

        $title="Student Registration";
            $message = "Registration is successful.";
            $email = $req->email;

            $message_data = ["message" => $message, "email"=>$email];
            Mail::send('sports.pubg.mail_verify_pubg', ['title' => $title, 'message_data' => $message_data, 'verification_string'=> $verification_string, 'registration_id' => $registration_id, 'email'=>$email], function ($message) use($message_data)
             {
                $message->from('rathodrahul1705@gmail.com');
                $message->to($message_data['email'])->subject('Verification of University of Mumbai');
            });


        $data->save();

    }

    public function verify_mail_pubg($verification_string) {

        $data = pubg_registration::all();
        $result = DB::table('pubg_registrations')->where('verification_string', $verification_string)->first();

        if($result != NULL) {
            return view('sports.pubg.mail_verify_successful_pubg');
        }
        else {
            
            return view('sports.pubg.mail_verify_failed_pubg');
        }
    }


public function pubgPdfDownload() {
    $id=1;
    $data = DB::table('pubg_registrations')->where('id', $id)->first();
    // dd($data->id);
    $pdf = PDF::loadView('sports.pubg.pubg_user', compact('data'));
    return $pdf->download('pubg_regisraion_detail.pdf');    
}


    // =================================pubg end=========================================





        public function tennis_details(Request $req) {
            // dd($req->all());

            $this->validate($req,[
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'mobile' => 'required|numeric|digits:10',
            'email'=>'required',
            'Department' => 'required',

        ]);

        $verification_string = md5(microtime());
        $data = new tennis_registration();
        $data->name = $req->name;
        $data->email = $req->email;
        $data->mobile = $req->mobile;
        $data->Department = $req->Department;
        $data->participate1 = $req->participate1;
        $data->participate2 = $req->participate2;
        $data->verification_string = $verification_string;


        $title="Student Registration";
            $message = "Registration is successful.";
            $email = $req->email;

            $message_data = ["message" => $message, "email"=>$email];
            Mail::send('sports.tennis.mail_verify_tennis', ['title' => $title, 'message_data' => $message_data, 'verification_string'=> $verification_string], function ($message) use($message_data)
             {
                $message->from('rathodrahul1705@gmail.com');
                $message->to($message_data['email'])->subject('Verification of University of Mumbai');
            });
        $data->save();

        }
        public function verify_mail_tennis($verification_string) {
        $data = tennis_registration::all();
        $result = DB::table('tennis_registrations')->where('verification_string', $verification_string)->first();

        if($result != NULL) {
            return view('sports.tennis.mail_verify_successful_tennis');
        }
        else {
            
            return view('sports.tennis.mail_verify_failed_tennis');
        }

        }

        // =====================================tennis end==============================
}
