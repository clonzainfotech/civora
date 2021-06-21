<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Notification extends BaseModel
{
    public static function sendNotificationToPatients($appointmentId) {
        return true;
        $module = __FUNCTION__;
        $notificationData = [];
        $notificationData['module'] = $module;
        $notificationData['notify_id'] = '';
        $notificationData['notification'] = '';

        $appointment = AppointmentRequest::with('getPatients')
            ->whereId($appointmentId)
            ->first();

        $getPatientName = $appointment->getPatients['name'];
        $getAptDate = $appointment->appointment_date;

        // $smsData['message'] = self::replaceMessage('{{patient_name}}',$getPatientName,$smsData['message']);

        $smsData['mobile'] = $appointment->getPatients['mobile_number'];

        self::startToSendSms($smsData);
        return true;
    }
}
