@extends('layouts.main')
@section('parentPageTitle', 'Indoor')
@section('title', 'Add Indoor')

@section('page-style')

@stop

@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Add Rooms</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('indoorsetting')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    {{Form::open(['url'=>'indoorstore','method'=>'post','class'=>'form','files'=>'true'])}}
                        <div class="row clearfix">

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Room Type : &nbsp;</span>
                                    {{Form::text('roomtype', null,[
                                        'class'=>'form-control',
                                        'placeholder'=>'Enter Type of Room',
                                        'required',
                                        'maxlength' => 255,
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('roomtype')}}
                                </span>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Total Rooms  : &nbsp;</span>
                                    {{Form::text('room', null,[
                                        'class'=>'form-control room_no',
                                        'placeholder'=>'Add Total Room',
                                        'required',
                                        'maxlength' => 2,
                                        'oninput' => 'checkNumberOfRoom(this.value)'
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('room')}}
                                </span>
                            </div>
                        </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="room_data">
                            </div>
                        </div>
                    </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Price : &nbsp;</span>
                                    {{Form::number('price', null,[
                                        'class'=>'form-control',
                                        'placeholder'=>'Enter Price',
                                        'required',
                                        'min' => 0
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('price')}}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Nursing Charge : &nbsp;</span>
                                    {{Form::number('nursing_charge', null,[
                                        'class'=>'form-control',
                                        'placeholder'=>'Enter Nursing Charge',
                                        'required',
                                        'min' => 0
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('nursing_charge')}}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Dr. Visit Charge : &nbsp;</span>
                                    {{Form::number('dr_visit_charge', null,[
                                        'class'=>'form-control',
                                        'placeholder'=>'Enter Dr. Visit Charge',
                                        'required',
                                        'min' => 0
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('dr_visit_charge')}}
                                </span>
                            </div>
                        </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                            <a href="{{URL::to('indoorsetting')}}" class="btn btn-default">Cancel</a>
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
        function validNumber(value) {
            if (/[a-zA-Z!@#$&()\\`.+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
                return value.substring(0, (value.length - 1));
            } else {
                return value;
            }
        }

        function checkNumber(value) {
            $('.Bed-number').val(validNumber(value));
        }
        function checkNumberOfRoom(value) {
            $('.room_no').val(validNumber(value));
        }
    </script>
@stop
