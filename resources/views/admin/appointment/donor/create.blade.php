@extends('layouts.main')
@section('parentPageTitle', 'Donor')
@section('title', 'Add Donor')

@section('page-style')

@stop

@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Add Donor</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('donor')}}">
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
                            {{Form::open([
                                'url' => 'store-donor',
                                'method' => 'POST',
                                'class' => 'form donor-form',
                                'files' => true,
                                'enctype' => 'multipart/form-data',
                            ])}}
                            <!-- notification -->
                            @if(Session::has('msg'))
                            <div class="alert alert-warning">
                                {{Session::get('msg')}}
                                <button type="button"
                                    class="close"
                                    data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="zmdi zmdi-close"></i>
                                    </span>
                                </button>
                            </div>
                            @endif
                            <div class="panel panel-primary">
                                <div class="panel-heading"
                                    role="tab"
                                    id="headingThree_1">
                                    <h4 class="panel-title">
                                        <a class="collapsed"
                                            role="button"
                                            data-toggle="collapse"
                                            data-parent="#accordion_1"
                                            href="#patients"
                                            aria-expanded="true"
                                            aria-controls="patients">Patients Basic Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="patients"
                                    class=""
                                    role="tabpanel"
                                    aria-labelledby="headingThree_1">
                                    <div class="panel-body">
                                        <div class="row clearfix">
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Name : &nbsp;</span>
                                                    {{Form::text('name', null, [
                                                        'class'=>'form-control name',
                                                        'placeholder'=>'Name',
                                                        'required'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('name')}}
                                                </span>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Code : &nbsp;</span>
                                                    {{Form::text('code', null, [
                                                        'class'=>'form-control code',
                                                        'placeholder'=>'Code',
                                                        'autocomplete' => 'off'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg error-code"></span>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Height : &nbsp;</span>
                                                    {{Form::text('height', null, [
                                                        'class'=>'form-control height',
                                                        'placeholder'=>'Height',
                                                        'maxlength' => 3,
                                                        'required',
                                                        'autocomplete' => 'off',
                                                        'oninput' => 'checkHeight(this.value)'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('height')}}
                                                </span>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Weight : &nbsp;</span>
                                                    {{Form::text('weight', null, [
                                                        'class'=>'form-control weight',
                                                        'placeholder'=>'Weight in Kg',
                                                        'maxlength' => 3,
                                                        'required',
                                                        'autocomplete' => 'off',
                                                        'oninput' => 'checkWeight(this.value)'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('weight')}}
                                                </span>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Age : &nbsp;</span>
                                                    {{Form::text('age', null, [
                                                        'class'=>'form-control age',
                                                        'placeholder'=>'Age',
                                                        'maxlength' => 3,
                                                        'required',
                                                        'oninput' => 'checkAge(this.value)',
                                                        'autocomplete' => 'off'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('age')}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Apt. Date : &nbsp;</span>
                                                    {{Form::text('date',\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y'),[
                                                        'class'=>'form-control datetimepicker date',
                                                        'placeholder'=>'Date',
                                                        'required',
                                                        'autocomplete' => 'off'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('date')}}
                                                </span>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Apt. Time : &nbsp;</span>
                                                    {{ Form::text('time', null, [
                                                        'class'=>'form-control timepicker time',
                                                        'placeholder'=>'Time',
                                                        'autocomplete' => 'off'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('time')}}
                                                </span>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Arrival Time : &nbsp;</span>
                                                    {{Form::text('arrival_time', null, [
                                                        'class'=>'form-control timepicker arrival_time',
                                                        'placeholder'=>'Arrival Time',
                                                        'autocomplete' => 'off'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('arrival_time')}}
                                                </span>
                                            </div>
                                            </div>
                                            <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Mobile : &nbsp;</span>
                                                    {{Form::text('mobile_number', null, [
                                                        'class'=>'form-control mobile_number',
                                                        'placeholder'=>'Mobile Number',
                                                        'maxlength' => 10,
                                                        'required',
                                                        'oninput' => 'mobileNumber(this.value)'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('mobile_number')}}
                                                </span>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">Other Mobile : &nbsp;</span>
                                                    {{Form::text('other_mobile_number', null, [
                                                        'class'=>'form-control other_mobile_number',
                                                        'placeholder'=>'Other Mobile Number',
                                                        'maxlength' => 10,
                                                        'oninput' => 'otherMobileNumber(this.value)'
                                                    ])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{Form::select('gender',['2'=>'Female','1'=>'Male'], [
                                                        'class'=>'form-control select-padding-0 gender',
                                                        'id'=>'gender',
                                                        'required'
                                                    ])}}
                                                </div>
                                                <span class="form-error-msg">
                                                    {{$errors->first('gender')}}
                                                </span>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-1 unik-lbl-spn">
                                                        <label>Remark :</label>        
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div class="form-group">
                                                            {{Form::textarea('remark', null, [
                                                                'class'=>'form-control no-resize remark',
                                                                'placeholder'=>'Remark',
                                                                'rows'=>'5'
                                                            ])}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading"
                                    role="tab"
                                    id="headingThree_1">
                                    <h4 class="panel-title">
                                        <a class="collapsed"
                                            role="button"
                                            data-toggle="collapse"
                                            data-parent="#accordion_1"
                                            href="#donor"
                                            aria-expanded="true"
                                            aria-controls="donor">Donor Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="donor" class="" role="tabpanel" aria-labelledby="headingThree_1">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">
                                                        Face Color : &nbsp;
                                                    </span>
                                                    {{Form::text("face_color",'',[
                                                        'class'=>'form-control',
                                                        'placeholder' => 'Face Color'
                                                    ])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon  unik-lbl-spn">
                                                        Hair Color : &nbsp;
                                                    </span>
                                                    {{Form::text("hair_color",'',[
                                                        'class'=>'form-control',
                                                        'placeholder' => 'Hair Color'
                                                    ])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon  unik-lbl-spn">
                                                        Eye Color : &nbsp;
                                                    </span>
                                                    {{Form::text("eye_color",'',[
                                                        'class'=>'form-control',
                                                        'placeholder' => 'Eye Color'
                                                    ])}}
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon  unik-lbl-spn">
                                                        CBC MP : &nbsp;
                                                    </span>
                                                    {{Form::text("cbc_mp",'',[
                                                        'class'=>'form-control',
                                                        'placeholder' => 'CBC MP'
                                                    ])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon  unik-lbl-spn">
                                                        Urine : &nbsp;
                                                    </span>
                                                    {{Form::text("urine",'',[
                                                        'class'=>'form-control',
                                                        'placeholder' => 'Urine'
                                                    ])}}
                                                </div>
                                            </div>
                                            <div class="col-sm-1 unik-lbl-spn">
                                                Blood Group
                                            </div>
                                            <div class="col-sm-1">
                                                {{Form::select('blood_group',[
                                                    'A+' => 'A+',
                                                    'A-' => 'A-',
                                                    'B+' => 'B+',
                                                    'B-' => 'B-',
                                                    'O+' => 'O+',
                                                    'O-' => 'O-',
                                                    'AB+' => 'AB+',
                                                    'AB-' => 'AB-',
                                                ],[
                                                    'class'=>'form-control select-padding-0 blood-group',
                                                ])}}
                                            </div>
                                            
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <span class="input-group-addon  unik-lbl-spn">
                                                        RBS : &nbsp;
                                                    </span>
                                                    {{Form::text("rbs",'',[
                                                        'class'=>'form-control',
                                                        'placeholder' => 'RBS'
                                                    ])}}
                                                </div>
                                            </div>
                                            <div class="col-md-1 pr-0">
                                                <label class="vertical-form-label pr-0 unik-lbl-spn">
                                                    HIV :
                                                </label>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="radio is-conceived">
                                                    {{Form::radio("hiv",1,true,[
                                                        'id'=>'hiv_positive',
                                                        'class'=>'hiv'
                                                    ])}}
                                                    <label for="hiv_positive">
                                                        Positive
                                                    </label>
                                        
                                                    {{Form::radio("hiv",0,'',[
                                                        'id'=>'hiv_nagative',
                                                        'class'=>'hiv'
                                                    ])}}
                                                    <label for="hiv_nagative">
                                                        Negative
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pr-0">
                                                <label class="vertical-form-label pr-0 unik-lbl-spn">
                                                    HBSAG :
                                                </label>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="radio is-conceived">
                                                    {{Form::radio("hbsag",1,true,[
                                                        'id'=>'hbsag_positive',
                                                        'class'=>'hbsag'
                                                    ])}}
                                                    <label for="hbsag_positive">
                                                        Positive
                                                    </label>
                                        
                                                    {{Form::radio("hbsag",0,'',[
                                                        'id'=>'hbsag_nagative',
                                                        'class'=>'hbsag'
                                                    ])}}
                                                    <label for="hbsag_nagative">
                                                        Negative
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1 pr-0">
                                                <label class="vertical-form-label pr-0 unik-lbl-spn">
                                                    VDRL :
                                                </label>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="radio is-conceived">
                                                    {{Form::radio("vdrl",1,true,[
                                                        'id'=>'vdrl_positive',
                                                        'class'=>'vdrl'
                                                    ])}}
                                                    <label for="vdrl_positive">
                                                        Positive
                                                    </label>
                                        
                                                    {{Form::radio("vdrl",0,'',[
                                                        'id'=>'vdrl_nagative',
                                                        'class'=>'vdrl'
                                                    ])}}
                                                    <label for="vdrl_nagative">
                                                        Negative
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-2 pr-0">
                                                <label class="vertical-form-label pr-0 unik-lbl-spn">
                                                    Aadhar Card :
                                                </label>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="radio is-conceived">
                                                    {{Form::radio("is_aadhar",1,true,[
                                                        'id'=>'is_aadhar_yes',
                                                        'class'=>'aadhar-card'
                                                    ])}}
                                                    <label for="is_aadhar_yes">
                                                        Yes
                                                    </label>
                                        
                                                    {{Form::radio("is_aadhar",0,'',[
                                                        'id'=>'is_aadhar_no',
                                                        'class'=>'aadhar-card'
                                                    ])}}
                                                    <label for="is_aadhar_no">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">
                                                        Adhar Image : &nbsp;
                                                    </span>
                                                    {{Form::file('aadhar_image[]',[
                                                        'class'=>'form-control',
                                                        'accept' => 'image/png,image/jpeg,image/jpg',
                                                        'multiple' => true
                                                    ])}}
                                                </div>
                                            </div>
                                            <div class="col-md-3 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon unik-lbl-spn">
                                                        Image : &nbsp;
                                                    </span>
                                                    {{Form::file('image',[
                                                        'class'=>'form-control',
                                                        'accept' => 'image/png,image/jpeg,image/jpg'
                                                    ])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                                <a href="{{URL::to('donor')}}"
                                    class="btn btn-default">Cancel</a>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
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
    <script>
        $(document).ready(function(){
            $('.datetimepicker').bootstrapMaterialDatePicker({
                format: 'dddd DD MMMM YYYY',
                clearButton: true,
                minDate:new Date(),
                time: false,
                weekStart: 1
            });

            $('.timepicker').bootstrapMaterialDatePicker({
                date: false,
                shortTime: true,
                format: 'hh:mm a',
                switchOnClick: true
            });
            $('.code').blur(function(e) {
                code = $(this).val();
                $.ajax({
                    url: "{{URL::to('get-patient-details')}}",
                    type: 'GET',
                    data: {
                        code: code
                    }
                }).done(function(data) {
                    $('.error-code').text('');
                    if(data.status == 1){
                        $('.name').val(data['data']['name']);
                        $('.age').val(data['data']['age']);
                        $('.other_mobile_number').val(data['data']['other_mobile_number']);
                        $('.mobile_number').val(data['data']['agent_mobile_number']);
                        $('.height').val(data['data']['height']);
                        $('.weight').val(data['data']['weight']);
                        $('#gender').val(data['data']['gender']);
                        $('#gender').selectpicker('refresh');
                    }else if(data.status == 0) {
                        $('.error-code').text('Patient not found');
                    }
                }).fail(function(error) {

                });
            });
        });

        function checkWeight(value) {
            if (/[a-zA-Z!@#$&()\\`+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
                $('.weight').val(value.substring(0, (value.length - 1)));
            } else {
                $('.weight').val(value);
            }
        }
        function checkHeight(value) {
            if (/[a-zA-Z!@#$&()\\`+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
                $('.height').val(value.substring(0, (value.length - 1)));
            } else {
                $('.height').val(value);
            }
        }
        
        function otherMobileNumber(value) {
            $('.other_mobile_number').val(validMobileNumber(value));
        }
        function mobileNumber(value) {
            $('input[type="text"][name="mobile_number"]').val(validMobileNumber(value));
        }
        function checkAge(value) {
            $('input[type="text"][name="age"]').val(validMobileNumber(value));
        }
        function validMobileNumber(value) {
            if (/[a-zA-Z!@#$&()\\`.+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
                return value.substring(0, (value.length - 1));
            } else {
                return value;
            }
        }
    </script>
@stop