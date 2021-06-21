<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Admin\AdminController;
use Carbon\Carbon;
use Validator;
use Exception;
use Session;
use View;
use Auth;
use Log;
use DB;

class DonorController extends AdminController
{
    /**
    * Return appointment denor blade with require parameter
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request) {
        $patients = $this->getPatients();
        if($request->ajax()){

            $donor = $this->Appointment->whereCategoryId(7)->orderBy('id','DESC');
            $patientId = $request->patient_id;
            if($patientId) {
                $donor = $donor->where(function($query) use($patientId) {
                    $query->whereHas('getPatientsDetails', function($query) use($patientId) {
                        $query->where('id', $patientId);
                    });
                });
            }

            // search text
            // $search = $request->search;
            // if($search){
            //     $hormon = $hormon->where(function($query) use($search){
            //         $query
            //         ->orWhereHas('categoryDetails', function($query) use($search){
            //             $query->where('name', 'LIKE', '%'.$search.'%');
            //         })
            //         ->orWhere('name', 'LIKE', '%' . $search . '%')
            //         ->orWhere('injection', 'LIKE', '%'.$search.'%');
            //     });
            // }

            // $chargeType = $request->charge_type;
            // $chargeValue = ($request->charge_value == 'Select Charge Category' || $request->charge_value == null) ? 'Hormon,IVF,IUI' : $request->charge_value;
            // if ($chargeType) {
            //     $hormon = $hormon->where('charge_type',$chargeType);
            // }

            // $fromdate = $request->fromdate;
            // $todate = $request->todate;

            if ($request->date) {
                $date = explode('-', $request->date);
                $startDate = Carbon::createFromFormat('d/m/Y', trim($date[0]))->format('Y-m-d');
                $endDate = Carbon::createFromFormat('d/m/Y', trim($date[1]))->format('Y-m-d');
                if ($date) {
                    $donor = $donor->whereBetween('date', [$startDate, $endDate]);
                }
            }
            $search = $request->search;
            if($search){
                $donor = $donor->where(function($query) use($search) {
                    $query
                    ->orWhereHas('getPatientsDetails', function($query) use($search) {
                        $query->where('mobile_number','LIKE',$search.'%');
                    });
                });
            }
            if($request->is_print == 1){
                $donor = $this->Appointment->whereCategoryId(7)->orderBy('id','DESC')->get();
                $data['data'] = View::make('admin.appointment.donor.preview',compact('donor'))->render();
                $data['status'] = 2;
                return response()->json($data);
            }
            $donor = $donor->paginate(100);
            $data['data'] = View::make('admin.appointment.donor.data',compact('donor'))->render();
            $data['status'] = 1;
            return response()->json($data);
        }
        return view('admin.appointment.donor.index', compact('patients'));
    }

    /**
    * Return appointment donor create blade
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function create() {
        return view('admin.appointment.donor.create');
    }

    /**
    * Store appointment donor
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        DB::beginTransaction();
        try {
            if ($request->code) {
                $opdPatients = $this->OpdPatients->whereCode($request->code)->first();
                if ($opdPatients == null) {
                    Session::flash('msg',"Please enter valid code!");
                    return back()->withInput();
                }
            }
            $rule = [
                'name' => 'required',
                'date' => 'required',
                'age' => 'required|numeric|between:1,100',
                'gender' => 'required',
                // 'mobile_number'=>'nullable|numeric|digits:10|unique:patients,mobile_number',
            ];

            // if($request->code) {
            //     $rule['mobile_number'] = 'required|numeric|digits:10|unique:patients,mobile_number,'.$opdPatients->id;
            // }

            $valid = Validator::make($request->all(),$rule);
            if($valid->fails()){
                return redirect()->back()
                    ->withErrors($valid->errors())
                    ->withInput();
            }


            $opdPatient = $this->OpdPatients;
            if ($request->code) {
                $opdPatient = $opdPatients;
            }
            $opdPatient->name = $request->name;
            $opdPatient->height = $request->height;
            $opdPatient->weight = $request->weight;
            $opdPatient->gender = $request->gender;
            $opdPatient->age = $request->age;
            $opdPatient->agent_mobile_number = $request->mobile_number;
            $opdPatient->other_mobile_number = $request->other_mobile_number;

            $opdPatient->created_by = Auth::user()->id;
            $opdPatient->save();
            if (!$request->code) {
                $generateCode = $this->generateCode($opdPatient->id,$opdPatient->name);
                $updateCode = $this->OpdPatients->whereId($opdPatient->id)->first();
                $updateCode->code = $generateCode['code'];
                $updateCode->save();

                $donor = $this->Donor;
                $donor->patients_id = $opdPatient->id;
                $donor->face_color = $request->face_color;
                $donor->hair_color = $request->hair_color;
                $donor->eye_color = $request->eye_color;
                $donor->cbc_mp = $request->cbc_mp;
                $donor->urine = $request->urine;
                $donor->blood_group = $request->blood_group;
                $donor->rbs = $request->rbs;
                $donor->hiv = $request->hiv;
                $donor->hbsag = $request->hbsag;
                $donor->vdrl = $request->vdrl;
                $donor->is_aadhar = $request->is_aadhar;
                $aadharImages = [];
                if (!empty($request->aadhar_image)) {
                    $images = $request->aadhar_image;
                    foreach($images as $image){
                        $name = \Carbon\Carbon::now()->format('YmdHisu') . '_' . str_replace(',', '_', $image->getClientOriginalName());
                        // $destinationPath = ;
                        $image->move(public_path('/upload/donor'), $name);
                        $aadharImages[] = 'public/upload/donor/' . $name;
                    }
                }
                $donor->aadhar_image = implode(', ', $aadharImages);
                // $donor->aadhar_image = $request->aadhar_image;

                if (!empty($request->image)) {
                    $image = $request->image;
                    $name = \Carbon\Carbon::now()->format('YmdHisu') . '_' . str_replace(',', '_', $image->getClientOriginalName());
                    $destinationPath = public_path('/upload/donor');
                    $image->move($destinationPath, $name);
                    $request->image = 'public/upload/donor/' . $name;
                }

                $donor->image = $request->image;
                $donor->save();
            }

            $appointment = $this->Appointment;
            $appointment->patients_id = $opdPatient->id;
            $appointment->category_id = 7;
            $appointment->date = !empty($request->date) ? Carbon::parse($request->date)->format('Y-m-d') : null;
            $appointment->time = !empty($request->time) ? Carbon::parse($request->time)->format('H:i:s'): null;
            $appointment->arrival_time = !empty($request->arrival_time) ? Carbon::parse($request->arrival_time)->format('H:i:s'): null;
            $appointment->remark = $request->remark;
            $appointment->created_by = \Auth()->user()->id;
            $appointment->save();

            DB::commit();
            return redirect('donor')->with('msg','Donor has been added.');
        } catch(Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }

    /**
    * Return appointment donor edit blade
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function edit(Request $request, $id) {
        try {
            $appointmentId = decrypt($id);
        } catch (Exception $exception) {
            log::debug($exception);
            return redirect('donor');
        }
        try {

            $appointment = $this->Appointment->whereId($appointmentId)->first();
            $patient = $this->OpdPatients->whereId($appointment->patients_id)->first();
            $donor = $this->Donor->wherePatientsId($appointment->patients_id)->first();
            return view('admin.appointment.donor.edit',compact('appointment','patient','donor'));
        } catch (Exception $exception) {
            log::debug($exception);
            return redirect('donor');
        }
    }

    /**
    * Update Appointment donor
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request) {
        try {
            $appointmentId = decrypt($request->appointment_id);
            $donorId = decrypt($request->donor_id);
        } catch (Exception $exception) {
            log::debug($exception);
            return redirect('donor');
        }

        try {
            $opdPatients = $this->OpdPatients->whereCode($request->code)->first();
            if ($opdPatients == null) {
                Session::flash('msg',"Something went wrong");
                return redirect('donor');
            }

            $rule = [
                'name' => 'required',
                'date' => 'required',
                'age' => 'required|numeric|between:1,100',
                'gender' => 'required',
                'mobile_number' => 'required|numeric|digits:10|unique:patients,mobile_number,'.$opdPatients->id,
            ];


            $valid = Validator::make($request->all(),$rule);
            if($valid->fails()){
                return redirect()->back()
                    ->withErrors($valid->errors())
                    ->withInput();
            }

            $opdPatients->name = $request->name;
            $opdPatients->height = $request->height;
            $opdPatients->weight = $request->weight;
            $opdPatients->gender = $request->gender;
            $opdPatients->age = $request->age;
            $opdPatients->mobile_number = $request->mobile_number;
            $opdPatients->other_mobile_number = $request->other_mobile_number;
            $opdPatients->created_by = Auth::user()->id;
            $opdPatients->save();

            $appointment = $this->Appointment->whereId($appointmentId)->first();
            $appointment->date = !empty($request->date) ? Carbon::parse($request->date)->format('Y-m-d') : null;
            $appointment->time = !empty($request->time) ? Carbon::parse($request->time)->format('H:i:s'): null;
            $appointment->arrival_time = !empty($request->arrival_time) ? Carbon::parse($request->arrival_time)->format('H:i:s'): null;
            $appointment->remark = $request->remark;
            $appointment->created_by = \Auth()->user()->id;
            $appointment->save();

            $donor = $this->Donor->whereId($donorId)->first();
            $donor->face_color = $request->face_color;
            $donor->hair_color = $request->hair_color;
            $donor->eye_color = $request->eye_color;
            $donor->cbc_mp = $request->cbc_mp;
            $donor->urine = $request->urine;
            $donor->blood_group = $request->blood_group;
            $donor->rbs = $request->rbs;
            $donor->hiv = $request->hiv;
            $donor->hbsag = $request->hbsag;
            $donor->vdrl = $request->vdrl;
            $donor->is_aadhar = $request->is_aadhar;

            if (!empty($request->aadhar_image)) {
                $aadharImages = [];
                $oldAadharImages = explode(', ',$donor->aadhar_image);
                if (!empty($oldAadharImages)) {
                    foreach($oldAadharImages as $image){
                        $this->removeImage($image);
                    }
                }
                $images = $request->aadhar_image;
                foreach($images as $image){
                    $name = \Carbon\Carbon::now()->format('YmdHisu') . '_' . str_replace(',', '_', $image->getClientOriginalName());
                    $image->move(public_path('/upload/donor'), $name);
                    $aadharImages[] = 'public/upload/donor/' . $name;
                }
                $donor->aadhar_image = implode(', ', $aadharImages);
            }

            if (!empty($request->image)) {
                if(!empty($donor->image)){
                    $this->removeImage($donor->image);
                }
                $image = $request->image;
                $name = \Carbon\Carbon::now()->format('YmdHisu') . '_' . str_replace(',', '_', $image->getClientOriginalName());
                $destinationPath = public_path('/upload/donor');
                $image->move($destinationPath, $name);
                $donor->image = 'public/upload/donor/' . $name;
            }

            $donor->save();

            return redirect('donor');
        } catch (Exception $exception) {
            log::debug($exception);
            return redirect('donor');
        }
    }
    /**
    * Return Patients detail
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function getPatientDetails(Request $request) {
        try {
            $patient = $this->OpdPatients->whereCode($request->code)->first();
            if ($patient) {
                return [
                    'status' => 1,
                    'data' => $patient
                ];
            }
            return [
                'status' => 0,
                'message' => 'Patient not found'
            ];
        } catch(Exception $e) {
            return [
                'status' => false,
                'message' => 'Internal Server Erro'
            ];
            abort(500);
        }
    }

    /**
    * Generate code for patients
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    private function generateCode($patientsId, $name){
        $name = preg_replace('/\s+/', ' ', $name);
        $name = explode(' ', $name);
        $code = strtoupper($name[0][0]);

        $code .= (!empty($name[1])) ? strtoupper($name[1][0]) : 'R';
        $code .= (!empty($name[2])) ? strtoupper($name[2][0]) : 'R';

        $code .= $patientsId;
        $code = preg_replace('/[^A-Za-z0-9\-]/', 'R', $code);
        return ['code'=>$code];
    }


    /**
    * Delete appointment 
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request) {
        try {
            $appointmentId = decrypt($request->appointment_id);
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => 'Invalid Id'
            ];
        }

        try {
            $appointment = $this->Appointment->whereId($appointmentId)->first();
            $appointment->delete();
            return [
                'status' => true,
                'message' => 'Successfully deleted donor appointment'
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => 'Please try again later'
            ];
        }
    }
}

