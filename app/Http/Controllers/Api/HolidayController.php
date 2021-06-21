<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Api\ApiController;

class HolidayController extends ApiController
{
    /**
    * Get List of holiday
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request){
        $token = $request->header('Authorization');

        if($token) {
            $holiday = $this->HolidayManager->select('name','from_date','to_date')->get();
            return $this->sendResponse('Get Holiday Schedule successfully', $holiday);
        }
        return $this->sendError(__('auth.failed'), 401);
    }

}
