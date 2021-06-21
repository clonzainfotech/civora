<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\Admin\AdminController;

class SmsTemplateController extends AdminController
{
    /**
    * Return on sms template
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function getSmsTemplate(Request $request) {
        $template = $this->SmsTemplate->whereId($request->id)->select('template')->first();
        return json_encode($template);
    }
}
