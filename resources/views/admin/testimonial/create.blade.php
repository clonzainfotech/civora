@extends('layouts.main')
@section('parentPageTitle', 'Category')
@section('title', 'Add Category')

@section('page-style')

@stop

@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Add Testimonial</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::previous()}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    {{-- @if(Session::has('categorymsg'))
                        <div class="alert alert-warning">
                            <strong>Warning!</strong> {{Session::get('categorymsg')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    @endif --}}
                    {{Form::open(['url'=>'testimonials','method'=>'post','class'=>'form testimonial-form','files'=>'true'])}}
                        <div class="row clearfix">
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{-- <span class="input-group-addon unik-lbl-spn">Testimonial :</span> --}}
                                    {{Form::textarea('testimonial','',['class'=>'form-control','placeholder'=>'Testimonial','rows'=>'5'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('testimonial')}}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Author :</span>
                                    {{Form::text('author','',['class'=>'form-control','placeholder'=>'author'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('author')}}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Sort Order :</span>
                                    {{Form::number('sortorder','',['class'=>'form-control','placeholder'=>'Sort Order'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('sortorder')}}
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{Form::select('status',[1=>'Active',2=>'Deactive'],'',['class'=>'form-control select-padding-0','placeholder'=>'Select Status'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('status')}}
                                </span>
                            </div>    
                            <div class="col-sm-12">
                                {{Form::submit('Save',['class'=>'btn btn-primary testimonial-save'])}}
                                <a href="{{URL::previous()}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
<script type="text/javascript">
    $(".testimonial-form").submit(function() { $(".testimonial-save").attr("disabled", true); });
</script>
@stop