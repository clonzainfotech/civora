<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Base\Admin\AdminController;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use View;

class TestimonialController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $testimonial = $this->Testimonial->orderBy('id','DESC');
        
            $testimonial = $testimonial->select('*',DB::raw('(CASE WHEN status = 1 THEN "Active" ELSE "Deactive" END) AS status'));

            // search text
            $search = $request->search;
            if($search){
                $testimonial = $testimonial->where(function($query) use($search){
                    $query->where('author', 'LIKE', '%'.$search.'%');
                });
            }

            // status wise filter 
            $status = $request->status;
            if($request->status){
                $testimonial = $testimonial->whereStatus($status);
            }

            $testimonial = $testimonial->paginate(100);
            if($request->isprint == 1){
                $testimonial = $this->Testimonial->orderBy('id','DESC');
                $testimonial = $testimonial->select('*',DB::raw('(CASE WHEN status = 1 THEN "Active" ELSE "Deactive" END) AS status'))->get();
                $data['status'] = 2;
                $data['data'] = View::make('admin.testimonial.preview',compact('testimonial'))->render();
                return $data;
            }
            $data['status'] = 1;
            $data['data'] = View::make('admin.testimonial.data',compact('testimonial'))->render();
            return $data;
        }
        return view('admin.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $rule = [
                'testimonial' => 'required',
                'author' => 'required'
            ];
    
            $validator = Validator::make($request->all(),$rule);
    
            if($validator->fails()){
                return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors());
            }

           
            $testimonial = $this->Testimonial;
            $testimonial->testimonial = $request->testimonial;
            $testimonial->author = $request->author;
            $testimonial->status = $request->status;
            $testimonial->sort_order = $request->sortorder;
            $testimonial->save();
           return redirect('testimonials')->with('msg','Your record successfully added.');
        }catch(Exception $e){
            abort(500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $testimonialId = decrypt($id);
            $testimonial = $this->Testimonial->find($testimonialId);
            return view('admin.testimonial.edit',compact('testimonial'));
        }catch(Exception $e){
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            // dd('here');
            $rule = [
                'testimonial' => 'required',
                'author' => 'required'
            ];
    
            $validator = Validator::make($request->all(),$rule);
    
            if($validator->fails()){
                return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors());
            }

           $testimonial = $this->Testimonial->find($id);
           $testimonial->testimonial = $request->testimonial;
           $testimonial->author = $request->author;
           $testimonial->status = $request->status;
           $testimonial->sort_order = $request->sortorder;
           $testimonial->save();

           return redirect('testimonials')->with('msg','Your record successfully updated.');
        }catch(Exception $e){
            abort(500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $testimonial = $this->Testimonial->find($id);
            // dd($testimonial);
            $testimonial->delete();
            return 'true';
        }catch(Exception $e){
            // dd($e);
            return 'false';
        }
    }
}
