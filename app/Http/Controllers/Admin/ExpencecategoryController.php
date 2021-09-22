<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\Admin\AdminController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Validator;
use View;
use Auth;
use Log;
use DB;


class ExpencecategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            if($request->ajax()){
                $expense = $this->ExpenseCategory->where('type','=','2')->orderBy('id', 'desc');
                $search = $request->search;
                if($search){
                    $expense = $expense->where(function($query) use($search){
                        $query->where('name','LIKE','%'.$search.'%');
                    });
                }
                $expense = $expense->paginate(100);
                return response()->json([
                    View::make('admin.expense_manager.categoryData',compact('expense'))->render()
                ]);
            }
            return view('admin.expense_manager.category');
        }catch(Exception $e){
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.expense_manager.categoryAdd');
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
            $expense = $this->ExpenseCategory;
            $expense->name = $request->name;
            $expense->status = $request->status;
            $expense->type = $request->type;
            $expense->is_pediatric = $request->pediatric;
            $expense->created_by = \Auth()->user()->id;
            $expense->save();
            return redirect('expense-category');
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $expense = $this->ExpenseCategory->find($request->id);
            $expense->name = $request->name;
            $expense->status = $request->status;
            $expense->type = $request->type;
            $expense->is_pediatric = $request->pediatric;
            $expense->created_by = \Auth()->user()->id;
            $expense->save();
            return redirect('expense-category');
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
        //
    }
}
