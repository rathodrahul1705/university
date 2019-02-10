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

class details_save extends Controller
{
    public function registration_details_save(Request $request) {

        $this->validate($request,[
            'name'=> 'required|regex:/^[a-zA-Z ]+$/',
            'name1'=> 'required|regex:/^[a-zA-Z ]+$/',
            'dob'=> 'required|date',
            'gender'=> 'required',
            'mobile'=> 'required|numeric|digits:10',
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

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);

        $data = StudentRegistration::all();
        // $object = 
        $obj =DB::table('student_registrations')->where('email', $email)->first();
        
        // dd($obj->email);

        for($i=0;$i<count($data);$i++) {
            if($data[$i]->email == $request->email && $data[$i]->password == $request->password ){
                return redirect('/personal_details');
                // return redirect('/personal_details')->with('success','login Successfully!');
            }
        } 
        return redirect('/login_page')->with('error','Invalid Credentials!');
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
        'address'=> 'required|max:50',
        'student_photo'=> 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        'student_signature'=> 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // dd($errors);


    	$data = new personal_details();
    	$data->name = $request->name;
    	$data->mobile = $request->mobile;
    	$data->email = $request->email;
    	$data->address = $request->address;
    	$data->student_photo = $request->student_photo;
    	$data->student_signature = $request->student_signature;
    	$data->save();
        return redirect('/personal_details');
        // return redirect('/personal_details')->with('success','Personal details saved successfully!');
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
        $data->sub_course = $request->sub_course;
        $data->college_name = $request->college_name;
        $data->marathi = $request->marathi;
        $data->english = $request->english;
        $data->biology = $request->biology;
        $data->chemestry = $request->chemestry;
        $data->mathematics = $request->mathematics;
        $data->percentage = $request->percentage;
        $data->hsc_marksheet = $request->hsc_marksheet;
        $data->save();
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
        $data->save();
        return redirect('/personal_details')->with('success','Category details saved successfully!');
    }
    public function payment_details(Request $request) {
        // dd($request->all());
        $this->validate($request,[
            'Amount'=> 'required|numeric|min:100|max:10000'
        ]);
        $data = new payment_details();
        $data->Amount = $request->Amount;
        $data->save();
        return redirect('personal_details/')->with('success','Payment details saved succesfully');
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


        
        DB::table('student_registrations')->where('email',$request->email)->update(['password'=>$request->new_password, 'c_password'=>$request->confirm_new_password]);


        return redirect('/')->with('forgot_password_success', 'Password Changed Successfully!Please login.');
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
  }
