@extends('layouts.main')
@section('parentPageTitle', 'Patient')
@section('title', 'Patient')
@section('page-style')
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
@endsection
@section('content')

    <div class="row clearfix appointment">
        <div class="col-md-12">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong>Patients List</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('create-patient')}}">
                                <button class="btn btn-primary">
                                    Add
                                </button>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <button class="btn btn-primary patients-print">
                                    Print
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <!-- Nav tabs -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control daterange" placeholder="Select Bithday Date">
                                        <span class="input-group-addon search-border">
                                            <i class="zmdi zmdi-card-giftcard candor-color" title="Birthday Selection"></i>
                                        </span>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    {{ Form::select('patient_id',$patients,'',[
                                        'class'=>'form-control select-padding-0 patient-id',
                                        'placeholder'=>'Select Patient',
                                        'id' => 'patient_id',
                                        'data-live-search' => 'true'
                                    ])}}
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    {{Form::select('reference_doctor',$referenceDoctor,'',[
                                        'class'=>'form-control select-padding-0 reference-doctor',
                                        'placeholder'=>'Select Reference Doctor',
                                        'data-live-search' => 'true'
                                    ])}}
                                </div>
                                <div class="col-md-3">
                                    <ul class="nav nav-tabs padding-0">
                                        <div class="input-group">
                                            <input type="number" class="form-control search-mobile-number" placeholder="Search by mobile no">
                                            <span class="input-group-addon search-border">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <!-- Tab panes -->
                    <div class="tab-content m-t-10">

                        <!-- notification -->
                        @if(Session::has('msg'))
                            <div class="alert alert-success">
                                <strong>Success!</strong> {{Session::get('msg')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="zmdi zmdi-close"></i>
                                    </span>
                                </button>
                            </div>
                        @endif
                        {{-- <div class="alert alert-success message d-none">
                            <strong>Success! </strong>Patient has been updated
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div> --}}

                        <div class="patient-data table-responsive active">
                            <div class="row">
                                <div class="page-loader-wrapper medicine-loader">
                                    <div class="loader">
                                        <div class="m-t-30"><img src="{{url(config('app.loader'))}}" width="48" height="48" alt="Oreo"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- table data here include -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
    <script type="text/javascript">
        var page = '';
        var patientId = '';
        var referenceDoctorId = '';
        var search = '';
        var date = '';
        var qstring = 'page=' + page + '&patient_id=' + patientId + '&reference_doctor_id=' + referenceDoctorId+'&search='+search;


        $(document).ready(function(){

            $(".daterange").daterangepicker({
                locale: {
                    direction: 'drop-down-date-range',
                    cancelLabel: 'Clear',
                    format: 'D/M/Y',
                }
            });
            getPatientData(qstring);

            $(document).on('dblclick', '#patient-table tbody tr', function(event) {
                var patient_Id = $(this).data('id');
                if(typeof(patient_Id) !== 'undefined') {
                    var url = 'editpatient/'+patient_Id;
                    window.location.href = url;
                }
            });

            $(document).on('click','.applyBtn',function(e){
                event.preventDefault();
                date = $('.daterange').val();
                qstring = 'page=' + page + '&patient_id=' + patientId + '&reference_doctor_id=' + referenceDoctorId+'&search='+search+'&date='+date;
                getPatientData(qstring);
            });

            $(document).on('change','select.patient-id',function(){
                patientId = $(this).val();
                qstring = 'page=' + page + '&patient_id=' + patientId + '&reference_doctor_id=' + referenceDoctorId+'&search='+search;
                getPatientData(qstring);
            });
            $(document).on('keyup','.search-mobile-number',function(){
                search = $(this).val();
                qstring = 'page=' + page + '&patient_id=' + patientId + '&reference_doctor_id=' + referenceDoctorId+'&search='+search;
                getPatientData(qstring);
            });

            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page = $(this).attr('href').split('page=')[1];
                qstring = 'page=' + page + '&patient_id=' + patientId + '&reference_doctor_id=' + referenceDoctorId+'&search='+search;
                getPatientData(qstring);
            });

            $(document).on('change', 'select.reference-doctor', function () {
                referenceDoctorId = $(this).val();
                qstring = 'page=' + page + '&patient_id=' + patientId + '&reference_doctor_id=' + referenceDoctorId+'&search='+search;
                getPatientData(qstring);
            });

            $(document).on('click','.patients-print',function(){
                qstring = 'page=' + page + '&patient_id=' + patientId + '&reference_doctor_id=' + referenceDoctorId+'&search='+search+'&is_print=1';
                getPatientData(qstring);
            });

        });
        function getPatientData(qstring){
            $('.patient-loader').removeClass('d-none');
            $('.patientdata').addClass('d-none');
            $('.pagination').addClass('d-none');
            $.ajax({
                url: "{{URL::to('patient')}}?" + qstring,
                dataType: 'json',
            }).done(function(data){
                if(data.status == 1){
                    $('.patient-data').html(data.patient);
                    $('.patient-loader').addClass('d-none');
                }else{
                    w = window.open(window.location.href, "_blank");
                    w.document.open();
                    w.document.write(data.patient);
                    w.document.close();
                    w.window.print();
                }
            }).fail(function() {

            });
        }
        function checkAge(value) {
            $('.age').val(valid(value));
        }
        function checkMobileNumber(value) {
            $('.mobile_number').val(valid(value));
        }
        function valid(value) {
            if (/[a-zA-Z!@#$&()\\`.+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
                return value.substring(0, (value.length - 1));
            } else {
                return value;
            }
        }
    </script>
@stop
