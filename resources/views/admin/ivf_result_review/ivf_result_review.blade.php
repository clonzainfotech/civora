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
                                <div class="panel-heading" role="tab" id="headingThree_2">
                                <h4 class="panel-title">
                                    <a class="" role="button" data-toggle="collapse"data-parent="#ultgrasound" href="#ultgrasound" aria-expanded="true" aria-controls="ultgrasound">2. Ultgrasound parameters(at time of Progesterone support)</a></h4>
                                </div>
                                <div id="ultgrasound" class="panel-collapse collapse show" role="tabpanel"
                                    aria-labelledby="headingThree_2">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 pr-0">
                                                <label class="vertical-form-label pr-0">
                                                    <b>Serum Progestrone : </b>{{ucwords(strtolower($patient->name))}}
                                                </label>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">AMH : &nbsp;</span>
                                                    {{Form::text("data[amh]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">TSH : &nbsp;</span>
                                                    {{Form::text("data[tsh]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Utreus : &nbsp;</span>
                                                    {{Form::text("data[utreus]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Endometrial : &nbsp;</span>
                                                    {{Form::text("data[endometrial]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Endometrial Vascularity : &nbsp;</span>
                                                    {{Form::text("data[endometrial_vascularity]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Tubal Factor(TL) : &nbsp;</span>
                                                    {{Form::text("data[tubal_factor]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Ovarian Factor : &nbsp;</span>
                                                    {{Form::text("data[ovarian_factor]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Endometriosis : &nbsp;</span>
                                                    {{Form::text("data[endometriosis]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Past History(TB, Generic, DM, HTN) : &nbsp;</span>
                                                    {{Form::text("data[past_history]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingThree_3">
                                <h4 class="panel-title">
                                    <a class="" role="button" data-toggle="collapse"data-parent="#laboratory" href="#laboratory" aria-expanded="true" aria-controls="laboratory">3. Laboratory Data</a></h4>
                                </div>
                                <div id="laboratory" class="panel-collapse collapse show" role="tabpanel"
                                    aria-labelledby="headingThree_3">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Semen analysis : &nbsp;</span>
                                                    {{Form::text("data[semen_analysis]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Ovum Quality : &nbsp;</span>
                                                    {{Form::text("data[ovum_quality]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Sperm Quality : &nbsp;</span>
                                                    {{Form::text("data[sperm_quality]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Embryo Grade : &nbsp;</span>
                                                    {{Form::text("data[embryo_grade]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Thaw to ET Time : &nbsp;</span>
                                                    {{Form::text("data[thaw_to_et_time]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">ET Procedure : &nbsp;</span>
                                                    {{Form::text("data[et_procedure]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Cervicl Mucus : &nbsp;</span>
                                                    {{Form::text("data[cervicl_mucus]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Pickup D/B : &nbsp;</span>
                                                    {{Form::text("data[pickup]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Ovum denudation D/B : &nbsp;</span>
                                                    {{Form::text("data[ovum_denudation]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">ICSI D/B : &nbsp;</span>
                                                    {{Form::text("data[icsi]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">ET D/B : &nbsp;</span>
                                                    {{Form::text("data[et]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingThree_4">
                                <h4 class="panel-title">
                                    <a class="" role="button" data-toggle="collapse"data-parent="#result" href="#result" aria-expanded="true" aria-controls="result">4. Result</a></h4>
                                </div>
                                <div id="result" class="panel-collapse collapse show" role="tabpanel"
                                    aria-labelledby="headingThree_4">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">B-HCG : &nbsp;</span>
                                                    {{Form::text("data[b_hcg]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Result : &nbsp;</span>
                                                    {{Form::text("data[result]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Outcome : &nbsp;</span>
                                                    {{Form::text("data[outcome]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group skip-cycle">
                                                    <span class="input-group-addon text-danger">Package : &nbsp;</span>
                                                    {{Form::text("data[pkg]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                            <div class="col-md-12 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Remark : &nbsp;</span>
                                                    {{Form::text("data[remark]",'',['class'=>'form-control'])}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                {{Form::submit('submit',['class'=>'btn btn-primary submit'])}}
                                <button type="submit" class="btn btn-primary submit" value="1">Save & Preivew</button>
                                <a href="{{URL::to('ivf-result-review')}}" class="btn btn-default">Cancel</a>
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
        

        function ancFormData(data)
        {
            $('.submit').prop('disabled', true);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{URL::to("store-ivf-result-review")}}',
                type:'POST',
                dataType:'json',
                data:data,
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false
            }).done(function(data){
                $('.how-much-error').val('');
                if(data.status == 'true'){
                    window.location.href = url;
                }else if(data.status == 1){
                    w = window.open(window.location.href, "_blank");
                    w.document.open();
                    w.document.write(data.data);
                    w.document.close();
                    w.window.print();
                    $('#anc_history_id').val(data.id);
                    // window.location.href = url;
                    $('#next-appointment-modal').modal('hide');
                }else if(data.status == '2'){
                    $('.how-much-error').text('Please enter valid number');
                }else if(data.status == '3'){
                    $('#anc_history_id').val(data.id);
                    window.location.href = url;
                }
                else{
                    location.reload();
                }
            });
        } 

        

    </script>
@stop
