<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class IndoorDeposit extends BaseModel
{
    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patient_id');
    }

    public function getUsers(){
        return $this->belongsTo('App\User','admin_id');
    }

    public function reDrName(){
        return $this->belongsTo('App\Models\ReferenceDoctor','reference_doctor_id');
    }

    public function checkIndorDeposit(){
        $checkPatients = self::where('patient_id',$this->patient_id)->where('charge_type',$this->charge_type)->orderBy('id','DESC')->first();
        $id = null;
        if($checkPatients){
            $id = $checkPatients->id;
        }
        return ['id'=>$id];
    }

    public function getReferenceDoctors(){
        return $this->belongsTo('App\Models\ReferenceDoctor','reference_doctor_id');
    }
}
