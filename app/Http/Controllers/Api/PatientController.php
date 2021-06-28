<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\Api\ApiController;
use App\Models\OpdPatients;
use Carbon\Carbon;
use Validator;
use File;
// {{candorivf}}/getPaientDetails
class PatientController extends ApiController
{
    /**
    * Return Patient detail
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function getPaientDetails(Request $request) {
        $token = $request->header('Authorization');
        // $user = OpdPatients::where('token', $token)->first();
        $get_token = $this->PatientToken->where('token', $token)->first();
        // $user->age = $user->age ? (string)$user->age : null;
        if ($get_token) {
            $user = $this->OpdPatients->where('id', $get_token->patients_id)->first();
            return $this->sendResponse('Get Patient Details', $user);
        } else {
            return $this->sendError('User is not found');
        }
        return $this->sendError(__('auth.failed'), 401);
    }   

    /**
    * Update patient profile
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function updateProfilePicture(Request $request) {
        $token = $request->header('Authorization');
        $get_token = $this->PatientToken->where('token', $token)->first();
        if($token && $get_token) {
            $rule = [
                'profile_picture' => 'required',
            ];
        
            $validator = Validator::make($request->all(),$rule);
            if($validator->fails()){
                return $this->sendError($validator->errors()->first(), 422);
            }
            $patientData = OpdPatients::where('id', $get_token->patients_id)->first();
            $file_name = basename($patientData->profile_picture);
            $image_path = "public/upload/patient/".$file_name;
            
           /* if(File::exists($image_path)) {
                File::delete($image_path);
            }*/

            /*$patientData->dob = $request->dob ? Carbon::parse($request->dob)->format('Y-m-d') : null; 
            $patientData->age = Carbon::parse($request->dob)->diff(Carbon::now())->format('%y years');*/

            // $patient = OpdPatients::find($patientData->id);
            if ($request->hasFile('profile_picture')) {
                $this->removeImage($image_path);
                $image = $request->file('profile_picture');
                $profilePicture = $this->uploadImage($image, 'public/upload/patient');
                $patientData->profile_picture = url('public/upload/patient/'.$profilePicture);
            }
            $patientData->save();
            return $this->sendResponse('Update patient profile successfully',$patientData);
        }
        return $this->sendError(__('auth.failed'), 401);
    }

    /**
    * Add patient profile
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function add_profile(Request $request)
    {
        $token = $request->header('Authorization');
        $get_token = $this->PatientToken->where('token', $token)->first();
        if ($get_token) {
            $user = OpdPatients::where('id', $get_token->patients_id)->first();
            if ($user && !empty($user->code)) {         
                $rule = [
                    'surname' => 'required',
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'dob' => 'required',
                    // 'dob' =>'nullable|before:' . date('Y-m-d'),
                    'gender' => 'required|in:1,2',
                    ];

                    $validator = Validator::make($request->all(),$rule);
                        if($validator->fails()){
                            return $this->sendError($validator->errors()->first(), 422);
                    }

                $surname = $request->surname;
                $firstname = $request->firstname;
                $lastname = $request->lastname;
                $name = strtoupper($firstname." ".$lastname." ".$surname);
                $dob = $request->dob ? Carbon::parse($request->dob)->format('Y-m-d') : null;
                $gender = $request->gender;
                // $age = (date('Y') - date('Y',strtotime($dob)));
                $generateCode = $this->generateCode($user->id,$name);
                $code = $generateCode['code'];

                $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years');

                $update_profile = [
                'code' => $code,
                'name' => $name,
                'dob' => $dob,
                'gender' => $gender,
                'age' => $age
                ];

                $update_data = $user->update($update_profile);
                if ($update_data) {
                    return $this->sendResponse('User Updated Successfully..',$user);
                }
            } else {
                return $this->sendError('User is not found or You are not Updated Profile');
            }
        }else{
            return $this->sendError(__('auth.failed'), 401);
        }

    }
    /**
    * Return patient code
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    private function generateCode($patientsId, $name)
    {
        $name = preg_replace('/\s+/', ' ', $name);
        $name = explode(' ', $name);
        $code = strtoupper($name[0][0]);

        $code .= (!empty($name[1])) ? strtoupper($name[1][0]) : 'R';
        $code .= (!empty($name[2])) ? strtoupper($name[2][0]) : 'R';

        $code .= $patientsId;
        $code = preg_replace('/[^A-Za-z0-9\-]/', 'R', $code);
        return ['code'=>$code];
    }

    
}
