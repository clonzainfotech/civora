<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Base\Admin\AdminController;
use Exception;
use Log;
use Auth;
use View;
use DateTime;
use Carbon\Carbon;

class CallReminderController extends AdminController
{
    /**
    * Return call reminder blade with require parameter
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $iuiPatients = $this->IUI->pluck('patients_id');
        $patients = $this->OpdPatients->whereIn('id',$iuiPatients)->pluck('name', 'id');
        
        // dd($patients);
        if ($request->ajax()) {
            $callReminder = $this->CallReminder
                ->with([
                    'getIuiPatientData' => function ($query) {
                        $query->cycle_no = $query
                            ->orderBy('id', 'DESC')
                            ->first();
                    }
                ]);
            
            $patientId = $request->patient_id;

            if ($patientId) {
                $callReminder = $callReminder->where(function($query) use($patientId) {
                    $query->whereHas('getPatientData', function($query) use($patientId) {
                        $query->where('id', $patientId);
                    });
                });
            }

            
            if ($request->date) {
                $date = explode('-', $request->date);
                $startDate = Carbon::createFromFormat('d/m/Y', trim($date[0]))->format('Y-m-d');
                $endDate = Carbon::createFromFormat('d/m/Y', trim($date[1]))->format('Y-m-d');
                $callReminder = $callReminder->whereBetween('date', [$startDate, $endDate]);

            }
            if($request->isprint){
                $callReminder = $this->CallReminder
                ->with([
                    'getIuiPatientData' => function ($query) {
                        $query->cycle_no = $query
                            ->orderBy('id', 'DESC')
                            ->first();
                    }
                ])->get();
                $data['status'] = 2;
                $data['calldata'] = View::make('admin.iui.call_reminder.preview',compact('callReminder'))->render();
                return $data;   
            }
            $callReminder = $callReminder->paginate(100);
            $data['status'] = 1;
            $data['calldata'] = View::make('admin.iui.call_reminder.data',compact('callReminder'))->render();
            return $data;   
        }
        return view('admin.iui.call_reminder.index', compact('patients'));
    }

    /**
    * Add call reminder
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        try {
            $callReminder = $this->CallReminder;
            
            $callReminder->patients_id = $request->patient;
            $callReminder->response = $request->response;
            $callReminder->date = Carbon::parse($request->date)->format('Y-m-d');
            
            if($callReminder->save()) {
                return [
                    'status' => true,
                    'Message' => 'Successfully added call reminder'
                ];
            }
        } catch (Exception $exception) {
            return [
                'status' => false,
                'Message' => 'Internal server error'
            ];
        }

    }

    /**
    * delete call reminder
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request) {

        try {
            $callReminderId = decrypt($request->call_reminder_id);
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => 'Invalid Id'
            ];
        }

        try {
            $callReminder = $this->CallReminder->whereId($callReminderId)->first();
            $callReminder->delete();

            return [
                'status' => true,
                'message' => 'Successfully deleted call reminder'
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => 'Please try again later'
            ];
        }
    }
}
