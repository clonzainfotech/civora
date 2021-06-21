@extends('layouts.main')
@section('parentPageTitle', 'Medicine')
@section('title', 'Add Medicine')

@section('page-style')
@stop
@section('content')
    <div class="row clearfix ivf">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Add Medicine</strong>
                    </h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('medicines-setting')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    {{Form::open(['url'=>'medicines-setting','method'=>'post','class'=>'form','files'=>'true'])}}
                        {{Form::hidden('medicine_id',!empty($medicine->id) ? encrypt($medicine->id) : null)}}
                        @php
                            $mTimeData = !empty($medicine->medicine_time) ? $medicine->medicine_time : null;
                            if(!empty($mTimeData)){
                                $mTimeData = json_decode($mTimeData);
                            }
                        @endphp
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::select('complaint[]',$co,!empty($mCo) ? $mCo : null,['class'=>'form-control select-padding-0','multiple'=>'true','title'=>'Select Complaint','data-live-search'=>'true'])}}
                                </div>
                                <span class="form-error-msg user_error">
                                    {{$errors->first('complaint')}}
                                </span>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Name : &nbsp;</span>
                                    {{Form::text('name',!empty($medicine->name) ? $medicine->name : null,['class'=>'form-control','placeholder'=>'Name','id'=>'name'])}}
                                </div>
                                <span class="form-error-msg user_error">
                                    {{$errors->first('name')}}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::select('medicine_status',$mStatus,!empty($medicine->medicine_status) ? $medicine->medicine_status : null,['class'=>'form-control select-padding-0','placeholder'=>'Select Medicine Status'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::select('medicine_dose',$dose,!empty($medicine->medicine_dose) ? $medicine->medicine_dose : null,['class'=>'form-control select-padding-0','placeholder'=>'Select Medicine Dose'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Medicine Day : &nbsp;</span>
                                    {{Form::number('medicine_day',!empty($medicine->number) ? $medicine->number : null,['class'=>'form-control','placeholder'=>'Medicine Day'])}}
                                </div>
                                <span class="form-error-msg user_error">
                                    {{$errors->first('medicine_day')}}
                                </span>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Medicine Quantity : &nbsp;</span>
                                    {{Form::number('medicine_quantity',!empty($medicine->quantity) ? $medicine->quantity : null,['class'=>'form-control','placeholder'=>'Medicine Quantity'])}}
                                </div>
                                <span class="form-error-msg user_error">
                                    {{$errors->first('medicine_quantity')}}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::select('medicine_time[]',$mTime,!empty($mTimeData) ? $mTimeData : null,['class'=>'form-control select-padding-0','multiple'=>'true','title'=>'Select Medicine Time'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {{Form::submit('submit',['class'=>'btn btn-primary'])}}
                                <a href="{{URL::to('medicines-setting')}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
    <script>
        $.fn.selectpicker.Constructor.DEFAULTS.iconBase = 'zmdi';
        $.fn.selectpicker.Constructor.DEFAULTS.tickIcon = 'zmdi-check';
    </script>
@stop