<?php

namespace App\Http\Controllers\Auth;

use App\General\General;
use App\General\PennywiseHandler;
use App\Jobs\ProcessEmailConfirmation;
use App\Mail\EmailConfirmation;
use App\Models\Artisan;
use App\Models\Employee;
use App\Models\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
	use PennywiseHandler;

    private $request;

    private $code;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(Request $request, $type, $ref_by = null)
    {
        $type = strtolower($type);

        if($request->isMethod('Post')){

            $request->email_verification_code = sha1(time());

            switch ($type){
                case 'student' :
                    return $this->Students($request);
                case 'artisan' :
                    return $this->Artisans($request);
                case 'employee' :
                    return $this->Employees($request);
                default:
                    abort(404);
            }
        }

        //For Get request

        $arr = [
            'type' => $type,
            'ref_by' => $ref_by
            ];
        switch ($type){
            case 'student' :
                return view('front-end.student.register', $arr);
            case 'artisan' :
                return view('front-end.artisan.register', $arr);
            case 'employee' :
                return view('front-end.employee.register', $arr);
            default:
                abort(404);
        }

    }
    private function GeneralValidationRule()
    {
        return [
            'ref_by' => 'sometimes|exists:users,ref_code',
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'home_address' => 'required',
            'dob' => 'required|date|before:2005|date_format:Y-m-d',
            'state_of_origin' => 'required|alpha',
            'phone' => 'required|digits:11',
            'name_next_of_kin' => 'required',
            'phone_next_of_kin' => 'required|digits:11',
            'state_next_of_kin' => 'nullable|alpha',
            'business_category' => 'required|exists:business_categories,id',
            'period' => 'required|integer|min:6|max:60',
//            'pennywise' => 'required_without:pennywise_percentage|integer|in:200,500,1000',
            // 'pennywise' => $this->pennywiseValidationArray,
            'gender' => 'required|in:male,female',
            'image' => 'required|image|max:2000',
            'password' => 'required|confirmed|min:6',
        ];
    }

    private function CreateUser($request, $role)
    {
        //Generate referral code
        $code = substr(explode('@', $request->email)[0],0,7);
        $code = General::uniqueRefCode($code);
        $this->code = $code;
        //Upload Image
        if ($request->hasFile('image')){
            $path = 'profile_photos';
            $disk = 'public';
            $uniqueFileName = General::FileName($request->image, $disk, $path);
            $image = $request->file('image')->storeAs(
                $path, $uniqueFileName, $disk
            );
        }

        //Save user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'home_address' => $request->home_address,
            'dob' => $request->dob,
            'state_of_origin' => $request->state_of_origin,
            'phone' => $request->phone,
            'name_next_of_kin' => $request->name_next_of_kin,
            'phone_next_of_kin' => $request->phone_next_of_kin,
            'state_next_of_kin' => $request->state_next_of_kin,
            'business_category_id' => $request->business_category,
            'business_of_interest' => $request->business_of_interest,
            'period' => $request->period,
            // 'pennywise' => $request->pennywise,
            'pennywise' => 0,
            'resident_state' => $request->resident_state,
            'gender' => $request->gender,
            'ref_code' => $code,
            'ref_by' => $request->ref_by ?? null,
            'email_verification_code' => $request->email_verification_code,
            'image' => $image ?? null,
            'status' => 0,
            'role' => $role,
            'password' => Hash::make($request->password)
        ]);

        return $user;
    }


    private function Students(Request $request)
    {
        if($request->isMethod('Post')){

            $validationRules = array_merge($this->GeneralValidationRule(), [
                'name_of_school' => 'required',
                'state_of_school' => 'required|alpha',
                'course' => 'required',
                'parent_guardian_phone' => 'digits:11',
            ]);

            $request->validate($validationRules);

            //Save user
            $user = $this->CreateUser($request, 1);

            $student = new Student([
                'name_of_school' => $request->name_of_school,
                'state_of_school' => $request->state_of_school,
                'course' => $request->course,
                'parent_guardian_phone' => $request->parent_guardian_phone,
            ]);

            $user->students()->save($student);

            //Send confirmation email
            ProcessEmailConfirmation::dispatch(
                $user
            )->onQueue('high');

            return response()->json(["message" => "Successful"], 201);
        }

        return view('front-end.student.register');
    }

    //For Artisans
    private function Artisans(Request $request)
    {
        if($request->isMethod('Post')){

            $validationRules = array_merge($this->GeneralValidationRule(), [
                'trade' => 'required',
            ]);

            $request->validate($validationRules);

            //Save user
            $user = $this->CreateUser($request, 2);

            $artisan = new Artisan([
                'trade' => $request->trade,
            ]);

            $user->artisans()->save($artisan);

            //Send confirmation email
            ProcessEmailConfirmation::dispatch(
                $user
            )->onQueue('high');

            return response()->json(["message" => "Successful"], 201);
        }
        return view('front-end.artisan.register');
    }

    //For Employees
    private function Employees(Request $request)
    {
        if($request->isMethod('Post')) {
            $validationRules = array_merge($this->GeneralValidationRule(), [
                'nature_of_job' => 'required|in:service,construction,production,civil servant,others',
                'position_at_job' => 'required',
//                'pennywise_percentage' => 'required|in:20,30,40,50,60',
                'existing_business' => 'required|in:1,0',
            ]);

            $request->validate($validationRules);

            //Save user
            $user = $this->CreateUser($request, 3);

            $employee = new Employee([
                'nature_of_job'     => $request->nature_of_job,
                'position_at_job'   => $request->position_at_job,
				'has_set_pennywise' => 1,
//                'pennywise_percentage' => $request->pennywise_percentage,
                'existing_business' => $request->existing_business,
            ]);

            $user->employees()->save($employee);

            //Send confirmation email
            ProcessEmailConfirmation::dispatch(
                $user
            )->onQueue('high');

            return response()->json(["message" => "Registration Successful, Verify your email to continue. Kindly check your email Inbox or Spam for verification message."], 201);
        }
        return view('front-end.employee.register');
    }

    public function VerifyUser($refcode, $code)
    {
        $userQuery = User::where([
            'ref_code' => $refcode,
            'email_verification_code' => $code
        ]);
        $user = $userQuery->select('created_at', 'status', 'email')->firstOrFail();

        //Check if already verified
        if($user->status !== 0){
            return redirect()->route('login')->with([
                'message' => 'Account already verified. Please login.'
            ]);
        }

        //Date validation
        $expiryDate = strtotime($user->created_at.' + 2 weeks');
        $today = strtotime('now');

        //Check Expiry
        if($today > $expiryDate){
            return redirect()->route('login')->withErrors([
                'message' => 'Verification link has expired.',
                'resendemail' => $user->email
            ]);
        }

        //Verify and update
        $userQuery->update([
            'status' => 1,
	        'email_verified_at' => Carbon::now()
        ]);

        return redirect()->route('login')->with([
            'message' => 'Email verification successful. Please Login!'
        ]);
    }
}
