<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Base\Api\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;

class MedicineController extends ApiController
{
	/**
    * Return Medicine based on category
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
   public function get_medicines(Request $request)
   {
    $token = $request->header('Authorization');
	   	if ($token) {
	   		$rule = [
	            'appointment_id' => 'required',
	        ];
	        $validator = Validator::make($request->all(),$rule);
	        if($validator->fails()){
	            return $this->sendError($validator->errors()->first(), 422);
	        }

	        $madicineData = [];
            $url = "";
	        $appointment_id = $request->appointment_id;
	        $get_appointment = $this->Appointment->where('id',$appointment_id)->first();
	        	// print_r($get_appointment);die();

	        if (!empty($get_appointment)) {
	        	$category_id = $get_appointment->category_id;
		        $aptCreatedDate = $get_appointment->date;
                if(!empty($category_id)) {
	                $medicineTime = ['1'=>'Morning','2'=>'Afternoon','3'=>'Evening','4'=>'Night'];
		        	$dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS"];
	                $madicine_status = ["1"=>"After Meal","2"=>"Empty Stomach","3"=>"Instead of menstruation space"];
		        	if (in_array($category_id, [5,6])) {
		        		$anc = $this->ANC->where('patients_id',$get_appointment->patients_id)->whereDate('created_at',$aptCreatedDate)->first();
		        		// print_r($anc);die();
		        		if (!empty($anc)) {
	                        $madicineData = null;
	                        if(!empty($anc->treatment)) {
			        			$treatment = json_decode($anc->treatment,true);
		                        unset($treatment["medicinedata"]);
		                        // print_r($treatment);die();
			        			$madicines = $treatment;
			        			if (!empty($madicines)) {
				        			foreach ($madicines as $key => $madicine) {
				        				if (!empty(($madicine['dose']))) {
				        					$madicine['dose'] = $dose[$madicine['dose']];	        					
				        				}
				        				if (!empty(($madicine['medicine_status']))) {
				        					$madicine['medicine_status'] = $madicine_status[$madicine['medicine_status']];	        			
				        				}
			                        	$medicineTimeData = !empty($madicine['medicine_time']) ? $madicine['medicine_time'] : [];;
			                            unset($madicine['medicine_time']);
			                            $madicineTime = [];
			                            foreach($medicineTimeData as $key=>$row){
			                                $madicineTime[] = $medicineTime[$row];
			                            }
			                            $madicine['medicine_time'] =!empty($madicineTime) ? implode(',',$madicineTime) : null;
			                            $madicineData[] = $madicine;     
				        			}
				        		}
	                			// return $this->sendResponse('Get pateint appointment details successfully', $madicineData); 
                            	/*$url = url('get-anc-report?date='.$aptCreatedDate.'&patient_id='.encrypt($get_appointment->patients_id));
                            	$madicineData['url'] = $url;*/

		        			}
		        			// print_r($treatment);die();
		        		}else{
		        			$AncHistory = $this->AncHistory->where('patients_id',$get_appointment->patients_id)->whereDate('created_at',$aptCreatedDate)->first();
		        			if (!empty($AncHistory)) {
		                        $madicineData = null;
	                            if(!empty($AncHistory->treatment)) {
				        			$treatment = json_decode($AncHistory->treatment,true);
			                        unset($treatment["medicinedata"]);
				        			$madicines = $treatment;
				        			if (!empty($madicines)) {
					        			foreach ($madicines as $key => $madicine) {
					        				if (!empty(($madicine['dose']))) {
					        					$madicine['dose'] = $dose[$madicine['dose']];	        					
					        				}
					        				if (!empty(($madicine['medicine_status']))) {
					        					$madicine['medicine_status'] = $madicine_status[$madicine['medicine_status']];	    	
					        				}
				                        	$medicineTimeData = !empty($madicine['medicine_time']) ? $madicine['medicine_time'] : [];;
				                            unset($madicine['medicine_time']);
				                            $madicineTime = [];
				                            foreach($medicineTimeData as $key=>$row){
				                                $madicineTime[] = $medicineTime[$row];
				                            }
				                            $madicine['medicine_time'] =!empty($madicineTime) ? implode(',',$madicineTime) : null;
				                            $madicineData[] = $madicine;			                               
					        			}
					        		}
				        		}
		                		// return $this->sendResponse('Get pateint appointment details successfully', $madicineData);
		                	}
		                	else{
	                            $madicineData = null;
		                		// return $this->sendResponse('Get pateint appointment details successfully', $madicineData);
	                        }
		        		}
		                return $this->sendResponse('Get pateint appointment details successfully', $madicineData);

		        	}
		        	if(in_array($category_id, [3, 4])) {
                        $dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS"];
                        $madicine_status = ["1"=>"After Meal","2"=>"Empty Stomach","3"=>"Instead of menstruation space"];
                        $iui = $this->IUI->where('patients_id',$get_appointment->patients_id)->whereDate('created_at',$aptCreatedDate)->first();
                        if(!empty($iui)) {
                            $madicineData = null;
                            if(!empty($iui->treatment)) {
                                $treatment = json_decode($iui->treatment, true);
                                unset($treatment["medicinedata"]);
                                $madicines = $treatment;
                                if(!empty($madicines)){
                                    foreach ($madicines as $madicine) {
                                        $madicineTime = [];
                                        if(!empty($madicine['dose'])){
                                            $madicine['dose'] = $dose[$madicine['dose']];
                                        }
                                        if(!empty($madicine['medicine_status'])){
                                            $madicine['medicine_status'] = $madicine_status[$madicine['medicine_status']];
                                        }
                                        $medicineTimeData = !empty($madicine['medicine_time']) ? $madicine['medicine_time'] : [];
                                        unset($madicine['medicine_time']);
                                        foreach($medicineTimeData as $key=>$row){
                                            $madicineTime[] = $medicineTime[$row];
                                        }
                                        $madicine['medicine_time'] =!empty($madicineTime) ? implode(',',$madicineTime) : null;
                                        $madicineData[] = $madicine;
                                    }
                                }
                            }
		                	// return $this->sendResponse('Get pateint appointment details successfully', $madicineData);
                        }
                        else{
                            $iuiHistory = $this->IuiHistory->where('patients_id',$get_appointment->patients_id)->whereDate('created_at',$aptCreatedDate)->first();
                            if(!empty($iuiHistory)) {
                                $madicineData = null;
                                if(!empty($iui->treatment)) {
                                    $treatment = json_decode($iuiHistory->treatment, true);
                                    unset($treatment["medicinedata"]);
                                    $madicines = $treatment;
                                    foreach ($madicines as $madicine) {
                                        if (!empty($madicine['dose'])) {
                                            $madicine['dose'] = $dose[$madicine['dose']];
                                        }
                                        if (!empty($madicine['medicine_status'])) {
                                            $madicine['medicine_status'] = $madicine_status[$madicine['medicine_status']];
                                        }
                                        $medicineTimeData = !empty($madicine['medicine_time']) ? $madicine['medicine_time'] : [];;
                                        unset($madicine['medicine_time']);
                                        $madicineTime = [];
                                        foreach($medicineTimeData as $key=>$row){
                                            $madicineTime[] = $medicineTime[$row];
                                        }
                                        $madicine['medicine_time'] =!empty($madicineTime) ? implode(',',$madicineTime) : null;
                                        $madicineData[] = $madicine;
                                    }
                                }  
		                		// return $this->sendResponse('Get pateint appointment details successfully', $madicineData);
                            }
                            else {
                                $madicineData = null;
		                		// return $this->sendResponse('Get pateint appointment details successfully', $madicineData);
                            }
                        }
		                return $this->sendResponse('Get pateint appointment details successfully', $madicineData);

                    }
                     if (in_array($category_id,[1,2])) {
                    	/*$dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS"];
                        $madicine_status = ["1"=>"After Meal","2"=>"Empty Stomach","3"=>"Instead of menstruation space"];*/

                        $ivf = $this->IVF->where('patients_id',$get_appointment->patients_id)->whereDate('created_at',$aptCreatedDate)->first();

                        if (!empty($ivf)) {
                        	$madicineData = null;
                        	if (!empty($ivf->treatment)) {
                        		$treatment = json_decode($ivf->treatment,true);	
                        		unset($treatment['medicinedata']);
                        		$madicines = $treatment;
                        		if (!empty($madicines)) {
	                        		foreach ($madicines as $key => $madicine) {
	                        			if (!empty($madicine['dose'])) {
	                        				$madicine['dose'] = $dose[$madicine['dose']];
	                        			}
	                        			if (!empty($madicine['medicine_status'])) {
	                        				$madicine['medicine_status'] = $madicine_status[$madicine['medicine_status']];
	                        			}
	                        			$medicineTimeData = !empty($madicine['medicine_time']) ? $madicine['medicine_time'] : [];
	                        			unset($madicine['medicine_time']);
	                        			$madicineTime = [];
	                        			foreach ($medicineTimeData as $key => $row) {
	                        				$madicineTime[] = $medicineTime[$row];
	                        			}
	                                    $madicine['medicine_time'] =!empty($madicineTime) ? implode(',',$madicineTime) : null;
	                        			$madicineData[] = $madicine;
	                        		}
	                        	}
		                		// return $this->sendResponse('Get pateint appointment details successfully', $madicineData);
                        	}
                        }else{
                        	$ivfHistory = $this->IvfHistory->where('patients_id',$get_appointment->patients_id)->whereDate('created_at',$aptCreatedDate)->first();
                            if(!empty($ivfHistory)) {
                                $madicineData = null; 
                            }
                            else {
                                $madicineData = null;
                            }
		                	// return $this->sendResponse('Get pateint appointment details successfully', $madicineData);
                        }
		                return $this->sendResponse('Get pateint appointment details successfully', $madicineData);   
                    }
		        }
           	 	// return $this->sendError('category Not Found', 401);
        	}
	        return $this->sendError('Patient Appointment is not found', 401);

	   	}
	    	return $this->sendError(__('auth.failed'), 401);
	}
   
}

// {"medicinedata":["Tab Doximom","Cap Gestus(400mg)"],"Tab_Doximom":{"medicine":"Tab Doximom","medicine_status":"1","dose":"1","no":"10","quantity":"1","medicine_time":["3"]},"Cap_Gestus_400mg_":{"medicine":"Cap Gestus(400mg)","medicine_status":"3","dose":"1","no":"15","quantity":"1","medicine_time":["4"]}}