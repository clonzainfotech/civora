@extends('layouts.main')
@section('parentPageTitle', 'Ivf Result Review')
@section('title', 'Ivf Result Review')
@section('page-style')

@stop
@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong>Ivf Result Review List</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <ul class="dropdown-menu dropdown-menu-right slideUp">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="body">

                    <!-- Nav tabs -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="nav nav-tabs padding-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control search" placeholder="Search..." readonly="readonly" onfocus="this.removeAttribute('readonly')">
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

                        <div class="ivfPatients-data table-responsive active">
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
        var qstring = '';
        var page = '';
        var search = '';
        var categoryId = '';
        var status = '';

        $(document).ready(function(){

            getIvfResultData(qstring);

            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search;
                getIvfResultData(qstring);
            });


            $(document).on('keyup','.search',function(){
                search = $(this).val();
                qstring = 'page='+page+'&search='+search;
                getIvfResultData(qstring);
            });


            $(document).on('dblclick', '#ivf-result-table tbody tr', function(event) {
                
                var pId = $(this).data('id');
                if(typeof(pId) !== 'undefined'){
                    var url = 'ivf-result-review/'+pId;
                    window.location.href = url;
                }
            });

            $(document).on('click', '.print-category', function () {
                qstring = 'page='+page+'&search='+search+'&isprint=1';
                getIvfResultData(qstring);
            });
        });
        // get all category data
        function getIvfResultData(qstring){
            $.ajax({
                url: "{{URL::to('ivf-result-review')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                if(data.status == 1){
                    $('.ivfPatients-data').html(data.ivfPatients);
                }
                if(data.status == 2){
                    w = window.open(window.location.href, "_blank");
                    w.document.open();
                    w.document.write(data.ivfPatients);
                    w.document.close();
                    w.window.print();
                }
            }).fail(function() {

            });
        }
        
    </script>
@stop
