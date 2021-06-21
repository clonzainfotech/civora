@extends('layouts.main')
@section('parentPageTitle', 'Expense')
@section('title', 'Add Expense')

@section('page-style')


@stop

@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Add Expense</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('expense-manager')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="col-md-12 col-lg-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                            {{Form::open(['url'=>'expense-manager','method'=>'post','class'=>'form appointment-form expense-form','files'=>'true'])}}
                                <!-- patients basic information -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading" role="tab" id="headingThree_1">
                                        <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#patients" aria-expanded="true"
                                                aria-controls="patients"> Add Expense</a> </h4>
                                    </div>
                                    <div id="patients" class="" role="tabpanel" aria-labelledby="headingThree_1">
                                        <div class="panel-body">
                                            <div class="row clearfix">
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="zmdi zmdi-calendar"></i>
                                                        </span>
                                                        {{Form::text('date',\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y'),['class'=>'form-control datetimepicker date','placeholder'=>'Date','required'])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('date')}}
                                                    </span>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {{Form::number('amount','',['class'=>'form-control amount','placeholder'=>'Amount','required'])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('amount')}}
                                                    </span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {{Form::select('payment_method',['2'=>'Swipe','1'=>'Cash','3'=>'Cheque','4'=>'UPI','5'=>'NEFT'],'',['class'=>'form-control select-padding-0','id'=>'payment_method','placeholder'=>'Select Payment Method'])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('payment_method')}}
                                                    </span>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {{Form::text('given_for','',['class'=>'form-control given_for','placeholder'=>'Given for','required'])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('given_for')}}
                                                    </span>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        {{Form::select('expensecategory',$expensecategory,!empty($patientData->getAppointment['category_id']) ? $patientData->getAppointment['category_id'] : null,['class'=>'form-control select-padding-0 category_data','placeholder'=>'Select Category','required'])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('category')}}
                                                    </span>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        {{Form::textarea('note','',['class'=>'form-control no-resize remark','placeholder'=>'Notes','rows'=>'2'])}}
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    {{Form::submit('Submit',['class'=>'btn btn-primary expense-save'])}}
                                    <a href="{{URL::to('expense-manager')}}" class="btn btn-default">Cancel</a>
                                </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
    <script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
    <script>    $.fn.selectpicker.Constructor.DEFAULTS.iconBase = 'zmdi';
    $.fn.selectpicker.Constructor.DEFAULTS.tickIcon = 'zmdi-check';</script>
    <script type="text/javascript">

        var code = '';
        $(".expense-form").submit(function() { $(".expense-save").attr("disabled", true); });
        $(function () {
            $('.datetimepicker').bootstrapMaterialDatePicker({
                format: 'dddd DD MMMM YYYY',
                clearButton: true,
                time:false,
                weekStart: 1
            });
        });
    </script>
@stop
