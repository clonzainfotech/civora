@extends('layouts.main')
@section('parentPageTitle', 'Ivf Result Review')
@section('title', 'Ivf Result Review')
@section('page-style')
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
@stop
@php
    $typeOfData = [1=>'Primary',2=>'Secondary'];
    $o_h = !empty($ivf->o_h) ? json_decode($ivf->o_h) : null;
@endphp
@section('content')
<div class="row clearfix anc">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>Ivf Result Review</strong>
                </h2>
                <ul class="header-dropdown">
                    <li>
                            <a href="{{URL::to('ivf-result-review')}}" target="_blank" class="btn btn-primary pull-right">Back</a>
                            <a href="" target="_blank" class="btn btn-primary pull-right">Print</a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="col-md-12 col-lg-12">
                    @if(Session::has('msg'))
                        <div class="alert alert-danger">
                            {{Session::get('msg')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    @endif
                    <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                        {{Form::open(['class'=>'form ibf-result-review','files'=>true,'id'=>'','enctype'=>'multipart/form-data'])}}
                            {{Form::hidden('patients_id',encrypt($patient->id))}}
                            {{Form::hidden('ivf_result_id','',['class'=>'ivf_result_id'])}}
                            
                            <!-- H/O -->
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingThree_1">
                                <h4 class="panel-title">
                                    <a class="" role="button" data-toggle="collapse"data-parent="#ho_data" href="#ho_data" aria-expanded="true" aria-controls="ho_data">1. Patient's Information</a></h4>
                                </div>
                                <div id="ho_data" class="panel-collapse collapse show" role="tabpanel"
                                    aria-labelledby="headingThree_1">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>Name : </b>{{ucwords(strtolower($patient->name))}}
                                                </label>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>Age : </b>{{!empty($patient->age) ? $patient->age.' Years' : ''}}
                                                </label>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>Type Of Infertility : </b>{{!empty($o_h) && isset($o_h->type_of_infertility) && !empty($o_h->type_of_infertility) ? $typeOfData[$o_h->type_of_infertility] : 'Primary'}} / {{!empty($o_h->first_marriage_life) ? $o_h->first_marriage_life.' years' : null}} {{!empty($o_h->second_marriage_details) ? $o_h->second_marriage_details.' years' : null}}
                                                </label>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>Previous history of Abortions and reason for abortion : </b>
                                                </label>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingThree_1">
                                <h4 class="panel-title">
                                    <a class="" role="button" data-toggle="collapse"data-parent="#ho_data" href="#ho_data" aria-expanded="true" aria-controls="ho_data">2. Ultgrasound parameters(at time of Progesterone support)</a></h4>
                                </div>
                                <div id="ho_data" class="panel-collapse collapse show" role="tabpanel"
                                    aria-labelledby="headingThree_1">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>Serum Progestrone : </b>{{ucwords(strtolower($patient->name))}}
                                                </label>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>AMH : </b>{{!empty($patient->age) ? $patient->age.' Years' : ''}}
                                                </label>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>TSH : </b>{{!empty($o_h) && isset($o_h->type_of_infertility) && !empty($o_h->type_of_infertility) ? $typeOfData[$o_h->type_of_infertility] : 'Primary'}} / {{!empty($o_h->first_marriage_life) ? $o_h->first_marriage_life.' years' : null}} {{!empty($o_h->second_marriage_details) ? $o_h->second_marriage_details.' years' : null}}
                                                </label>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>Uterus : </b>
                                                </label>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                {{Form::submit('submit',['class'=>'btn btn-primary submit'])}}
                                <button type="submit" class="btn btn-primary submit" value="1">Save & Preivew</button>
                                <a href="{{URL::to('anc-iui-ivf')}}" class="btn btn-default">Cancel</a>
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
<script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
    <script type="text/javascript">
        var qstring = '';
        var lastCId = '';
        var page = '';
        var patientId = "";
        var status = '';
        var cId = '';
        var date = '';
        var type = '';

        

        

    </script>
@stop
