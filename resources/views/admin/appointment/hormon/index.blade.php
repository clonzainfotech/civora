@extends('layouts.main')
@section('parentPageTitle', 'Hormon')
@section('title', 'Hormon')
@section('page-style')
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
@stop
@section('content')
    <div class="row clearfix hormon">
        <div class="col-md-12">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong>Hormon List</strong></h2>
                    <ul class="header-dropdown">
                        <a href="{{URL::to('hormon/create')}}">
                            <li>
                                <button class="btn btn-primary add-hormon" data-toggle="modal" data-target="#add-charge">Add</button>
                            </li>
                        </a>
                        <a href="#">
                            <li>
                                <button class="btn btn-primary print-hormon">Print</button>
                            </li>
                        </a>
                    </ul>
                </div>

                <div class="body">
                    <!-- Nav tabs -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-4">
                                <input type="text" class="form-control daterange" placeholder="Select Date">
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                {{Form::select('patient_id',$patients,'',['class'=>'form-control select-padding-0 patient-id','placeholder'=>'Select Patient','id' => 'patient_id','data-live-search' => 'true'])}}
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
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                {{Form::select('charge_type',['1'=>'Hormon','2'=>'IVF','3'=>'IUI'],'',['class'=>'form-control select-padding-0 charge_type','placeholder'=>'Select Charge Category'])}}
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

                        <div class="hormon-data table-responsive active">
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
<!-- /.modal -->
@stop
@section('page-script')
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
    <script type="text/javascript">
        var page = '';
        var patientId = '';
        var hormonId = '';
        var date = '';
        var search = '';
        var charge_type = $('.charge_type').val();
        var charge_text = $('.charge_type option:selected').val();


        $('.daterange').daterangepicker({
            locale: {
                direction: 'drop-down-date-range',
                cancelLabel: 'Clear',
                format: 'D/M/Y'
            }
        });
