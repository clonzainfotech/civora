<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Admin\AdminController;
use Carbon\Carbon;

class GetANCDataController extends AdminController
{
    /**
    * Get ANC Data 
    * @param  \Illuminate\Http\Request  $request,$id
    * @return \Illuminate\Http\Response
    */
    public function getANCData(Request $request, $id) {

        try{
            $patients = decrypt($id);
            $isGsac = false;
            $ancData = $this->ANC->where('patients_id',$patients)->orderBy('id','DESC')->first();
            
            $lmdDate = null;
            $eddDate = null;
            $medicineData = null;
            $historyOE = null;
            if($ancData){
                // $mhData = json_decode($ancData->getAncs->m_h);
                // $mhData = json_decode($ancData->getAncs->m_h);
                $ancFirstVisitData = $this->ANC->where('patients_id',$patients)->first();
                $upt = json_decode($ancFirstVisitData->patients_obstratics, true);
                $oe = json_decode($ancFirstVisitData->o_e, true);
                $historyOE = json_decode($ancData->o_e, true);
                if(isset($upt['upt_type']) && $upt['upt_type'] == 'positive' && isset($oe['utdata'][1]) && $oe['utdata'][1]['ut_type'] == 'g-sac' && (strtolower($oe['utdata'][1]['oe_ut_sac']) == 'no' || strtolower($oe['utdata'][1]['oe_ut_sac_2']) == 'no')) {
                    $isGsac = true;
                }
                else{
                    $ancData = $ancData;
                }
            }
            else{
                $ancData = $this->ANC->where('patients_id',$patients)->first();
                $mhData = json_decode($ancData->m_h);
                // $ancData = $this->ANC->where('patients_id',$patients)->first();
                $upt = json_decode($ancData->patients_obstratics, true);
                $oe = json_decode($ancData->o_e, true);
                if (isset($upt['upt_type']) && $upt['upt_type'] == 'positive' && isset($oe['utdata'][1]) && $oe['utdata'][1]['ut_type'] == 'g-sac' && (strtolower($oe['utdata'][1]['oe_ut_sac']) == 'no' || strtolower($oe['utdata'][1]['oe_ut_sac_2']) == 'no')) {
                    $isGsac = true;
                }
                // $mhData = json_decode($ancData->m_h);
            }
            $hoDate = null;
            $hoData = json_decode($ancData->h_o);
            if(!empty($hoData)){
                $hoDetails = $hoData->ho_details;
                $hoMonth = explode('-',$hoDetails);
                $hoMonthData = !empty($hoMonth[0]) ? $hoMonth[0] : 0;
                $hoDay = !empty($hoMonth[1]) ? $hoMonth[1] : 0;
                $days = 30;
                $monthDays = ((int)$hoMonthData * (int)$days) + (int)str_replace(' ', '', $hoDay);
                $oldDate = Carbon::parse($ancData->created_at)->format('Y-m-d');
                $nowDate = Carbon::now();
                $diffDays = Carbon::parse($oldDate)->diffInDays($nowDate);
                $totalDays = $monthDays + $diffDays;
                $hoDate = (int)($totalDays/$days).'-'.$totalDays % $days;
            }
            // $lmdDate = $mhData->last_menstrual_date;
            // $eddDate = $mhData->edd;
            $anc = null;
            $ancHistory = null;
            $utType = 'yes';
            $ancHistoryId = null;
            $hoMonth = 'yes';
            $previousAnc = null;
            $ovaryData = [];
            if($request->date){
                $anc = $this->ANC->where('created_at',$request->date)->first();
                $ancHistory = $this->AncHistory->where('created_at',$request->date)->first();
                $hoMonth = 'no';
                $historyOE = null;
                if($anc){
                    $utType = 'no';
                    $ancData = $anc;
                }else{
                    $ancHistoryId = $ancHistory->id;
                    $ancData = $ancHistory;
                    $ancFirstVisitData = $this->ANC->where('patients_id',$patients)->first();
                    $upt = json_decode($ancFirstVisitData->patients_obstratics, true);
                    $oe = json_decode($ancFirstVisitData->o_e, true);
                    $historyOE = json_decode($ancData->o_e, true);
                    if(isset($upt['upt_type']) && $upt['upt_type'] == 'positive' && isset($oe['utdata'][1]) && $oe['utdata'][1]['ut_type'] == 'g-sac' && (strtolower($oe['utdata'][1]['oe_ut_sac']) == 'no' || strtolower($oe['utdata'][1]['oe_ut_sac_2']) == 'no')) {
                        $isGsac = true;
                    } else {
                        $ancData = $ancHistory;
                    }
                }

                $previousAnc = $this->AncHistory
                    ->where([
                        ['created_at', '<', $request->date],
                        ['patients_id', '=', $patients]
                    ])
                    ->orderBy('id', 'DESC')
                    ->first();
                
                if($previousAnc == null){
                    $previousAnc = $this->ANC
                    ->where([
                        ['created_at', '<', $request->date],
                        ['patients_id', '=', $patients]
                    ])
                    ->orderBy('id', 'DESC')
                    ->first();
                }
                
                // dd($previousAnc->o_e);
            }
            $ancPatients = $this->OpdPatients->find($patients);
            $durationOfData = ['other'=>'Other'] + getDurationOfData(1)['data'];
            $complaints = $this->Complaint->pluck('name','name');
            $patientsInfo = json_decode($ancData->patients_info);
            $patientsObstratics = json_decode($ancData->patients_obstratics);
            $ho = json_decode($ancData->h_o);
            $co = json_decode($ancData->c_o);
            $mh = json_decode($ancData->m_h);
            $pastHistory = json_decode($ancData->past_history);
            $oe = json_decode($ancData->o_e);
            $previousAnc = (!empty($previousAnc)) ? json_decode($previousAnc->o_e) : null;
            $patientsDetails = json_decode($ancData->patients_details_ho);
            $patientsInvestigation = json_decode($ancData->investigation);
            $patientsInjection = json_decode($ancData->injection);
            $treatment = json_decode($ancData->treatment);
            $usg = json_decode($ancData->usg);
            $date = [];
            // $ancHistoryDate = $this->AncHistory->where('patients_id',$patients)->pluck('created_at','created_at')->toArray();
            $ancHistoryDate = collect($this->AncHistory->select('created_at','o_e->follow_up as follow_up')->where('patients_id',$patients)->get())->map(function ($q){
                $q->follow_up = Carbon::parse($q->follow_up)->format('d-m-Y').' '.Carbon::parse($q->created_at)->format('H:i:s');
                return $q;
            })->pluck('follow_up','created_at')->toArray();
            $ancDate = collect($this->ANC->select('created_at','o_e->follow_up as follow_up')->where('patients_id',$patients)->get())->map(function ($q){
                $q->follow_up = Carbon::parse($q->follow_up)->format('d-m-Y').' '.Carbon::parse($q->created_at)->format('H:i:s');
                return $q;
            })->pluck('follow_up','created_at')->toArray();
            $medicines = $this->Medicine->pluck('name','name')->toArray();
            $date = array_merge($ancHistoryDate,$ancDate);
            $hospitalTime = $this->appointmentTime('09:00', '17:00', '5 mins');
            $ovaryData = $this->OvaryDetail->pluck('name','name');
            $hoData = $this->getHoData();
            $lastAppointment = $this->Appointment->wherePatientsId($patients)->orderBy('id','DESC')->first();
            if(!empty($treatment)){
                $medicineData = !empty($treatment->medicinedata) ? $treatment->medicinedata : null;
                unset($treatment->medicinedata);
            }
            $ancImagesValue = null;
            $growthImagesValue = null;
            $earlyScanImagesValue = null; 
            $otherImagesValue = null;
            $usgImagesValue = null;
            $ancImagesData = !empty($patientsInvestigation->anc->images) ? $patientsInvestigation->anc->images : null;
            if($ancImagesData){
                foreach($ancImagesData as $key=>$row){
                    $ancImagesValue[$key]['id'] = $key;
                    $ancImagesValue[$key]['src'] = url($row);
                }
            }
            $earlyScanImagesData = !empty($patientsInvestigation->investigation_early_scan_type->images) ? $patientsInvestigation->investigation_early_scan_type->images : null;
            if($earlyScanImagesData){
                foreach($earlyScanImagesData as $key=>$row){
                    $earlyScanImagesValue[$key]['id'] = $key;
                    $earlyScanImagesValue[$key]['src'] = url($row);
                }
            }
            $growthImagesData = !empty($patientsInvestigation->growth_report->images) ? $patientsInvestigation->growth_report->images : null;
            if($growthImagesData){
                foreach($growthImagesData as $key=>$row){
                    $growthImagesValue[$key]['id'] = $key;
                    $growthImagesValue[$key]['src'] = url($row);
                }
            }
            $otherImagesData = !empty($patientsInvestigation->other_report_data->images) ? $patientsInvestigation->other_report_data->images : null;
            if($otherImagesData){
                foreach($otherImagesData as $key=>$row){
                    $otherImagesValue[$key]['id'] = $key;
                    $otherImagesValue[$key]['src'] = url($row);
                }
            }
            $usgImages = !empty($usg->images) ? $usg->images : null;
            if($usgImages){
                foreach($usgImages as $key=>$row){
                    $usgImagesValue[$key]['id'] = $key;
                    $usgImagesValue[$key]['src'] = url($row);
                }
            }
            $ancImagesValue = json_encode($ancImagesValue);
            $earlyScanImagesValue = json_encode($earlyScanImagesValue);
            $growthImagesValue = json_encode($growthImagesValue);
            $otherImagesValue = json_encode($otherImagesValue);
            $usgImagesValue = json_encode($usgImagesValue);
            $medicineKey = [];
            if(!empty($treatment)){
                $medicineKey = (array)$treatment;
                $medicineKey = array_column($medicineKey,'medicine');
                if(!empty($medicineKey)){
                    $medicineKey = array_combine($medicineKey,$medicineKey);
                }
            }
            // if($request->ajax()){
                // $oeDataCount = count((array)$oe->utdata);
                $data['patientsInfo'] = $patientsInfo;
                $data['medicineKey'] = $medicineKey;
                $data['patientsObstratics'] = $patientsObstratics;
                $data['ho'] = $ho;
                $data['co'] = $co;
                $data['mh'] = $mh;
                $data['oe'] = $oe;
                $data['isGsac'] = $isGsac;
                $data['ancImagesValue'] = $ancImagesValue;
                $data['earlyScanImagesValue'] = $earlyScanImagesValue;
                $data['growthImagesValue'] = $growthImagesValue;
                $data['otherImagesValue'] = $otherImagesValue;
                $data['usgImagesValue'] = $usgImagesValue;
                $data['previousAncRemark'] = $previousAnc;
                // dd($data['previousAncRemark']);
                $data['usg'] = $usg;
                $data['hoMonth'] = $hoMonth;
                $data['pastHistory'] = $pastHistory;
                $data['patientsDetails'] = $patientsDetails;
                $data['patientsInvestigation'] = $patientsInvestigation;
                $data['patientsInjection'] = $patientsInjection;
                $data['utType'] = $utType;
                $data['complaints'] = $complaints;
                // data date wise
                $data['anc'] = $anc;
                $data['ancHistory'] = $ancHistory;
                $data['ancData'] = $ancData;
                $data['ancHistoryId'] = $ancHistoryId;
                $data['medicines'] = $medicines;
                $data['treatment'] = $treatment;
                $data['lmdDate'] = $lmdDate;
                $data['eddDate'] = $eddDate;
                $data['hoDate'] = $hoDate;
                $data['medicineData'] = $medicineData;
                // $data['oeDataCount'] = $oeDataCount;
                $referenceDoctor = $this->ReferenceDoctor->pluck('name','id');
                $data['referenceDoctor'] = $referenceDoctor;
                $data['ovaryData'] = $ovaryData;
                $data['durationOfData'] = $durationOfData;
                // $data['placenta'] = $this->getPlacenta()['placenta'];
                $data['hoData'] = $hoData;
                $data['lastAppointment'] = $lastAppointment;
                $data['ancPatients'] = $ancPatients;
                // $data['editAnc'] = View::make('admin.anc.edit',$data)->render();
                // return $data;
            // }
                $placenta = $this->getPlacenta()['placenta'];
            return view('admin.anc.ancData',compact('ancData','placenta','patients','date','hospitalTime','data'));
        }catch(Exception $e){
            // dd($e);
            log::debug($e);
        }

        // return view ('admin.anc.ancData');
    }

