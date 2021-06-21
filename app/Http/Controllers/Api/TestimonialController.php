<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Api\ApiController;

class TestimonialController extends ApiController
{
    /**
    * Return Testimonial list
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    
    public function index(Request $request){
        $token = $request->header('Authorization');

        if($token) {
            $testimonial = $this->Testimonial->select('testimonial','author')->where('status',1)->orderBy('sort_order', 'DESC')->get();
            if(!empty($testimonial)) {
                return $this->sendResponse('Get testimonials successfully', $testimonial);
            }
            return $this->sendError('Testimonials are not found');
        }
        return $this->sendError(__('auth.failed'), 401);
    }

}
