<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Admin\AdminController;
use View;
use Carbon\Carbon;

class SMSManagerController extends AdminController
{
    /**
    * Return on sms manager index page
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        try{
            $smsData = $this->SmsManager;
            $referenceDoctors = $this->SmsManager->leftJoin('reference_doctors','sms_manager.receiver_id','=','reference_doctors.id')
                                    ->where('sms_manager.status',1)
                                    ->orderBy('sms_manager.id', 'DESC')
                                    ->pluck('reference_doctors.name','reference_doctors.id')
                                    ->toArray();
            $referenceDoctors = array_filter($referenceDoctors);
            if($request->ajax()){
                $status = 1;
                $file = 'data';
                $referenceDoctorsId = $request->reference_doctor_id;
                $search=$request->search;
                $msg=$request->msg;
                if($referenceDoctorsId){
                    $smsData = $smsData->where('receiver_id',$referenceDoctorsId);
                }
                if($search){
                    $smsData = $smsData->where('mobile_number','LIKE',$search.'%');
                }
                if($msg){
                    $smsData = $smsData->where('message','LIKE','%'.$msg.'%');
                }

                $fromdate = $request->fromdate." 00:00:00";
                $todate = $request->todate." 23:59:59";
                if ($fromdate || $todate) {
                    $smsData = $smsData->whereBetween('created_at', [$fromdate, $todate]);
                }

                if($request->isprint){
                    $smsData = $this->SmsManager->where('send_message',1)
                            ->where('status',1)
                            ->get();
                    $data['status'] = 2;
                    $data['sms'] = View::make('admin.sms_manager.preview',compact('smsData'))->render();
                    return $data;
                }
                $smsData = $smsData->paginate(100);

                $data['status'] = $status;
                $data['sms'] = View::make('admin.sms_manager.data',compact('smsData'))->render();
                return $data;
            }
            return view('admin.sms_manager.index',compact('referenceDoctors'));
        }catch(\Exception $e){
            abort(500);
        }
    }
}
