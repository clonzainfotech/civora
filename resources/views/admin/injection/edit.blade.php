@extends('layouts.main')
@section('parentPageTitle', 'CA Expense')
@section('title', 'Edit CA Expense')

@section('page-style')

@stop

@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Edit CA Expense</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::previous()}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    {{Form::open(['url'=>'ca-expense/'.$ca_expense->id,'method'=>'put','class'=>'form caExpense-form','files'=>'true'])}}
                        <div class="row clearfix">
                            
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Name :</span>
                                    {{Form::text('name',$ca_expense->name,['class'=>'form-control','placeholder'=>'Name'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('name')}}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::select('bank_id',$bank_details,$ca_expense->bank_id,['class'=>'form-control select-padding-0','placeholder'=>'Select Bank'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('bank_id')}}
                                </span>
                            </div>  
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Amount :</span>
                                    {{Form::text('amount',$ca_expense->amount,['class'=>'form-control','placeholder'=>'Amount'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('amount')}}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Invoice_No :</span>
                                    {{Form::text('invoice_no',$ca_expense->invoice_no,['class'=>'form-control','placeholder'=>'Invoice_No'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('invoice_no')}}
                                </span>
                            </div> 
                            <div class="col-sm-12">
                                <div class="input-group">
                                    {{Form::textarea('detail',$ca_expense->detail, ['class'=>'form-control no-resize detail','placeholder'=>'Detail','rows'=>'2'])}}
                                </div>
                            </div>  
                            <div class="col-sm-12">
                                {{Form::submit('Save',['class'=>'btn btn-primary caExpense-save'])}}
                                <a href="{{URL::to('category')}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".caExpense-form").submit(function() { $(".caExpense-save").attr("disabled", true); });
    });
</script>
@stop