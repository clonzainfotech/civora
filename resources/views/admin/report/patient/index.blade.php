@extends('layouts.main')
@section('parentPageTitle', 'Patient')
@section('title', 'Patient')
@section('page-style')


    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
@endsection
@section('content')

    <div class="row clearfix report patient-report">
        <div class="col-md-12">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong>Patient Report</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="javascript:void(0);">
                                <button class="btn btn-primary print-report is-print" disabled>
                                    Print
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <!-- Nav tabs -->
                    <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                {{ Form::select('patient', $patient,'',[
                                    'class'=>'form-control select-padding-0 patient patient-1',
                                    'placeholder'=>'Select Patient',
                                    'data-live-search'=>'true',
                                    'data-id'=>'2'
                                ])}}
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                {{ Form::select('patient', $pMobileNumber,'',[
                                    'class'=>'form-control select-padding-0 patient patient-2',
                                    'placeholder'=>'Select Patient Mobile Number',
                                    'data-live-search'=>'true',
                                    'data-id'=>'1'
                                ])}}
                            </div>
                        </div>
                    <!-- Tab panes -->
                    <div class="tab-content m-t-10">
                        <div class="patient-data table-responsive active">
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
        var qstring = '';
        var search = '';
        $(document).ready(function(){
            getPatientData(qstring);

            $('select[name="patient"]').on('change', function() {
                var dId = $(this).data('id');
                $('.patient-'+dId).val('');
                $('.patient-'+dId).selectpicker('refresh');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{URL::to('patient-report')}}",
                    data: {
                        patient_id: $(this).val(),
                    },
                    dataType: 'json',
                }).done(function(data) {
                    $('.patient-data').html(data);
                    $('.is-print').attr('disabled', true);
                    if ($('.print').val() != undefined) {
                        $('.is-print').removeAttr('disabled');
                    }
                });
            });
        });

        function getPatientData(qstring){
            $.ajax({
                url: "{{URL::to('patient-report')}}?" + qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.patient-data').html(data);

            }).fail(function() {

            });
        }

        $(document).on('click','.print-report',function(){

            $.ajax({
                url: "{{URL::to('patient-report')}}",
                data: {
                    patient_id: $('.patient option:selected').val(),
                    isprint: 1,
                },
                dataType: 'json',
            }).done(function(data) {
                w = window.open(window.location.href,"_blank");
                w.document.open();
                w.document.write(data);
                w.document.close();
                w.window.print();
            });
        });
    </script>
@stop
