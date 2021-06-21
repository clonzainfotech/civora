<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Auth;
class ReviewController extends AdminController
{
    /**
    * Return on review index page
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request) {
        $patients = $this->getPatients();
        if ($request->ajax()) {
            $reviewData = $this->OpdPatients;
            $patientId = $request->patient_id;
            if ($patientId) {
                $reviewData = $reviewData->where('id', $patientId);
            }
            $roleId = $request->role_id;
            $reviewData = $reviewData
                ->whereHas('getReviewData', function ($query) use ($roleId) {
                    if($roleId) {
                        $query->where('role_id', $roleId);
                    }
                })
                ->with([
                    'getReviewData' => function ($review) use ($roleId) {
                        if($roleId) {
                            $review->where('role_id', $roleId);
                        }
                    }
                ])
                ->paginate(100);
            if($request->isprint == 1){
                $reviewData = $this->OpdPatients->whereHas('getReviewData')->with('getReviewData')->get();
                $data['status'] = 2;
                $data['review'] = View::make('admin.review.preview',compact('reviewData'))->render();
                return $data;
            }
            $data['status'] = 1;
            $data['review'] = View::make('admin.review.data',compact('reviewData'))->render();
            return $data;
        }
        $reviewRole = $this->ReviewRole->pluck('name','id');
        return view('admin.review.index',compact('reviewRole', 'patients'));
    }

    /**
    * Delete review
    * @param  \Illuminate\Http\Request $id
    * @return \Illuminate\Http\Response
    */
    public function delete($id) {
        try {
            $review = $this->UserReview->wherePatientId($id)->get();
            foreach($review as $review) {
                $reviewDelete = $this->UserReview->find($review->id);
                $reviewDelete->deleted_by = Auth::id();
                $reviewDelete->save();
                $reviewDelete->delete();
            }

            return [
                'status' => true,
                'message' => 'Successfully deleted note'
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => 'Please try again later'
            ];
        }
    }
}
