<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Validator;
use Auth;
use View;
use Log;
use DB;


class HolidayManagerController extends AdminController
{

    /**
    * Return on holiday blade
    * @param  \Illuminate\Http\Request 
    * @return \Illuminate\Http\Response
    */
    public function index(){
        $holiday = $this->HolidayManager->get();
        $event=$this->Event->get();
        return view('admin.holiday_manager.index',compact('holiday','event'));
    }

    /**
    * Store Holiday
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        try{
            $holiday = $this->HolidayManager;
            $holiday->name = $request->name;
            $holiday->description = '';
            $holiday->from_date = Carbon::parse($request->startdate)->format('Y-m-d');
            $holiday->to_date = Carbon::parse($request->enddate)->subDays(1)->format('Y-m-d');
            $holiday->end_date = Carbon::parse($request->enddate)->format('Y-m-d');
            $holiday->created_by = \Auth()->user()->id;
            $holiday->save();
            return 'true';
        }catch(Exception $e){
            \Log::debug($e->getMessage());
        }

    }

    /**
    * update Holiday
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request){
        try{
            $holiday = $this->HolidayManager->find($request->id);
            $holiday->name = $request->name;
            $holiday->description = '';
            if($request->startdate && $request->enddate){
                $holiday->from_date = Carbon::parse($request->startdate)->format('Y-m-d');
                $holiday->to_date = Carbon::parse($request->enddate)->subDays(1)->format('Y-m-d');
                $holiday->end_date = Carbon::parse($request->enddate)->format('Y-m-d');
            }
            $holiday->created_by = \Auth()->user()->id;
            $holiday->save();
            return 'true';
        }catch(Exception $e){
            \Log::debug($e->getMessage());
        }
    }

    /**
    * Delete Holiday
    * @param  \Illuminate\Http\Request $id
    * @return \Illuminate\Http\Response
    */
    public function delete($id){
        try {
            $holiday = $this->HolidayManager->find($id);
            $holiday->delete();
            return 'true';
        } catch (Exception $e) {
            \Log::debug($e->getMessage());
        }
    }
}
