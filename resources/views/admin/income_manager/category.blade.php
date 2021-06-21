@extends('layouts.main')
@section('parentPageTitle', 'Income Manager')
@section('title', 'Income Manager')
@section('page-style')

<style type="text/css">
    .updatestatus{
        width: 173px !important;
    }
</style>

@stop
@section('content')

    <div class="row clearfix expense">
        <div class="col-md-12">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong>Income Manager Category</strong></h2>
                    <ul class="header-dropdown">
                        <li><button class="btn btn-primary btn-sm"><a data-toggle="modal" data-target="#Addctegory" >Add</a></button></li>
                        <li>
                            <a href="{{URL::to('income-manager')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <!-- Nav tabs -->
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
                            <div class="expense-data table-responsive active">
                                <!-- table data here include -->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('modal')
<div class="modal fade" id="Addctegory" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header justify-content-center">
                    <h4 class="title" id="next-appointment">Added  Category</h4>
                </div>
                <!-- body -->
                {{Form::open(['class'=>'form-inline','id'=>'add-category'])}}
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="col-md-3">
                                Category
                            </div>
                            <div class="col-md-5">
                                {{Form::text('day','',['class'=>'form-control name','placeholder'=>'Category Name','required','min'=>1])}}
                                <span class="form-error-msg day  w-100" id="errorcategory"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="col-md-3">
                                Status
                            </div>
                            <div class="col-md-5">
                                <div class="form-group" style="width: 173px;">
                                    {{Form::select('status',[1=>'Active',2=>'Deactive'],'',['class'=>'form-control select-padding-0 status','placeholder'=>'Select Status' ,'id'=>'status'])}}
                                </div>
                                <span class="form-error-msg date" id="error-status"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <div class="modal-footer center-footer justify-content-center">
                    <button type="button" class="btn btn-primary waves-effect savecategory">Save</button>
                    <button type="button" class="btn btn-default waves-effect ml-2  " data-dismiss="modal">Close</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="Updatectegory" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header justify-content-center">
                    <h4 class="title" id="next-appointment">Update  Category</h4>
                </div>
                <!-- body -->
                {{Form::open(['class'=>'form-inline','id'=>'update-category'])}}
                <div class="modal-body">
                    <div class="row">
                        {{Form::hidden('id','',['class'=>'form-control id id','id'=>'id','placeholder'=>'Category Name'])}}
                        <div class="form-group col-md-12">
                            <div class="col-md-3">
                                Category
                            </div>
                            <div class="col-md-5">
                                {{Form::text('day','',['class'=>'form-control updatename','id'=>'cname','placeholder'=>'Category Name','required','min'=>1])}}
                                <span class="form-error-msg day w-100"  id="erorcategory"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="col-md-3">
                                Status
                            </div>
                            <div class="col-md-5">
                                <div class="form-group" style="width: 173px;">
<!--                                     {{Form::select('status',[1=>'Active',2=>'Deactive'],['class'=>'form-control select-padding-0 updatestatus','placeholder'=>'Select Status' ,'id'=>'sts'])}} -->
                                    <select class="form-control updatestatus" id="sts">
                                      <option value="0">Select Status</option>
                                      <option value="1">Active</option>
                                      <option value="2">Deactive</option>
                                    </select>
                                </div>
                                <span class="form-error-msg date" id="eror-status"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <div class="modal-footer center-footer justify-content-center">
                    <button type="button" class="btn btn-primary waves-effect updatecategory">Save</button>
                    <button type="button" class="btn btn-default waves-effect ml-2" data-dismiss="modal">Close</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@stop
@stop
@section('page-script')
    <script type="text/javascript">

        $(document).on('click','.edit-expense',function(e){
            var id = $(this).data("id");
            var name = $(this).data("name");
            var status = $(this).data("status");
            document.getElementById("sts").value = status;
            $('select #sts').val(status);
            $('#sts').selectpicker('refresh');
            $(".modal-body #cname").val( name );
            $(".modal-body #id").val( id );
            var token = "{{csrf_token()}}";
        });
            $(document).on('click','.updatecategory',function(e){
                var name = $('.updatename').val();
                var id=$('.id').val();
                var status =$( ".updatestatus option:selected" ).val();
                var type = 1;
                var token = "{{csrf_token()}}";
                var i=1;
                document.getElementById("erorcategory").innerHTML="";
                document.getElementById("eror-status").innerHTML="";
                if(name == ""){
                    document.getElementById("erorcategory").innerHTML="Please enter Category";
                    i=2;
                }
                if(status == 0){
                    document.getElementById("eror-status").innerHTML="Please select status";
                    i=2;
                }
                if(i == 2){
                    return false;
                }else{
                $.ajax({
                    url: "{{URL::to('expense-category/update')}}",
                    dataType: 'json',
                    type: 'post',
                    data:{id:id,name:name,_token:token,status:status,type:type}
                }).done(function(data) {
                    $('#Updatectegory').modal('hide');
                    location.reload();
                }).fail(function(error) {

                });
                }
            });

        $(document).on('click','.savecategory',function(e){
                var name = $('.name').val();
                var status =$( ".status option:selected" ).val();
                var token = "{{csrf_token()}}";
                var type = 1;
                var i=1;
                document.getElementById("errorcategory").innerHTML="";
                document.getElementById("error-status").innerHTML="";
                if(name == ""){
                    document.getElementById("errorcategory").innerHTML="Please enter Category";
                    i=2;
                }
                if(status == ""){
                    document.getElementById("error-status").innerHTML="Please select status";
                    i=2;
                }
                if(i == 2){
                    return false;
                }else{
                    $('.savecategory').prop('disabled',true);
                $.ajax({
                    url: "{{URL::to('categoryAdd')}}",
                    dataType: 'json',
                    type: 'post',
                    data:{name:name,_token:token,status:status,type:type}
                }).done(function(data) {
                    $('#Addctegory').modal('hide');
                    location.reload();
                }).fail(function(error) {

                });
                }
            });

        var page = '';
        var search = '';
        var qstring ='';
        $(document).ready(function(){
        getExpenseData(qstring);
                    $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page+'&search='+search+'&status='+status;
                getExpenseData(qstring);
            });
        });

        function getExpenseData(qstring){
            $.ajax({
                url: "{{URL::to('income-category')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.expense-data').html(data);

            }).fail(function() {

            });
        }

    </script>
@stop
