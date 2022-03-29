<?php

namespace App\Http\Controllers\Api\DoctorApi;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Models\UserToken;
use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class LoginController extends ApiController
{
    private $apiToken;

    public function __construct()
    {
        // Unique Token
        parent::__construct();
        $this->apiToken = uniqid(base64_encode(str_random(100)));
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                $token = $this->apiToken;
                $user_token = $this->UserToken;
                $user_token->user_id = $user->id;
                $user_token->token = $token;
                $user_token->save();
                $user->token = $token;
                return $this->sendResponse('Successfully login', $user);
            } else {
                return $this->sendError(__('please enter valid password'), 200);
            }
        } else {
            return $this->sendError(__('User is not found'), 401);
        }
    }

    public function explore(Request $request)
    {
        $token = $request->header('Authorization');
        $UserData = $this->UserToken->where('token', $token)->first();

        if($token && $UserData) {
            $user_id = $UserData->user_id;
            $totalApp =Appointment::where('is_procedure', '=', 0)
            ->where('seen_by', '=', $user_id )
            ->where('date', Carbon::now()->format('Y-m-d'))
            ->get()
            ->count();

            $completeApp = Appointment::where('is_done', '=', 1)
            ->get()
            ->count();

            $upcomingApp = Appointment::where('is_procedure', '=', 0)
            ->where('seen_by', '=', $user_id )
            ->where('date','>', Carbon::now()->format('Y-m-d'))
            ->get()
            ->count();

            $cancellApp = Appointment::where('arrival_time', '=', null)
            ->where('is_done','=',1)
            ->get()
            ->count();
            $appointmentdata =['today_appointment'=>$totalApp,'completed_appointment'=>$completeApp, 'upcoming_appointment'=>$upcomingApp, 'cancell_appointment'=>$cancellApp];
            return $this->sendResponse('Successfully', $appointmentdata);
        }
        return $this->sendError(__('auth.failed'), 401);
    }

    public function appointment(Request $request)
    {
        $token = $request->header('Authorization');
        $UserData = $this->UserToken->where('token', $token)->first();
        if($token && $UserData) {
            $appointmentList = collect($this->Appointment->select('id','patients_id','category_id','date','time')->get())->map(function($q){
                $q->profile_picture = $q->getPatientsDetails['profile_picture'];
                $q->patient_name = $q->getPatientsDetails['name'];
                $q->category = $q->categoryDetails['name'];
                unset($q->categoryDetails,$q->getPatientsDetails);
                return $q;
            });
            return $this->sendResponse('Your appointment successfully get',$appointmentList);
        }
        return $this->sendError(__('auth.failed'), 401);
    }

    public function notification(Request $request)
    {
        $token = $request->header('Authorization');
        $UserData = $this->UserToken->where('token', $token)->first();
        if($token && $UserData) {
            $appList = Notification::select('id','module','message','updated_at')
            ->where('module','=',1)
            ->get();
            $appointmentList =['AppointmentList'=>$appList];
            return $this->sendResponse('Successfully', $appointmentList);
        }
        return $this->sendError(__('auth.failed'), 401);
    }

    public function doctorprofile(Request $request)
    {
        $token = $request->header('Authorization');
        $userData = $this->UserToken->where('token', $token)->first();
        if($token && $userData) {
            $profileData = User::where('id', $userData->user_id)->first();
            // $data['name'] = $profileData->name;
            // $data['email'] = $profileData->email;
            // $data['password'] = $profileData->password;
            // $data['role'] = $profileData->role;
            // $data['birth_date'] = $profileData->dob_date;
            // $data['designation'] = $profileData->designation;
            // $data['degree'] = $profileData->degree;
            // $data['specialist'] = $profileData->specialist;
            // $data['achievement'] = $profileData->achievement;
            // $data['description'] = $profileData->description;
            // $data['profile_picture'] = $profileData->profile_picture;
            // $data['mobile_number'] = $profileData->mobile_number;
            // $data['status'] = $profileData->status;
            // dd($data);
            return $this->sendResponse('Your DoctorProfile successfully get',$profileData);
        }
        return $this->sendError(__('auth.failed'), 401);
    }
}
