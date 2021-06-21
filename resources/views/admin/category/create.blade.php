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
                    <h2><strong>Add Category</strong></h2>
                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('category')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    @if(Session::has('categorymsg'))
                        <div class="alert alert-warning">
                            <strong>Warning!</strong> {{Session::get('categorymsg')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    @endif
                    {{Form::open(['url'=>'category','method'=>'post','class'=>'form category-form','files'=>'true'])}}
                        <div class="row clearfix">
                            
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Name :</span>
                                    {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('name')}}
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
                                {{Form::submit('Save',['class'=>'btn btn-primary category-save'])}}
                                <a href="{{URL::to('category')}}" class="btn btn-default">Cancel</a>
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
    $(document).ready(function(){
        $(".category-form").submit(function() { $(".category-save").attr("disabled", true); });
    });
</script>
@stop