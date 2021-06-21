<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Validator;
use Exception;
use Log;


class HospitalAddressController extends AdminController
{
    /**
    * Add Hospital Address
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function add(Request $request) {
        try {
            $rule = [
                'address' => 'required',
                // 'mobile' => 'required|numeric|digits:10|unique:hospital_addresses,mobile',
                'email' => 'required|max:50|unique:hospital_addresses,email',
            ];
            // if ($request->)
            $valid = Validator::make($request->all(),$rule);
            if($valid->fails()){
                return [
                    'status' => 2,
                    'error' => $valid->errors()
                ];
            }
            $hospitalAddress = $this->HospitalAddress;
            $hospitalAddress->address = $request->address;
            // dd($hospitalAddress);
            $hospitalAddress->mobile = $request->mobile;
            $hospitalAddress->email = $request->email;
            if($hospitalAddress->save()){
                return [
                    'status' => 1,
                    'message' => 'Address successfully added'
                ];
            }
        } catch (Exception $exception) {
            log::debug($exception);
            return redirect('systemsetting');
        }
    }

    /**
    * Get Hospital Address
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function getHospitalAddress(Request $request) {
        // dd($request->all());
        try {
            $id = decrypt($request->id);
        } catch (Exception $exception) {
            return [
                'status' => 2,
                'message' => 'something went wrong'
            ];
        }
        try {
            $hospitalAddress = $this->HospitalAddress->whereId($id)->first();
            return [
                'status' => 1,
                'data' => $hospitalAddress,
                'message' => 'Address successfully added'
            ];
        } catch(Exception $exception) {
            return [
                'status' => 2,
                'message' => 'Internal server error'
            ];
        }
    }

    /**
    * Update Hospital Address
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request) {
        try {
            $rule = [
                'address' => 'required',
                // 'mobile' => 'required|numeric|digits:10|unique:hospital_addresses,mobile,' . $request->hospital_address_id,
                'email' => 'required|max:50|unique:hospital_addresses,email,' . $request->hospital_address_id,
            ];

            $valid = Validator::make($request->all(),$rule);
            if($valid->fails()){
                return [
                    'status' => 2,
                    'error' => $valid->errors()
                ];
            }
            $hospitalAddress = $this->HospitalAddress->whereId($request->hospital_address_id)->first();
            $hospitalAddress->address = $request->address;
            $hospitalAddress->mobile = $request->mobile;
            $hospitalAddress->email = $request->email;
            if($hospitalAddress->save()){
                return [
                    'status' => 1,
                    'message' => 'Address successfully updated'
                ];
            }
        } catch (Exception $exception) {
            log::debug($exception);
            return redirect('systemsetting');
        }
    }

    /**
    * Delete Hospital Address
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request) {
        // dd($request->all());
        try {
            $id = decrypt($request->id);
        } catch (Exception $exception) {
            return [
                'status' => 2,
                'message' => 'Something went wrong'
            ];
        }
        try {
            $hospitalAddress = $this->HospitalAddress->whereId($id)->delete();
            return [
                'status' => 1,
                'message' => 'Address successfully deleted'
            ];
        } catch (Exception $exception) {
            log::debug($exception);
            return [
                'status' => 2,
                'message' => 'Internal server error'
            ];
        }
    }
}
