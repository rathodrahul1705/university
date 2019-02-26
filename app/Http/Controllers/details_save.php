<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UniversityAdmissions;
use App\StudentRegistration;
use App\personal_details;
use App\academic_details;
use App\student_category;
use App\payment_details;
use Mail;
use Response;
use DB;
use PDF;
// use validate;

class details_save extends Controller
{
    public function registration_details_save(Request $request) {

        $this->validate($request,[
            'name'=> 'required|regex:/^[a-zA-Z ]+$/',
            'name1'=> 'required|regex:/^[a-zA-Z ]+$/',
            'dob'=> 'required|date',
            'gender'=> 'required',
            'mobile'=> 'required|numeric|digits:10',
            'address'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|min:6',
            'c_password'=> 'required|same:password|min:6',
        ]);

        $student_registration_data =StudentRegistration::all();
        $warnings = [];
        for($i=0;$i<count($student_registration_data);$i++) {

            $warnings[0] = ($request->mobile == $student_registration_data[$i]->mobile)?'Mobile no. already exists!':'';
            $warnings[1] = ($request->email == $student_registration_data[$i]->email)?'Email already exists!':'';
        }

          $count=0;
          for($i=0;$i<count($warnings);$i++) {
            if($warnings[$i]!='') {
              $count++;
            }
          }


        if($count == 0) {
            $verification_string = md5(microtime());
            $data = new StudentRegistration();

            $data->name = $request->name;
            $data->name1 = $request->name1;
            $data->dob = $request->dob;
            $data->gender = $request->gender;
            $data->mobile = $request->mobile;
            $data->confirm_mobile = $request->confirm_mobile;
            $data->address = $request->address;
            $data->email = $request->email;
            $data->password = $request->password;
            $data->c_password = $request->c_password;
            $data->verification_string = $verification_string;


            $title="Student Registration";
            $message = "Registration is successful.";
            $email = $request->email;

            $message_data = ["message" => $message, "email"=>$email];
            Mail::send('mail_registration', ['title' => $title, 'message_data' => $message_data, 'verification_string'=> $verification_string], function ($message) use($message_data)
             {
                $message->from('rathodrahul1705@gmail.com');
                $message->to($message_data['email'])->subject('Verification of University of Mumbai');
            });
            $data->save();
        }
        else {
            return $warnings;
        }
        
        // return redirect('/')->with('success','Registered Successfully!');
    }