// console.log($('.daterange').val());

        date = $('.daterange').val();
        var hname = '';
        var htype = 1;
        qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search;
        var hormonQueryString = 'hname=' + hname + '&htype=' + htype+'&search='+search;
        var selectedHormonId = '';
        $(document).ready(function(){

            // $('.daterange').change(function(){
            //     date = $(this).val();
            //     qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text;
            //     getHormonData(qstring);
            // });

            $('.daterange').on('apply.daterangepicker', function(ev, picker) {
                date = $(this).val();
                qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search;
                getHormonData(qstring);
            });
            $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
                $(".daterange").val('');
                date = $(".daterange").val();
                qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search;
                getHormonData(qstring);
            });

            if ($('#htype').find(":selected").text() == 'Hormon' || $('#htype').find(":selected").text() == 'IVF') {
                $('select[name="hreference_doctor_id"]').prop('required', false);
            } else {
                $('select[name="hreference_doctor_id"]').prop('required', true);
            }
            $('.add-hormon').on('click', function(event) {
                $('.doctor-name').addClass('d-none');
                $('.doctor-mobile-number').addClass('d-none');
                $('.erro').hide();
                $('#add-edit-hormon').trigger('reset');
                $('#hormon_hidden_id').val('');
            });


            getHormonData(qstring);

            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search;
                getHormonData(qstring);
            });

            $(document).on('change','select.patient-id',function(){
                patientId = $(this).val();
                qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search;
                getHormonData(qstring);
            });
            $(document).on('keyup','.search-mobile-number',function(){
                search = $(this).val();
                qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search;
                getHormonData(qstring);
            });

            $(document).on('change', 'select.charge_type',function(e){
                e.preventDefault();
                charge_type = $(this).val();
                charge_text = $('select.charge_type option:selected').text();
                qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search;
                getHormonData(qstring);
            });

            $(document).on('click','.delete-hormon',function(){
                qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search;
                showConfirmMessage();
            });

            $(document).on('click','.print-hormon',function(){
                qstring = 'page='+page+ '&date=' + date + '&patient_id='+patientId+'&charge_type='+charge_type+'&charge_value='+charge_text+'&search='+search+'&is_print=1';
                getHormonData(qstring);
            });

            $(document).on('click','.change-hormon',function(){
                var amount = $(this).data('amount');
                var category = $(this).data('categoryid');
                var id = $(this).data('id');
                var hormonId = $(this).data('hormon');
                if($('.amount-data').hasClass('amount-val')){
                    var previousId = $('.amount-val').data('id');
                    var previousAmount = $('.amount-val').data('value');
                    $('.amount-'+previousId).html(previousAmount);
                }
                if($('.category-data').hasClass('category-val')){
                    var previousId = $('select.category-val').data('id');
                    var categoryValue = $('select.category-val').data('value');
                    var arrayValue = {'1':'Hormon','2':'IVF','3':'IUI'};
                    categoryValue = arrayValue[categoryValue];

                    $('.category-data-value-'+previousId).html(categoryValue);
                }
                var amountData = "<input type ='number' name='total' value="+amount+" class='form-control amount-val amount-data width-88 amount-value-"+id+"' data-hormon="+hormonId+" data-value="+amount+" data-id="+id+"><span class='form-error-msg error-code mt-1 d-none amount-error-"+id+"'>Please enter valid number</span>";
                $('.amount-'+id).html(amountData);
                var categoryData = '<select name="new_category" class="form-control select-padding-0 new-category-'+id+' category-data category-val category-value-'+id+'" data-hormon='+hormonId+' data-value='+category+' data-id='+id+'>'+
                                    '<option value="1">Hormon</option>'+
                                    '<option value="2">IVF</option>'+
                                    '<option value="3">IUI</option>'+
                                '</select>';
                $('.category-data-value-'+id).html(categoryData);
                $('.category-value-'+id).val(category);
                $('.category-data').selectpicker('refresh');
                $('.save-hormon-'+id).removeClass('d-none');
                $(this).addClass('d-none');
                $('.save-hormon-'+previousId).addClass('d-none');
                $('.change-hormon-'+previousId).removeClass('d-none');
                $('.save-hormon-'+id).data('id',id);
                $('.save-hormon-'+id).data('hormon',hormonId);
            });

            $(document).on('click','.save-hormon',function(){
                var id = $(this).data('id');
                $('.amount-error-'+id).addClass('d-none');
                var hormonId = $(this).data('hormon');
                var chargeType = $('select.category-value-'+id).val();
                var value = 'total='+$('.amount-value-'+id).val()+'&charge_type='+chargeType;
                $.ajax({
                    url:"{{URL::to('hormon/change-amount')}}"+'/'+hormonId+'?'+value,
                    dataType: 'json',
                }).done(function(data){
                    if(data.status == 1){
                        showNotification('bg-blue', 'Amount changed successfully.', 'bottom', 'right', "", "");
                        getHormonData(qstring);
                    }
                    if(data.status == 2){
                        $('.amount-error-'+id).removeClass('d-none');
                    }
                }).fail(function(error){

                });
            });
        });
        $(document).on('click','.receipt-hormon',function(){
            var hormonId = $(this).data('hormon');
            $.ajax({
                url:"{{URL::to('hormon/receipt')}}"+'/'+hormonId,
                dataType: 'json',
            }).done(function(data){
                if(data.status == 1)
                {
                    w = window.open(window.location.href, "_blank");
                    w.document.open();
                    w.document.write(data.data);
                    w.document.close();
                    w.window.print();
                }
                
            }).fail(function(error){

            });
        });

        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this record",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00cfd1",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    url: "{{URL::to('hormon/delete/')}}"+'/'+hormonId,
                    dataType: 'json',
                }).done(function(data) {
                    getHormonData(qstring);
                }).fail(function() {

                });
                // swal("Deleted!", "Your hormon has been deleted.", "success");
                $('.showSweetAlert').hide();
                location.reload();
            });
        }
        // $(document).on('dblclick', '#hormon-table tbody tr', function(event) {
        //     var hormonId = $(this).data('id');
        //     if(typeof(hormonId) !== 'undefined'){
        //         var url = 'hormon/'+hormonId+'/edit';
        //         window.location.href = url;
        //     }
        // });
        // get all hormon data
        function getHormonData(qstring){
            $('.hormon-loader').removeClass('d-none');
            $('.hormondata').addClass('d-none');
            $('.pagination').addClass('d-none');
            $.ajax({
                url: "{{URL::to('hormon')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                if(data.status == 1){
                    $('.hormon-data').html(data.data);
                    $('.hormon-loader').addClass('d-none');
                }else{
                    w = window.open(window.location.href, "_blank");
                    w.document.open();
                    w.document.write(data.data);
                    w.document.close();
                    w.window.print();
                }
            }).fail(function() {

            });
        }
    </script>
@stop
