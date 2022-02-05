@extends('layouts.main')
@section('parentPageTitle', 'IVF')
@section('title', 'IVF')
@section('page-style')
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <style>
        .payment-form{
            padding: 5px 0px 1px 10px !important;
        }
        @media (min-width: 576px){
            .modal-dialog {
                max-width: 800px !important;
            }
        }

    </style>
@stop
@section('content')

    <div class="row clearfix ivf">
        <div class="col-md-12">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong>IVF List</strong></h2>
                </div>

                <div class="body">
                    <!-- Nav tabs -->
                    <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <form method="post" autocomplete="off" action="">
                                        <input type="text" class="form-control daterange" placeholder="Select Date" autocomplete="off">
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form method="post" autocomplete="off" action="">
                                        {{Form::select('patient_id',$patients,'',[
                                            'class'=>'form-control select-padding-0 patient-id',
                                            'placeholder'=>'Select Patient',
                                            'id' => 'patient_id',
                                            'data-live-search' => 'true'
                                        ])}}
                                    </form>
                                </div>
                                
                                {{-- <div class="col-md-4">{{Form::select('usg',['1'=>'Early Scan','2'=>'NT Scan','3'=>'Anomalies Miles','4'=>'Growth Scan'],'',['class'=>'usg select-padding-0 w-100','placeholder'=>'Select USG Type'])}}</div> --}}
                            </div>
                        </div>

                    <!-- Tab panes -->
                    <div class="tab-content m-t-10">
                        <div class="ivf-result-data table-responsive active">
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
   
@stop
@section('page-script')
<script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
<script type="text/javascript">
    var page = '';
    var fromdate = moment(new Date()).format('YYYY-MM-DD');
    var todate = moment(new Date()).format('YYYY-MM-DD');
    var qstring = 'fromdate=' + fromdate + '&todate=' + todate ;

    $(document).ready(function () {

        $('.daterange').on('apply.daterangepicker', function(ev, picker) {

            fromdate = picker.startDate.format('YYYY-MM-DD');
            todate = picker.endDate.format('YYYY-MM-DD');
            qstring = 'fromdate='+fromdate+ '&todate=' + todate;
            getIvfResultReviewData(qstring);
        });
        $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(".daterange").val('');
            fromdate = '';
            todate = '';
            qstring = qstring = 'fromdate='+fromdate+ '&todate=' + todate;
            getIvfResultReviewData(qstring);
        });
        
        getIvfResultReviewData(qstring);

    });

    $(document).on('click', '.print-category-report', function () {
        var isprint = 1;
        $.ajax({
            url: "{{URL::to('category-report')}}?" + qstring,
            data: {isprint},
            dataType: 'json',
        }).done(function (data) {
            w = window.open(window.location.href, "_blank");
            w.document.open();
            w.document.write(data);
            w.document.close();
            w.window.print();
        });
    });

    // get all category wise report data
    function getIvfResultReviewData(qstring) {
        $('.categorydata-loader').removeClass('d-none');
        $('.categorydata').addClass('d-none');
        $('.pagination').addClass('d-none');
        $.ajax({
            url: "{{URL::to('ivf-result-review')}}?" + qstring,
            dataType: 'json',
        }).done(function (data) {
            $('.ivf-result-data').html(data.data);
            $('.categorydata-loader').addClass('d-none');
        }).fail(function () {

        });
    }
</script>
@stop
