@extends('layouts.main')
@section('parentPageTitle', 'Indoor Settings')
@section('title', 'Indoor Settings')
@section('page-style')

@stop
@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong>Indoor Settings</strong></h2>
                    <ul class="header-dropdown">
                            <ul class="dropdown-menu dropdown-menu-right slideUp">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        <li>
                            <a href="{{URL::to('indoorcreate/')}}">
                                <button class="btn btn-primary">
                                    Add
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                 <div class="body">
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
                        <div class="table-responsive indoorsetting">
                            <!-- table data here include -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')

    <script type="text/javascript">
        var page = '';
        var qstring = 'page=' + page;
        $(document).ready(function() {

            getUserData(qstring);

            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page = $(this).attr('href').split('page=')[1];
                qstring = 'page=' + page;
                getUserData(qstring);
            });

            $(document).on('click','.delete-indoor-type',function(){
                roomTypeId = $(this).data('id');
                showConfirmMessage(roomTypeId);
            });

            $(document).on('dblclick', '#indoorsetting-table tbody tr', function(event) {
                var Id = $(this).data('id');
                if (typeof(Id) !== 'undefined') {
                    var url = 'indoor/config/'+Id+'/edit';
                    window.location.href = url;
                }
            });
        });

        function getUserData(qstring){
            $.ajax({
                url: "{{URL::to('indoorsetting')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.indoorsetting').html(data);
            }).fail(function() {
            });
        }

        function showConfirmMessage(roomTypeId) {
            swal({
                title: 'Are you sure?',
                text: 'You want to deactive this record',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00cfd1',
                confirmButtonText: 'Yes, deactive it!',
                closeOnConfirm: false
            }, function () {
                removeIndoorType(roomTypeId);
            });
        }

        function removeIndoorType(){
            $.ajax({
                url: "{{URL::to('indoor-setting/delete')}}",
                dataType: 'json',
                method: 'POST',
                data : {
                    _token: '{{ csrf_token() }}',
                    id: roomTypeId
                }
            }).done(function(data) {
                if(data.success == false) {
                    swal('Error', data.message, 'error')
                }
                else {
                    swal('Success', data.message, 'success');
                    getUserData(qstring);
                }

            }).fail(function(error) {
            });
        }

    </script>
@stop
