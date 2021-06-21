<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Admin\AdminController;
use Exception;
use Validator;
use Auth;
use View;

class ReferenceDoctorProController extends AdminController
{

    // get all pro reference doctor and here also search functionality work on mobile number and doctor name wise
    public function index(Request $request){
        try{
            $referenceDoctors = collect($this->ReferenceDoctorPro->orderBy('name','ASC')->pluck('name', 'id'))
                ->map(function ($query) {
                    $query = ucwords(strtolower($query));
                    return $query;
                });
            if($request->ajax()){
                $referenceDoctor = $this->ReferenceDoctorPro->orderBy('name','asc');

                $referenceDoctorId = $request->reference_doctor_id;
                if($referenceDoctorId){
                    $referenceDoctor = $referenceDoctor->where(function($query) use($referenceDoctorId){
                        $query->where('id', $referenceDoctorId);
                    });
                }
                $search = $request->search;
                if($search){
                    $referenceDoctor = $referenceDoctor->where(function($query) use($search){
                        $query->where('mobile_number','LIKE','%'.$search.'%')
                        ->orWhere('name','LIKE','%'.$search.'%');
                    });
                }
                if($request->isprint == 1){
                    $referenceDoctor = $this->ReferenceDoctorPro->orderBy('name','asc')->get();
                    $data['status'] = 2;
                    $data['reference_data'] = View::make('admin.reference_doctor_pro.preview',compact('referenceDoctor'))->render();
                    return $data; 
                }
                $referenceDoctor = $referenceDoctor->paginate(100);
            
                $data['status'] = 1;
                $data['reference_data'] = View::make('admin.reference_doctor_pro.data',compact('referenceDoctor'))->render();
                return $data; 
            }
            return view('admin.reference_doctor_pro.index', compact('referenceDoctors'));
        }catch(Exception $e){
            abort(500);
        }
    }

    /**
    * Add pro reference doctor
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        try{
            $referenceDoctorId = null;
            
            $referenceDoctor = $this->ReferenceDoctorPro;

            if($request->id){
                $referenceDoctorId = decrypt($request->id);
                $referenceDoctor = $this->ReferenceDoctorPro->find($referenceDoctorId);
            }  

            $rule = [
                'name' => 'required',
                'mobile_number' => 'required|digits:10|min:0|numeric|unique:reference_doctor_pro,mobile_number,'.$referenceDoctorId
            ];

            $message = [
                'mobile_number.min' => 'Please enter valid mobile number.',
            ];
            
            $valid = Validator::make($request->all(),$rule,$message);
            if($valid->fails()){
                return redirect()->back()
                        ->withErrors($valid->errors())
                        ->withInput();
            }

            $referenceDoctor->name = $request->name;
            $referenceDoctor->mobile_number = $request->mobile_number;
            $referenceDoctor->address = $request->address;
            $referenceDoctor->created_by = Auth::user()->id;
            $referenceDoctor->save();
            return redirect('reference-doctor-pro');
        }catch(Exception $e){
            abort(500);
        }
    }

    public function create(){
        return view('admin.reference_doctor_pro.create');
    }

    /**
    * Return on pro reference doctor edit
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function edit($id){
        try{
            $referenceDoctorId = decrypt($id);
            $referenceDoctor = $this->ReferenceDoctorPro->find($referenceDoctorId);
            return view('admin.reference_doctor_pro.edit',compact('referenceDoctor'));
        }catch(Exception $e){
            return back();
        }
    }

    /**
    * Delete pro reference doctor
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function delete($id){
        try{
            $referenceDoctorId = decrypt($id);
            $referenceDoctor = $this->ReferenceDoctorPro->find($referenceDoctorId);
            $referenceDoctor->deleted_by = Auth::user()->id;
            $referenceDoctor->save();
            $referenceDoctor->delete();
            return 'true';
        }catch(Exceptoin $e){
            return 'false';
        }
    }
}
