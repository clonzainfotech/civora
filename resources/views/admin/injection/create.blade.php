@extends('layouts.main')
@section('parentPageTitle', 'CA Expense')
@section('title', 'Add CA Expense')

@section('page-style')

@stop

@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Add CA Expense</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('ca-expense')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    @if(Session::has('ca-msg'))
                        <div class="alert alert-warning">
                            <strong>Warning!</strong> {{Session::get('ca-msg')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    @endif
                    {{Form::open(['url'=>'ca-expense/store','method'=>'post','class'=>'form ca-expense-form','files'=>'true'])}}
                        <div class="row clearfix">
                            
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Name :</span>
                                    {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('name')}}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::select('bank_id',$bank_details,'',['class'=>'form-control select-padding-0','placeholder'=>'Select Bank'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('bank_id')}}
                                </span>
                            </div>  
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Amount :</span>
                                    {{Form::text('amount','',['class'=>'form-control','placeholder'=>'Amount'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('amount')}}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Invoice_No :</span>
                                    {{Form::text('invoice_no','',['class'=>'form-control','placeholder'=>'Invoice_No'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('invoice_no')}}
                                </span>
                            </div> 
                            <div class="col-sm-12">
                                <div class="input-group">
                                    {{Form::textarea('detail','', ['class'=>'form-control no-resize detail','placeholder'=>'Detail','rows'=>'2'])}}
                                </div>
                            </div>  
                            <div class="col-sm-12">
                                {{Form::submit('Save',['class'=>'btn btn-primary ca-expense-save'])}}
                                <a href="{{URL::to('ca-expense')}}" class="btn btn-default">Cancel</a>
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
        $(".ca-expense-form").submit(function() { $(".ca-expense-save").attr("disabled", true); });
    });
</script>
@stop