    /**
    * Get ANC history 
    * @param  \Illuminate\Http\Request  $request,$id,$anchistorydate
    * @return \Illuminate\Http\Response
    */
    public function getANCHistoryData(Request $request, $id,$anchistorydate) {
            try{
            $patients = decrypt($id);
            $date=$anchistorydate;
            // dd($patients,$date);
            $isGsac = false;
            $ancData = $this->AncHistory->where('patients_id',$patients)->where(\DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"),$date)->orderBy('id','DESC')->first();
            // dd($ancData->m_h);
            // dd($ancData->c_o);
            // dd($ancData);
            $lmdDate = null;
            $eddDate = null;
            $medicineData = null;
            $historyOE = null;
            if($ancData){
                // dd($ancData);
                $mhData = json_decode($ancData->getAncs->m_h);
                $mhData = json_decode($ancData->getAncs->m_h);
                $ancFirstVisitData = $this->ANC->where('patients_id',$patients)->first();
                $upt = json_decode($ancFirstVisitData->patients_obstratics, true);
                $oe = json_decode($ancFirstVisitData->o_e, true);
                // dd($oe);
                $historyOE = json_decode($ancData->o_e, true);
                if(isset($upt['upt_type']) && $upt['upt_type'] == 'positive' && isset($oe['utdata'][1]) && $oe['utdata'][1]['ut_type'] == 'g-sac' && (strtolower($oe['utdata'][1]['oe_ut_sac']) == 'no' || strtolower($oe['utdata'][1]['oe_ut_sac_2']) == 'no')) {
                    $isGsac = true;
                }
            }
            $hoDate = null;
            $hoData = json_decode($ancData->h_o);
            // dd($hoData);
            if(!empty($hoData)){
                $hoDetails = $hoData->ho_details;
                $hoMonth = explode('-',$hoDetails);
                $hoMonthData = !empty($hoMonth[0]) ? $hoMonth[0] : 0;
                $hoDay = !empty($hoMonth[1]) ? $hoMonth[1] : 0;
                $days = 30;
                $monthDays = ((int)$hoMonthData * (int)$days) + (int)str_replace(' ', '', $hoDay);
                $oldDate = Carbon::parse($ancData->created_at)->format('Y-m-d');
                $nowDate = Carbon::now();
                $diffDays = Carbon::parse($oldDate)->diffInDays($nowDate);
                $totalDays = $monthDays + $diffDays;
                $hoDate = (int)($totalDays/$days).'-'.$totalDays % $days;
            }
            $lmdDate = $mhData->last_menstrual_date;
            $eddDate = $mhData->edd;
            $anc = null;
            $ancHistory = null;
            $utType = 'yes';
            $ancHistoryId = null;
            $hoMonth = 'yes';
            $previousAnc = null;
            $ovaryData = [];
            $ancPatients = $this->OpdPatients->find($patients);
            $durationOfData = ['other'=>'Other'] + getDurationOfData(1)['data'];
            $complaints = $this->Complaint->pluck('name','name');
            $patientsInfo = json_decode($ancData->patients_info);
            $patientsObstratics = json_decode($ancData->patients_obstratics);
            $ho = json_decode($ancData->h_o);
            // dd($ho);
            $co = json_decode($ancData->c_o);
            $mh = json_decode($ancData->m_h);
            $pastHistory = json_decode($ancData->past_history);
            $oe = json_decode($ancData->o_e);
            $previousAnc = (!empty($previousAnc)) ? json_decode($previousAnc) : null;
            $patientsDetails = json_decode($ancData->patients_details_ho);
            $patientsInvestigation = json_decode($ancData->investigation);
            $patientsInjection = json_decode($ancData->injection);
            $treatment = json_decode($ancData->treatment);
            $usg = json_decode($ancData->usg);
            $date = [];
            $ancHistoryDate = collect($this->AncHistory->select('created_at','o_e->follow_up as follow_up')->where('patients_id',$patients)->get())->map(function ($q){
                $q->follow_up = Carbon::parse($q->follow_up)->format('d-m-Y').' '.Carbon::parse($q->created_at)->format('H:i:s');
                return $q;
            })->pluck('follow_up','created_at')->toArray();
            $ancDate = collect($this->ANC->select('created_at','o_e->follow_up as follow_up')->where('patients_id',$patients)->get())->map(function ($q){
                $q->follow_up = Carbon::parse($q->follow_up)->format('d-m-Y').' '.Carbon::parse($q->created_at)->format('H:i:s');
                return $q;
            })->pluck('follow_up','created_at')->toArray();
            $medicines = $this->Medicine->pluck('name','name')->toArray();
            $date = array_merge($ancHistoryDate,$ancDate);
            $hospitalTime = $this->appointmentTime('09:00', '17:00', '5 mins');
            $ovaryData = $this->OvaryDetail->pluck('name','name');
            $hoData = $this->getHoData();
            $lastAppointment = $this->Appointment->wherePatientsId($patients)->orderBy('id','DESC')->first();
            if(!empty($treatment)){
                $medicineData = !empty($treatment->medicinedata) ? $treatment->medicinedata : null;
                unset($treatment->medicinedata);
            }
            $ancImagesValue = null;
            $growthImagesValue = null;
            $earlyScanImagesValue = null; 
            $otherImagesValue = null;
            $usgImagesValue = null;
            $ancImagesData = !empty($patientsInvestigation->anc->images) ? $patientsInvestigation->anc->images : null;
            if($ancImagesData){
                foreach($ancImagesData as $key=>$row){
                    $ancImagesValue[$key]['id'] = $key;
                    $ancImagesValue[$key]['src'] = url($row);
                }
            }
            $earlyScanImagesData = !empty($patientsInvestigation->investigation_early_scan_type->images) ? $patientsInvestigation->investigation_early_scan_type->images : null;
            if($earlyScanImagesData){
                foreach($earlyScanImagesData as $key=>$row){
                    $earlyScanImagesValue[$key]['id'] = $key;
                    $earlyScanImagesValue[$key]['src'] = url($row);
                }
            }
            $growthImagesData = !empty($patientsInvestigation->growth_report->images) ? $patientsInvestigation->growth_report->images : null;
            if($growthImagesData){
                foreach($growthImagesData as $key=>$row){
                    $growthImagesValue[$key]['id'] = $key;
                    $growthImagesValue[$key]['src'] = url($row);
                }
            }
            $otherImagesData = !empty($patientsInvestigation->other_report_data->images) ? $patientsInvestigation->other_report_data->images : null;
            if($otherImagesData){
                foreach($otherImagesData as $key=>$row){
                    $otherImagesValue[$key]['id'] = $key;
                    $otherImagesValue[$key]['src'] = url($row);
                }
            }
            $usgImages = !empty($usg->images) ? $usg->images : null;
            if($usgImages){
                foreach($usgImages as $key=>$row){
                    $usgImagesValue[$key]['id'] = $key;
                    $usgImagesValue[$key]['src'] = url($row);
                }
            }
            $ancImagesValue = json_encode($ancImagesValue);
            $earlyScanImagesValue = json_encode($earlyScanImagesValue);
            $growthImagesValue = json_encode($growthImagesValue);
            $otherImagesValue = json_encode($otherImagesValue);
            $usgImagesValue = json_encode($usgImagesValue);
            $medicineKey = [];
            if(!empty($treatment)){
                $medicineKey = (array)$treatment;
                $medicineKey = array_column($medicineKey,'medicine');
                if(!empty($medicineKey)){
                    $medicineKey = array_combine($medicineKey,$medicineKey);
                }
            }
                $data['patientsInfo'] = $patientsInfo;
                $data['medicineKey'] = $medicineKey;
                $data['patientsObstratics'] = $patientsObstratics;
                $data['ho'] = $ho;
                $data['co'] = $co;
                $data['mh'] = $mh;
                $data['oe'] = $oe;
                $data['isGsac'] = $isGsac;
                $data['ancImagesValue'] = $ancImagesValue;
                $data['earlyScanImagesValue'] = $earlyScanImagesValue;
                $data['growthImagesValue'] = $growthImagesValue;
                $data['otherImagesValue'] = $otherImagesValue;
                $data['usgImagesValue'] = $usgImagesValue;
                $data['previousAncRemark'] = $previousAnc;
                $data['usg'] = $usg;
                $data['hoMonth'] = $hoMonth;
                $data['pastHistory'] = $pastHistory;
                $data['patientsDetails'] = $patientsDetails;
                $data['patientsInvestigation'] = $patientsInvestigation;
                $data['patientsInjection'] = $patientsInjection;
                $data['utType'] = $utType;
                $data['complaints'] = $complaints;
                $data['anc'] = $anc;
                $data['ancHistory'] = $ancHistory;
                $data['ancData'] = $ancData;
                $data['ancHistoryId'] = $ancHistoryId;
                $data['medicines'] = $medicines;
                $data['treatment'] = $treatment;
                $data['lmdDate'] = $lmdDate;
                $data['eddDate'] = $eddDate;
                $data['hoDate'] = $hoDate;
                $data['medicineData'] = $medicineData;
                $referenceDoctor = $this->ReferenceDoctor->pluck('name','id');
                $data['referenceDoctor'] = $referenceDoctor;
                $data['ovaryData'] = $ovaryData;
                $data['durationOfData'] = $durationOfData;
                $data['placenta'] = $this->getPlacenta()['placenta'];
                $data['hoData'] = $hoData;
                $data['lastAppointment'] = $lastAppointment;
                $data['ancPatients'] = $ancPatients;
                $placenta = $this->getPlacenta()['placenta'];
        return view('admin.anc.anchistoryData',compact('data','placenta'));
        }catch(Exception $e){
            // dd($e);
            log::debug($e);
        }
    
    }
    
    /**
    * Get List of  Placenta
    * @return \Illuminate\Http\Response
    */
    private function getPlacenta() {
        $placenta = [
            '1'=>'Anterior',
            '2'=>'Fundal',
            '3'=>'Anterior & Fundal',
            '4'=>'Left Lateral Wall',
            '5'=>'Posterior',
            '6'=>'Anterior Reaching to OS',
            '7'=>'Anterior Lowlying',
            '8'=>'Anterior Circumvallate',
            '9'=>'Anterior Covering the OS',
            '10'=>'Anterior Low Laying Reaching Internal OS',
            '11'=>'Centraly Covering the OS',
            '12'=>'Fundal & Posterior',
            '13'=>'Fundal Extending Anteriorly and Posteriorly',
            '14'=>'Fundo Posterior',
            '15'=>'Posterior Low Laying',
            '16'=>'Posterior Low Laying Covering Internal OS',
            '17'=>'Posterior Reaching up to OS',
            '18'=>'Right Lateral Wall',
            '19'=>'Shows Anhypoechoic lesion',
        ];
        return ['placenta' => $placenta];
    }
}
