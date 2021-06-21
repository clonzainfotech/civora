@extends('layouts.main')
@section('parentPageTitle', 'Report')
@section('title', 'Report')
@section('page-style')
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
@stop
@section('content')
    <div class="row clearfix">
        <div class="col-md-12 p-0">
            <div class="card patients-list">
                <div class="header">
                    <div class="row">
                        <div class="col-md-1">
                            <h2><strong>Report</strong></h2>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-3">
                            {{Form::select('category',$iuiCycle,$cycleNo,['class'=>'cycle-data','placeholder'=>'Select Cycle'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix ivf">
        <div class="report-data table-responsive active">
            <!-- report data here include -->
        </div>
    </div>
@stop
@section('page-script')
    <script type="text/javascript">
        var cycle_no = '';
        var qstring = 'cycle_no='+cycle_no;
        var patientId = "{{$patientsId}}";
        var type = "{{$type}}";

        $(document).ready(function(){
            getReportData(qstring);
            $(document).on('change','select.cycle-data',function(e){
                e.preventDefault();
                cycle_no = $(this).val();
                qstring = 'cycle_no='+cycle_no;
                getReportData(qstring);
            });
        });

        // get all category data
        function getReportData(qstring){
            $.ajax({
                url: "{{URL::to('report')}}"+'/'+type+'/'+patientId+'?'+qstring,
                dataType: 'json',
            }).done(function(data) {
                if(data.status == 1){
                    $('.report-data').html(data.report_data);
                }
            }).fail(function() {

            });
        }

    </script>
@stop
