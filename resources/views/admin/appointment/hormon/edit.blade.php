@extends('layouts.main')
@section('parentPageTitle', 'Hormon')
@section('title', 'Add Hormon ')

@section('page-style')

@stop

@section('content')
    <div class="row clearfix hormon">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Edit Hormon</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('hormon')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    {{Form::open(['url'=>'hormon/' . encrypt($hormonData->id),'method'=>'put','class'=>'form'])}}

                            <div class="row hormon-row">
                                <div class="form-group col-md-6">
                                    {{Form::text('hname',$hormonData->name,[
                                        'class'=>'form-control hormon-width-100 hname',
                                        'placeholder'=>'Patient Name',
                                        'required'
                                    ])}}
                                    <span class="form-error-msg">
                                        {{$errors->first('hname')}}
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::select('htype',['1'=>'Hormon','2'=>'IVF','3'=>'IUI'],$hormonData->charge_type,[
                                        'class'=>'form-control hormon-width-100 plr-0 h-60 htype mt-n2', 
                                        'id' => 'htype'
                                    ])}}
                                    <span class="form-error-msg">
                                        {{$errors->first('htype')}}
                                    </span>
                                </div>
                            </div>
                            <div class="row hormon-row hinjection-data">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon unik-lbl-spn">Injection : &nbsp;</span>
                                        {{Form::text('hinjection',$hormonData->injection,[
                                            'class'=>'form-control hinjection',
                                            'placeholder'=>'Injection'
                                        ])}}
                                    </div>
                                    <span class="form-error-msg">
                                        {{$errors->first('hinjection')}}
                                    </span>
                                </div>
                            </div>
                            <div class="row hormon-row mt-18">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon unik-lbl-spn">Charge : &nbsp;</span>
                                        {{Form::text('hcharge',$hormonData->charge,[
                                            'class'=>'form-control hormon-width-100 hcharge',
                                            'placeholder'=>'Charge',
                                            'required',
                                            'oninput' => 'checkCharge(this.value)',
                                            'maxlength' => 8,
                                        ])}}
                                    </div>
                                    <span class="form-error-msg">
                                        {{$errors->first('hcharge')}}
                                    </span>
                                </div>
                            </div>
                            <div class="row hormon-row hcategory-data">
                                <div class="col-md-12">
                                    {{Form::select('hcategory',$category,$hormonData->category_id,[
                                        'class'=>'form-control hormon-width-100 plr-0 hcategory',
                                        'placeholder'=>'Select Category',
                                        'id'=>'hcategory'
                                    ])}}
                                    <span class="form-error-msg">
                                        {{$errors->first('hcategory')}}
                                    </span>
                                </div>
                            </div>
                            <div class="row hormon-row reference-doctor d-none">
                                <div class="col-md-6">
                                    {{Form::select('hreference_doctor_id', $referenceDoctor, $hormonData->reference_doctor_id, [
                                        'class' => 'form-control w-100 plr-0 hreference-doctor',
                                        'id'=>'hreference-doctor',
                                        'placeholder'=>'Select Reference Doctor',
                                        'data-live-search'=>'true',
                                        'required'
                                    ])}}
                                    <span class="form-error-msg">
                                        {{$errors->first('hreference_doctor_id')}}
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        {{Form::textarea("remark",$hormonData->remark,['class'=>'form-control no-resize','placeholder'=>'Remark','rows'=>'5'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="row hormon-row mt-30 doctor-name d-none">
                                <div class="form-group  col-md-6">
                                    {{Form::text('doctor_name','',[
                                        'class'=>'form-control doctor col-md-12',
                                        'placeholder'=>'Doctor Name'
                                    ])}}
                                    <span class="form-error-msg">
                                        {{$errors->first('doctor_name')}}
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::text('doctor_mobile_number','',[
                                        'class'=>'form-control doctor col-md-12',
                                        'placeholder'=>'Doctor Mobile Number',
                                        'oninput' => 'doctorMobileNumber(this.value)',
                                        'maxlength' => 10,
                                    ])}}
                                    <span class="form-error-msg">
                                        {{$errors->first('doctor_mobile_number')}}
                                    </span>
                                </div>
                            </div>
                            {{Form::hidden('hormon_id',encrypt($hormonData->id),['class'=>'hormon-id'])}}
                            <div class="col-sm-12">
                                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                                <a href="{{URL::to('hormon')}}" class="btn btn-default">Cancel</a>
                            </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
    <script type="text/javascript">

        var hormonId = '';
        var charge_type = $('.charge_type').val();
        var charge_text = $('.charge_type option:selected').val();
        var hname = '';
        var htype = 1;
        var selectedHormonId = '';

        $(document).ready(function(){

            if ($("#hreference-doctor option:selected" ).text() == 'other') {
                $('input[type="text"][name="doctor_name"]').prop('required', 'required');
                $('input[type="text"][name="doctor_mobile_number"]').prop('required', 'required');
                $('.doctor-name').removeClass('d-none');
                $('.doctor-mobile-number').removeClass('d-none');
            }


            setField($('select.htype').val());

            
            ($('#htype').find(':selected').text() == 'Hormon') ? ($('.hinjection').prop('required', true), $('.hcategory').prop('required', true)) : ($('.hinjection').prop('required', false), $('.hcategory').prop('required', false));

            $('.add-hormon').on('click', function(event) {
                $('.doctor-name').addClass('d-none');
                $('.doctor-mobile-number').addClass('d-none');
                $('.erro').hide();
                $('#add-edit-hormon').trigger('reset');
                $('#hormon_hidden_id').val('');
            });

            $('select[name="hreference_doctor_id"]').on('change', function() {
                if (this.value == 'other') {
                    $('input[type="text"][name="doctor_name"]').prop('required', 'required');
                    $('input[type="text"][name="doctor_mobile_number"]').prop('required', 'required');
                    $('.doctor-name').removeClass('d-none');
                    $('.doctor-mobile-number').removeClass('d-none');
                } else {
                    $('input[type="text"][name="doctor_name"]').prop('required', false);
                    $('input[type="text"][name="doctor_mobile_number"]').prop('required', false);
                    $('.doctor-name').addClass('d-none');
                    $('.doctor-mobile-number').addClass('d-none');
                }
            });

            $('select[name="htype"]').on('change', function() {
                
                
                (this.value == 1) ? ($('.hinjection').prop('required', true), $('.hcategory').prop('required', true)) : ($('.hinjection').prop('required', false), $('.hcategory').prop('required', false));
            });
        });

        $(document).on('change','select.htype',function(){
            var value = $(this).val();
            setField(value);
        });

        function setField(value){
            if(value == '2' || value == '3'){
                $('.hinjection-data').addClass('d-none');
                $('.hcategory-data').addClass('d-none');
                $('.doctor-name').addClass('d-none');
                $('.doctor-mobile-number').addClass('d-none');
            }

            if(value == '1'){
                $('.hinjection-data').removeClass('d-none');
                $('.hcategory-data').removeClass('d-none');
                $('.doctor-name').addClass('d-none');
                $('.doctor-mobile-number').addClass('d-none');
            }

        }
        function validCharge(value) {
            if (/[a-zA-Z!@#$&()\\`.+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
                return value.substring(0, (value.length - 1));
            } else {
                return value;
            }
        }
        function checkCharge(value) {
            $('.hcharge').val(validCharge(value));
        }
        function doctorMobileNumber(value) {
            $('input[type="text"][name="doctor_mobile_number"]').val(validCharge(value));
        }
    </script>
@stop