<?php

namespace App\Http\Controllers\Api\DoctorApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\Api\ApiController;
use Carbon\Carbon;


class PatientAppointmentRequestController extends ApiController
{
    /**
    *Get patient appointment request list
    * @param  \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */
    public function PatientAppointmentRequest(Request $request){

        $token = $request->header('Authorization');
        $UserData = $this->UserToken->where('token', $token)->first();
        $opd_time = isset($request->opd) ? $request->opd : '';
        $doctor_id = isset($request->doctor_id) ? $request->doctor_id : '';
        // dd($doctor_id);
        if($token && $UserData) {
            $appointmentRequestList = collect($this->AppointmentRequest
            ->select('id','patients_id','seen_by','appointment_date','appointment_time','created_at',
             \DB::raw('(CASE
             WHEN is_book = "0" THEN "pending"
             WHEN is_book = "1" THEN "approve"
             WHEN is_book = "2" THEN "reject"
             END) AS is_book'))
            ->where('seen_by',$UserData->user_id)->get())->map(function($q) use($opd_time){
                $q->doctor = $q->getSeenBy['name'];
                $q->patient = $q->getPatients['name'];
                $q->profile_picture = $q->getPatients['profile_picture'];
                $q->category = $q->lastAppointmentData->categoryDetails['name'];
                $q->time = (strtotime(\Carbon\Carbon::parse($q->appointment_time)->format('g:i')) > strtotime('9:00') &&   strtotime(\Carbon\Carbon::parse($q->appointment_time)->format('g:i')) < strtotime('12:00') ? 'morning' : 'evening');
                if($opd_time == $q->time || $opd_time == null){
                    unset($q->getPatients,$q->getSeenBy,$q->lastAppointmentData);
                    return $q;
                }
            });
            $appointmentList = $appointmentRequestList->filter(function ($value, $key) {
                return $value != null;
            });
            return $this->sendResponse('Your appointment request successfully get',$appointmentList);
        }
        return $this->sendError(__('auth.failed'), 401);
    }
}
