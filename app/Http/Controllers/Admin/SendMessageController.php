<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\Admin\AdminController;

class SendMessageController extends AdminController
{
    /**
    * Send Appointment to patient
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function sendAptToPatient() {
        $patientsToSendSms = $this->Appointment
            ->where('date', $this->Carbon->tomorrow()->format('Y-m-d'))
            ->select('id')
            ->get();

        foreach ($patientsToSendSms as $row) {
            $this->SmsManager->sendAptToPatient($row->id);

        }
    }

    /**
    * Send custom SMS
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function sendCustomSms(Request $request) {
        if ($request->mobile != null) {
            $mobile = explode(',', $request->mobile);
            for ($i = 0; $i < count($mobile); $i++) {
                $success = $this->SmsManager->sendCustomMessage($mobile[$i], $templateId = 0, $request->message);
            }
            return json_encode($success);
        } else if ($request->categories != null) {
            $categoryId = $request->categories;
            $patients = $this->OpdPatients->where(function($query) use($categoryId) {
                $query->whereHas('getAppointments', function($query) use($categoryId) {
                    $query->whereCategoryId($categoryId);
                });
            })
            ->select('mobile_number')
            ->get();

            foreach ($patients as $row) {
                $success = $this->SmsManager->sendCustomMessage($row->mobile_number, $templateId = 0, $request->message);
            }
            return json_encode($success);
        }
    }
}
