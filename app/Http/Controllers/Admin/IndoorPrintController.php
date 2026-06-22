<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Carbon\Carbon;

class IndoorPrintController extends AdminController
{
    /**
    * Return Admisin Consent print
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function printAdmisionConsent(Request $request, $id) {

        $patientData = $this->OpdPatients->where('id', $id)->first();
        $room_id = $this->IndoorBook->where('patient_id', $patientData->id)->first();
        $currentdate =Carbon::now();
        if(!empty($patientData)) {
            if ($request->isprint) {
                return response()->json([
                    'status' => 1,
                    'data' => View::make('admin.indoor.print.admisionconsent', compact('patientData','currentdate','room_id'))->render()
                ]);
            }
        }
        return response()->json([
            'status' => 0
        ]);
    }

    /**
    * get Patient report
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function getPatientReportData(Request $request) {
        try {
            $patientId = decrypt($request->patient_id);
        } catch (Exception $exception) {
            return [
                'status' => false,
                'message' => 'Invalid patient ID'
            ];
        }

        try {
            $patient = $this->OpdPatients->whereId($patientId)->first();
            if ($request->report == 'fetal-reducation') {
                $view =  View::make('admin.indoor.print.fetal_reducation', compact('patient'))->render();
            }

            if ($request->report == 'tl-recanalisation') {
                $view =  View::make('admin.indoor.print.tl_recanalisation', compact('patient'))->render();
            }
            return response()->json([
                'status' => true,
                'data' => $view,
            ]);
        } catch (Exception $exception) {
            return [
                'status' => false,
                'message' => 'Internal Server Error.'
            ];
        }
    }
}
