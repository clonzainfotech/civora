<?php

namespace App\Http\Controllers\Api\DoctorApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\Api\ApiController;
use Carbon\Carbon;

class TodayPatientsController extends ApiController
{
     /**
    *Get today appointment list
    * @param  \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */
    public function doctortodaypatients(Request $request)
    {
        $token = $request->header('Authorization');
        $UserData = $this->UserToken->where('token', $token)->first();
        $opd_time = isset($request->opd) ? $request->opd : '';

        if($token && $UserData) {
            $appointmentList = collect($this->Appointment->select('id','patients_id','category_id','date','time','seen_by')->where('seen_by',$UserData->user_id)->whereDate('created_at', Carbon::today())->get())->map(function($q)use($opd_time){
                $q->doctor = $q->getSeenBy['name'];
                $q->mobile_number = $q->getSeenBy['mobile_number'];
                $q->profile_picture = $q->getPatientsDetails['profile_picture'];
                $q->patient_name = $q->getPatientsDetails['name'];
                $q->category = $q->categoryDetails['name'];
                $q->time = (strtotime(\Carbon\Carbon::parse($q->time)->format('g:i')) > strtotime('9:00') &&   strtotime(\Carbon\Carbon::parse($q->time)->format('g:i')) < strtotime('12:00') ? 'morning' : 'evening');
                if($opd_time == $q->time || $opd_time == null){
                    unset($q->getPatientsDetails,$q->getSeenBy,$q->categoryDetails);
                    return $q;
                }
            });
            $appointmentlist = $appointmentList->filter(function ($value, $key) {
                return $value != null;
            });
            return $this->sendResponse('Your Today appointment successfully get',$appointmentlist);
        }
        return $this->sendError(__('auth.failed'), 401);
    }
}
