@extends('layouts.main')
@section('parentPageTitle', 'Testimonial')
@section('title', 'Edit Testimonial')

@section('page-style')

@stop

@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Edit Testimonial</strong></h2>
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
                    {{Form::open(['url'=>'testimonials/'.$testimonial->id,'method'=>'post','class'=>'form','files'=>'true'])}}
                    <div class="row clearfix">
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{-- <span class="input-group-addon unik-lbl-spn">Testimonial :</span> --}}
                                {{Form::textarea('testimonial',!empty($testimonial->testimonial) ? $testimonial->testimonial : '',['class'=>'form-control','placeholder'=>'Testimonial','rows'=>'5'])}}
                            </div>
                            <span class="form-error-msg">
                                {{$errors->first('testimonial')}}
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon unik-lbl-spn">Author :</span>
                                {{Form::text('author',!empty($testimonial->author) ? $testimonial->author : '',['class'=>'form-control','placeholder'=>'author'])}}
                            </div>
                            <span class="form-error-msg">
                                {{$errors->first('author')}}
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon unik-lbl-spn">Sort Order :</span>
                                {{Form::number('sortorder',!empty($testimonial->sort_order) ? $testimonial->sort_order : '',['class'=>'form-control','placeholder'=>'Sort Order'])}}
                            </div>
                            <span class="form-error-msg">
                                {{$errors->first('sortorder')}}
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::select('status',[1=>'Active',2=>'Deactive'],$testimonial->status,['class'=>'form-control select-padding-0','placeholder'=>'Select Status'])}}
                            </div>
                            <span class="form-error-msg">
                                {{$errors->first('status')}}
                            </span>
                        </div>    
                        <div class="col-sm-12">
                            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
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
@stop