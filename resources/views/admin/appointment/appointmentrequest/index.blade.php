@extends('layouts.main')
@section('parentPageTitle', 'Appointment')
@section('title', 'Appointment')
@section('page-style')
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
@stop
@section('content')
    <div class="row clearfix appointment">
        <div class="col-md-12">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong>Appointment Request List</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="#">
                                <button class="btn btn-primary print-appointmentrequest">Print</button>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="body">

                    <!-- Tab panes -->
                    <div class="tab-content m-t-10">
                        <div class="appointment-request-data table-responsive active">
                            <!-- table data here include -->
                            @if(Session::has('msg'))
                                <div class="alert alert-warning">
                                   {{Session::get('msg')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="zmdi zmdi-close"></i>
                                        </span>
                                    </button>
                                </div>
                            @endif

                            <table class="table m-b-0 table-hover" id="appointment-request-table">
                                <thead>
                                    <tr>
                                        <th>Appointment</th>
                                        <th>Time</th>
                                        <th>Patient Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointmentRequest as $requests)
                                        <tr>
                                            <td>{{$requests->appointment_date}}</td>
                                            <td>{{$requests->appointment_time}}</td>
                                            <td class="patient_name">{{strtolower($requests->getPatients['name'])}}</td>
                                            <td>
                                                <a class="apt-approve" data-id="{{encrypt($requests->id)}}"><span class="badge is-bill badge-success">Approve</span></a>
                                                <a class="apt-reject" data-id="{{encrypt($requests->id)}}"><span class="badge is-bill badge-danger">Reject</span></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <td colspan='4'
                                            class="text-center">No records available</td>
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script type="text/javascript">

        var apRequestId = '';
        var qstring = '';
        $('.apt-approve').click(function () {
            apRequestId = $(this).data('id');
            qstring = 'appointment_req_id='+apRequestId;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'appointment-request/'+ apRequestId +'/approve?'+qstring,
                type: "POST",
                dataType: 'json',
            }).done(function() {
                location.reload();
            }).fail(function(){

            });
        });

        $('.apt-reject').click(function () {
            apRequestId = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'appointment-request/'+ apRequestId +'/reject',
                type: "POST",
                dataType: 'json',
            }).done(function() {
                location.reload();
            }).fail(function() {
            });
        });
        $(document).on('click', '.print-appointmentrequest', function () {
            $.ajax({
                url: "{{URL::to('appointment-request')}}?isprint=1",
                dataType: 'json',
            }).done(function(data) {
                if(data.status == 1){
                    w = window.open(window.location.href, "_blank");
                    w.document.open();
                    w.document.write(data.appointmentData);
                    w.document.close();
                    w.window.print();
                }
            }).fail(function() {
                
            });
        });
    </script>

@stop