    public function register() {
    	return view('register');   
    }
    public function login_page(){
        return view('welcome');
    }
    public function result_page(){
        return view('result');
    }
    public function Brouchure_page(){
        return view('Brouchure');
    }
    public function Examination_page(){
        return view('Examination');
    }
    public function scholership_page(){
        return view('scholership');
    }
    public function convocation_page(){
        return view('convocation');
    }   
    public function Alumni_page(){
        return view('Alumni');
    }
    public function hostel_page(){
        return view('hostel');
    }
    public function library_page(){
        return view('library');
    }
    public function others_page(){
        return view('others');
    }
    public function arts_page(){
        return view('arts');
    }
    public function commerce_page(){
        return view('commerce');
    }
    public function science_page(){
        return view('science');
    }
    public function law_page(){
        return view('law');
    }
    public function technology_page(){
        return view('technology');
    }
    public function sports_page(){
        return view('sports');
    }
    public function others_page_faculties(){
        return view('others');
    }
    public function about_university(){
        return view('about_university');
    }
    public function contact_page(){
        return view('contact_page');
    }
    public function login_save(Request $request) {
        // dd($request->all());
        $email = $request->email;
        $email_check = !null;
        $mobile_check = !null; 
        // dd(is_numeric($request->username));
        if(is_numeric($request->username)) {
            // dd(1);
            $this->validate($request,[
            'username'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:10',
            'password'=>'required|min:6'
            ]);
            $mobile_check = DB::table('student_registrations')->where('mobile', $request->username)->first();
            $id = DB::table('student_registrations')->where('mobile', $request->username)->where('password', $request->password)->where('verification_string', NULL)->value('id');
            // dd($mobile_check);
        }
        else {
            // dd(1);
            $this->validate($request,[
            'username'=>'required|email',
            'password'=>'required|min:6'
            ]);
            $email_check = DB::table('student_registrations')->where('email', $request->username)->first();
            $id = DB::table('student_registrations')->where('email', $request->username)->where('password', $request->password)->where('verification_string', NULL)->value('id');

        }

        // dd(23);

        $data = StudentRegistration::find($id);
        // dd($id);
        // for($i=0;$i<count($data);$i++) {
        //     if($data[$i]->verification_string==NULL || $data[$i]->verification_string== '') {
        //         if($data[$i]->email == $request->username || $data[$i]->mobile == $request->username){
        //             if($data[$i]->password == $request->password ) {
        //             }
        //         }
        //     } 
        // }
        // dd($data);

        if($data != NULL) { 
            return view("personal_details", ["personal_detail"=>$data]);
        }
        else {
            $ver_string = DB::table('student_registrations')->where('email', $request->username)->value('verification_string');
            $password_check = DB::table('student_registrations')->where('password', $request->password)->first();
            // dd(0==NULL);
            // dd('' == null);
            // dd($ver_string, $mobile_check, $email_check, $password_check);
            if($ver_string != NULL) {
                return redirect('/login_page')->with('warning','Registered but Email not verified, please check your Email inbox!');
            }
            else if($email_check == null && $password_check == null) {

                return redirect('/login_page')->with('error','Entered Email & Password are Invalid.');
            }
            else if($mobile_check == null && $password_check == null) {

                return redirect('/login_page')->with('error','Entered Mobile No. & Password are Invalid.');
            }

            else if($email_check == null) {
                return redirect('/login_page')->with('error','Entered Email is  Invalid.');
            }
            else if($mobile_check == null) {
                // dd(1);
                return redirect('/login_page')->with('error','Entered Mobile No. is  Invalid.');
            }
            else if($password_check == null) {
                return redirect('/login_page')->with('error','Entered Password is  Invalid.');
            }
            // dd(1);
        }      

    }   
    public function personal_details(){
    	return view('personal_details');
    }	
    public function detail_submit(Request $request) {
    	// dd($request);
        $this->validate($request,[
        'name'=> 'required|regex:/^[a-zA-Z ]+$/',
        'mobile'=> 'required|numeric|digits:10',
        'email'=> 'required|email',
        'address'=> 'required|max:100',
        'student_photo'=> 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        'student_signature'=> 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // dd($request->student_photo);
        if($file = $request->hasFile('student_photo')) {
          $file = $request->file('student_photo');
          $student_photo_file_name = $file->getClientOriginalName();
          $destinationPath = public_path().'/assets/imgs/personal_details';
          $file->move($destinationPath,$student_photo_file_name);
        }

        if($file = $request->hasFile('student_signature')) {
          $file = $request->file('student_signature');
          $student_photo_file_name = $file->getClientOriginalName();
          $destinationPath = public_path().'/assets/imgs/personal_details';
          $file->move($destinationPath,$student_photo_file_name);
        }




    	$data = new personal_details();
    	$data->name = $request->name;
    	$data->mobile = $request->mobile;
    	$data->email = $request->email;
    	$data->address = $request->address;
    	$data->student_photo = $request->student_photo;
        $data->student_signature = $request->student_signature;
    	$data->save();

        // $student_data = personal_details::find($request->email);

        // $student_id = $student_data->id;
        // Laravel::log($student_data);

        // print_r($data->id);
        $student_id =$data->id;

        $id = DB::table('student_registrations')->where('email', $request->email)->value('id');

        $data = StudentRegistration::find($id);

        // print_r($data);

        // $personal_detail_obj = personal_details::all();
        // return view('personal_details', ['personal_detail'=>$data, 'student_id'=> $student_id]);
        $personal_data = $data;
        $personal_data['student_id'] = $student_id;

        return Response::json($personal_data);

        // return redirect('/personal_details')->with('success','Personal details saved successfully!', ['personal_detail'=>$data, 'student_id'=>$student_id]);
    }
    public function academic_details(Request $request) {
        // dd($request->all());

        $this->validate($request,[
            'course_year'=>'required|numeric',
            'sub_course'=>'required|regex:/^[a-zA-Z ]+$/',
            'college_name'=>'required|',
            'marathi'=>'required|numeric|between:0,100',
            'english'=>'required|numeric',
            'biology'=>'required|numeric',
            'chemestry'=>'required|numeric',
            'mathematics'=>'required|numeric',
            'percentage'=>'required|numeric',
            'hsc_marksheet'=>'required|mimes:jpg,png,gif,jpeg|max:2048'
            
        ]);

        $data = new academic_details();
        $data->course_year = $request->course_year;
        // $data->personal_details_id = $request->personal_details_id;
        $data->sub_course = $request->sub_course;
        $data->college_name = $request->college_name;
        $data->marathi = $request->marathi;
        $data->english = $request->english;
        $data->biology = $request->biology;
        $data->chemestry = $request->chemestry;
        $data->mathematics = $request->mathematics;
        $data->percentage = $request->percentage;
        $data->hsc_marksheet = $request->hsc_marksheet;
        $data->student_id = $request->student_id;
        $data->save();
        response::json($data);
        // return redirect('/personal_details');
        // return redirect('/personal_details')->with('success','Academic details saved successfully!');
        // return redirect('')
        
    }
    public function student_category(Request $request) {
        // dd($request->all());
        $this->validate($request,[
           'caste_category_status'=>'required', 
           'caste_category'=>'required', 
           'caste_certificate_data'=>'required|mimes:jpg,png,gif,jpeg|max:2048', 
           'ncl_certificate_data'=>'required|mimes:jpg,png,gif,jpeg|max:2048', 
           'cast_validity_certificate_data'=>'required|mimes:jpg,png,gif,jpeg|max:2048', 
           'income_certificate_data'=>'required|mimes:jpg,png,gif,jpeg|max:2048', 
           'Domicile_certificate_data'=>'required|mimes:jpg,png,gif,jpeg|max:2048'


        ]);
        $data = new student_category();
        $data->caste_category_status = $request->caste_category_status;
        $data->caste_category = $request->caste_category;
        $data->caste_certificate_data = $request->caste_certificate_data;
        $data->ncl_certificate_data = $request->ncl_certificate_data;
        $data->cast_validity_certificate_data = $request->cast_validity_certificate_data;
        $data->income_certificate_data = $request->income_certificate_data;
        $data->Domicile_certificate_data = $request->Domicile_certificate_data;
        $data->student_id = $request->student_id;
        $data->save();
        // return redirect('/personal_details')->with('success','Category details saved successfully!');
        $id = DB::table('student_registrations')->where('email', $request->email)->value('id');

        $data = StudentRegistration::find($id);

        // $personal_detail_obj = personal_details::all();
        return view('personal_details', ['personal_detail'=>$data]);

        return view('personal_details',['personal_detail'=>[]]);
    }
    public function payment_details(Request $request) {
        // dd($request->all());
        $this->validate($request,[
            'Amount'=> 'required|numeric|min:100|max:10000'
        ]);
        $data = new payment_details();
        $data->Amount = $request->Amount;
        $data->student_id = $request->student_id;
        $data->save();

        $id = DB::table('student_registrations')->where('email', $request->email)->value('id');

        $data = StudentRegistration::find($id);

        // // $personal_detail_obj = personal_details::all();
        return view('personal_details', ['personal_detail'=>$data]);

        // return redirect('/personal_details')->with('success','Payment details saved succesfully');
    }
    public function forgot_password() {
        // dd(1);
        return view('forgot_password');
            
    }
    public function forgot_password_save(Request $request) {

        $this->validate($request,[
        'email'=>'required',
        'new_password'=>'required|min:6',
        'confirm_new_password'=>'required|same:new_password|min:6'               
        ]);

        $forgot_pswd_verification_string = md5(microtime());

        DB::table('student_registrations')->where('email', $request->email)->update(['forgot_pswd_verification_string'=> $forgot_pswd_verification_string]);

        $title="Student Registration";
        $message = "Registration is successful.";
        $email = $request->email;
        $new_password = $request->new_password;
        $confirm_new_password = $request->confirm_new_password;

        $message_data = ["message" => $message, "email"=>$email];
        Mail::send('forgot_password_mail_confirm', ['title' => $title, 'message_data' => $message_data, 'verification_string'=> $forgot_pswd_verification_string], function ($message) use($message_data) {
            $message->from('rathodrahul1705@gmail.com');
            $message->to($message_data['email'])->subject('Forgot Password Confirmation');
        });

        // return redirect('/login_page')->with('forgot_password_success', 'Password Changed Successfully!Please login.');
        return redirect('/forgot_password')->with('forgot_password_msg', 'Forgot password confirmation mail has been sent to you, please check your inbox!');
    }

    public function confirm_forgot_password($forgot_pswd_verification_string) {
        // dd($forgot_pswd_verification_string);
        $data = StudentRegistration::where('forgot_pswd_verification_string', $forgot_pswd_verification_string)->first();
        // dd($data);
        if($data!=NULL || $data!='') {
            $data->forgot_pswd_verification_string = NULL;
            $email = DB::table('student_registrations')->where('forgot_pswd_verification_string', $forgot_pswd_verification_string)->value('email');
            $data->update();
        }
        // dd($data->forgot_pswd_verification_string);
        if($data->forgot_pswd_verification_string == NULL ) {
            // dd(1);
            DB::table('student_registrations')->where('email', $email)->update(['password'=>$request->new_password, 'c_password'=>$request->confirm_new_password]);
        }

        return view('verification_mail');
    }


    public function verify_mail($verification_string) {
        // dd($verification_string);
        $data = StudentRegistration::where('verification_string', $verification_string)->first();
        // dd($data);
        if($data!=NULL || $data!='') {
            $data->verification_string = NULL;
            $data->update();
        }
        return view('verification_mail');
    }

    public function import_data(){
        $id =69;
        $data = DB::table('personal_details')->where('id', $id)->first();
        dd($data);
        return view('/customer', compact('data'));
    }
    public function export_pdf(){
        // $obj = DB::table('personal_details')
        //     ->leftJoin('academic_details', 'personal_details.id', '=', 'academic_details.id')
        //     ->get();
        //     echo "<pre>";
        //     print_r($obj);

        $id =203;
        $id1 =1;
        $data = DB::table('personal_details')->where('id', $id)->first();
        $data1 = DB::table('academic_details')->where('id', $id1)->first();
        // dd($data->id);
        $pdf = PDF::loadView('customer', compact('data','data1'));
        return $pdf->download('addmission.pdf');

    }


// --------Ajay's Functions-----------
// public function sports() {
//     return view('sports.sports');
// }
// public function events() {
//     return view('events.events');
// }
// public function cricket_registration() {
//     return view('sports.cricket_registration');
// }
// -------------------
  }
