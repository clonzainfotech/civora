<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Exception;
use Session;
use View;
use Auth;
use DB;

class CategoryController extends AdminController
{

    // category all listing using this function
    public function index(Request $request){
        try{
            if($request->ajax()) {
                $category = $this->Category->orderBy('id','DESC');
            
                $category = $category->select('*',DB::raw('(CASE WHEN status = 1 THEN "Active" ELSE "Deactive" END) AS status'));

                // search text
                $search = $request->search;
                if($search){
                    $category = $category->where(function($query) use($search){
                        $query->where('name', 'LIKE', '%'.$search.'%');
                    });
                }

                // status wise filter 
                $status = $request->status;
                if($request->status){
                    $category = $category->whereStatus($status);
                }
                if($request->isprint){
                    $category = $this->Category->orderBy('id','DESC');
                    $category = $category->select('*',DB::raw('(CASE WHEN status = 1 THEN "Active" ELSE "Deactive" END) AS status'))->get();
                    $data['status'] = 2;
                    $data['category'] = View::make('admin.category.preview',compact('category'))->render();
                    return $data;   
                }
                $category = $category->paginate(100);
                $data['status'] = 1;
                $data['category'] = View::make('admin.category.data',compact('category'))->render();
                return $data;   
            }
            return view('admin.category.index');
        }catch(Exception $e){
            abort(500);
        }
    }

    // category create page open
    public function create(){
        return view('admin.category.create');
    }

    // category store on database using this function
    public function store(Request $request){
        try{
            $rule = [
                'name' => 'required',
                'status' => 'required'
            ];
    
            $validator = Validator::make($request->all(),$rule);
    
            if($validator->fails()){
                return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors());
            }

            $checkCategory = $this->Category->where('name', 'LIKE', '%'.$request->name.'%')->first();
            if($checkCategory){
                Session::flash('categorymsg','This category is alread exists.');     
                return back()->withInput();
            }
            $category = $this->Category;
            $category->name = $request->name;
            $category->status = $request->status;
            $category->created_by = Auth::user()->id;
           $category->save();
           return redirect('category')->with('msg','Your record successfully added.');
        }catch(Exception $e){
            abort(500);
        }

    }

    // fetach query on database using category id
    public function edit($id){
        try{
            $categoryId = decrypt($id);
            $category = $this->Category->find($categoryId);
            return view('admin.category.edit',compact('category'));
        }catch(Exception $e){
            return back();
        }
    }

    // category update using this function via category id
    public function update(Request $request,$id){
        try{
            $rule = [
                'name' => 'required',
                'status' => 'required'
            ];
    
            $validator = Validator::make($request->all(),$rule);
    
            if($validator->fails()){
                return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors());
            }

           $category = $this ->Category->find($id);
           $category->name = $request->name;
           $category->status = $request->status;
           $category->created_by = Auth::user()->id;
           $category->save();
           return redirect('category')->with('msg','Your record successfully updated.');
        }catch(Exception $e){
            abort(500);
        }

    }

    // category delete using this function via category id
    public function delete($id){
        try{
            $category = $this->Category->find($id);
            $category->delete();
            return 'true';
        }catch(Exception $e){
            return 'false';
        }
    }

    
}
