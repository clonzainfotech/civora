@extends('layouts.main')
@section('parentPageTitle', 'Reference Doctor')
@section('title', 'Add Reference Doctor')

@section('page-style')

@stop

@section('content')

<div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Add Hospital Events</strong>
                    </h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('event')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="col-md-12 col-lg-12">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                            {{Form::open(['url'=>'store','method'=>'post','class'=>'form','files'=>'true'])}}
                                <!-- patients basic information -->
                                <div class="panel panel-primary">  
                                    <div class="panel-heading" role="tab" id="headingThree_1">
                                        <h4 class="panel-title"> 
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#patients" aria-expanded="true" aria-controls="patients">Create Events</a> 
                                        </h4>
                                    </div>
                                    <div id="patients" class="" role="tabpanel" aria-labelledby="headingThree_1">
                                        <div class="panel-body">
                                            <div class="row clearfix">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title Of Event','required',])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('title')}}
                                                    </span>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-group">
                                                        {{Form::text('discription','',[
                                                            'class'=>'form-control discription',
                                                            'placeholder'=>'Discription Of Event',
                                                            'required',
                                                        ])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('discription')}}
                                                    </span>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        {{Form::file('event_picture',['class'=>'form-control','placeholder'=>'Select Picture For Event'])}}
                                                    </div>    
                                                    <span class="form-error-msg" id="image">
                                                        {{$errors->first('event_picture')}}
                                                    </span>
                                                </div> 
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        {{Form::text('startDate',\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y'),[
                                                            'class'=>'form-control datetimepicker date startDate',
                                                            'placeholder'=>'Start Date',
                                                            'required'
                                                        ])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('startDate')}}
                                                    </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        {{Form::text('endDate',\Carbon\Carbon::now('Asia/Kolkata')->format('D d M Y'),[
                                                            'class'=>'form-control datetimepicker date endDate',
                                                            'placeholder'=>'End Date',
                                                            'required'
                                                        ])}}
                                                    </div>
                                                    <span class="form-error-msg">
                                                        {{$errors->first('endDate')}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- location and communication -->
                                <div class="col-sm-12">
                                    {{Form::submit('Save',['class'=>'btn btn-primary event-save'])}}
                                    <a href="{{URL::to('event')}}" class="btn btn-default">Cancel</a>
                                </div>
                            {{Form::close()}}    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
<script type="text/javascript">

    window.URL = window.URL || window.webkitURL;

$("form").submit( function( e ) {
    $('.event-save').attr("disabled", true);
    var form = this;
    e.preventDefault();
    var fileInput = $(this).find("input[type=file]")[0],
        file = fileInput.files && fileInput.files[0];

    if( file ) {
        var img = new Image();
        img.src = window.URL.createObjectURL( file );
        img.onload = function() {
            var width = img.naturalWidth,
                height = img.naturalHeight;
            window.URL.revokeObjectURL( img.src );

            if( width >= 1000 && height >= 600 ) {
                form.submit();
            }
            else {
                document.getElementById('image').innerHTML=" image doesn't look like the size we wanted.we require 1000 x 600 size image.";
        return false;
            }
        };
    }
    else { 
        document.getElementById('image').innerHTML=" image not found";
    }
});
    $(function() {
    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY',
        clearButton: true,
        time: false,
        weekStart: 1
    });
    });
</script>
@stop