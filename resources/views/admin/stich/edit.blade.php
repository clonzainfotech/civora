{{Form::hidden('patient_id',encrypt($patient->id))}}
{{Form::hidden('stich_id',!empty($stich->id) ? encrypt($stich->id) : null,['class'=>'stich-id'])}}
<div class="row">
    <div class="col-md-1">
        <label class="vertical-form-label pr-0">
            Seen By :
        </label>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{Form::select('seen_by',$hospitalDoctor,!empty($stich->seen_by) ? $stich->seen_by : null,['class'=>'form-control select-padding-0 seen-by','placeholder'=>'Select Doctor'])}}
        </div>
        <span class="seen-by-error text-danger mb-2"></span>
    </div>
</div>

<!-- H/O -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingThree_1">
        <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse"
                                    data-parent="#co" href="#ho-tab" aria-expanded="false"
                    aria-controls="co">1. H/O</a></h4>
        </div>
        <div id="ho-tab" class="panel-collapse collapse" role="tabpanel"
            aria-labelledby="headingThree_1">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1 pr-0">
                    <label class="vertical-form-label pr-0">
                        H/O :
                    </label>
                </div>
                <div class='col-md-8 complain-multi duration-value'>
                    {{Form::select('ho[ho_details]',$hoData,!empty($ho->ho_details) ? $ho->ho_details : null,['class'=>'form-control ho-data select-padding-0 duration-data anc-dose-val ho_type_value','placeholder'=>'Select H/O','data-medicine'=>2])}}
                    <span class="form-error-msg ho-data-msg">
                        {{$errors->first('ho_details')}}
                    </span>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {{Form::text("ho[amenorrhoea]",'Amenorrhoea',['class'=>'form-control','readonly'])}}
                    </div>
                    <span class="form-error-msg">
                        {{$errors->first('amenorrhoea')}}
                    </span>
                </div>
            </div>
            @php
                $hoTypeValue = !empty($ho->ho_type_value) ? $ho->ho_type_value : null
            @endphp
            <div class="row">
                <div class="col-sm-8">
                    <div class="radio is-conceived">
                        {{Form::radio("ho[ho_type_value]",'ftnd',$hoTypeValue == 'ftnd' ? true : false,[
                            'id'=>'ftnd',
                        ])}}
                        <label for="ftnd">
                            FTND
                        </label>

                        {{Form::radio("ho[ho_type_value]",'lscs',$hoTypeValue == 'lscs' ? true : false,[
                            'id'=>'lscs'
                        ])}}
                        <label for="lscs">
                            L.S.C.S
                        </label>

                        {{Form::radio("ho[ho_type_value]",'tlh',$hoTypeValue == 'tlh' ? true : false,[
                            'id'=>'tlh'
                        ])}}
                        <label for="tlh">
                            TLH
                        </label>

                        {{Form::radio("ho[ho_type_value]",'vh',$hoTypeValue == 'vh' ? true : false,[
                            'id'=>'vh'
                        ])}}
                        <label for="vh">
                            VH
                        </label>

                        {{Form::radio("ho[ho_type_value]",'myomectomy',$hoTypeValue == 'myomectomy' ? true : false,[
                            'id'=>'myomectomy'
                        ])}}
                        <label for="myomectomy">
                            Myomectomy
                        </label>

                        {{Form::radio("ho[ho_type_value]",'ectopic',$hoTypeValue == 'ectopic' ? true : false,[
                            'id'=>'ectopic'
                        ])}}
                        <label for="ectopic">
                            Laparoscopic Ectopic
                        </label>

                        {{Form::radio("ho[ho_type_value]",'diagnostic_hystrolapro',$hoTypeValue == 'diagnostic_hystrolapro' ? true : false,[
                            'id'=>'diagnostic_hystrolapro'
                        ])}}
                        <label for="diagnostic_hystrolapro">
                            Diagnostic Hystrolapro
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        {{Form::textarea("ho[other_info]",!empty($ho->other_info) ? $ho->other_info : null,['class'=>'form-control no-resize other_info','placeholder'=>'Other Information','rows'=>'5'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- C/O -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingThree_1">
    <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse"
                                data-parent="#co" href="#co" aria-expanded="false"
                aria-controls="co">2. C/O</a></h4>
    </div>
    <div id="co" class="panel-collapse collapse" role="tabpanel"
        aria-labelledby="headingThree_1">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1 pr-0">
                    <label class="vertical-form-label pr-0">
                        C/O :
                    </label>
                </div>
                <div class="col-md-8 complain-multi">
                    {{Form::select('co[co_type][]',$complaints,!empty($co->co_type) ? $co->co_type : null,['class'=>'form-control co-value co_value_data complaint-data','placeholder'=>'Enter complain','multiple'=>true,'data-type'=>'0','data-medicine'=>1])}}
                    <span class="form-error-msg co-value-msg">
                        {{$errors->first('since')}}
                    </span>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-addon">Since : &nbsp;</span>
                        {{Form::text("co[since]",!empty($co->since) ? $co->since : null,['class'=>'form-control'])}}
                    </div>
                    <span class="form-error-msg">
                        {{$errors->first('since')}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- O/E -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingThree_1">
    <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse"
                                data-parent="#oe-tab" href="#oe-tab" aria-expanded="false"
                aria-controls="co">3. O/E</a></h4>
    </div>
    <div id="oe-tab" class="panel-collapse collapse" role="tabpanel"
        aria-labelledby="headingThree_1">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1 pr-0">
                    <label class="vertical-form-label pr-0">
                        Vitals :
                    </label>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">B.P : &nbsp;</span>
                        {{Form::text("oe[le][bp]",!empty($oe->le->bp) ? $oe->le->bp : null,['class'=>'form-control'])}}
                    </div>
                </div>
                <span class="col-md-1 p-2">MMHG</span>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Temp : &nbsp;</span>
                        {{Form::text("oe[le][temp]",!empty($oe->le->temp) ? $oe->le->temp : null,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon">Pulse : &nbsp;</span>
                        {{Form::text("oe[le][pulse]",!empty($oe->le->pulse) ? $oe->le->pulse : null,['class'=>'form-control'])}}
                    </div>
                </div>
                <span class="col-md-1 p-2">/ Min</span>
            </div>
            <div class="row">
                <div class="col-md-1 pr-0">
                    <label class="vertical-form-label pr-0">
                        Breast :
                    </label>
                </div>
                <div class="col-md-2">
                    {{Form::text("oe[breast][right]",!empty($oe->breast->right) ? $oe->breast->right : null,['class'=>'form-control','placeholder'=>'Right'])}}
                </div>
                <div class="col-md-2">
                    {{Form::text("oe[breast][left]",!empty($oe->breast->left) ? $oe->breast->left : null,['class'=>'form-control','placeholder'=>'Left'])}}
                </div>
                <div class="col-md-1 pr-0">
                    <label class="vertical-form-label pr-0">
                        Lochia :
                    </label>
                </div>
                <div class="col-md-2">
                    {{Form::text("oe[lochia]",!empty($oe->lochia) ? $oe->lochia : null,['class'=>'form-control','placeholder'=>'Lochia'])}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        {{Form::textarea("oe[other_info]",!empty($oe->other_info) ? $oe->other_info : null,['class'=>'form-control no-resize other_info','placeholder'=>'Other Information','rows'=>'5'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- stich tab -->
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingThree_1">
    <h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse"
                                data-parent="#stich-tab" href="#stich-tab" aria-expanded="false"
                aria-controls="stich-tab">4. Stich Line</a></h4>
    </div>
    <div id="stich-tab" class="panel-collapse collapse" role="tabpanel"
        aria-labelledby="headingThree_1">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1 pr-0">
                    <label class="vertical-form-label pr-0">
                        LE :
                    </label>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {{Form::text("stich_line[le]",!empty($stichLine->le) ? $stichLine->le : null,['class'=>'form-control','placeholder'=>'LE'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- treatment tab --}}
<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingThree_1">
        <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#treatment" href="#treatment" aria-expanded="false"
                aria-controls="past-history">5. Treatment</a></h4>
    </div>
    <div id="treatment" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
        <div class="panel-body" id="parent">
            <div class="row treatment-data" id="t_data_1">
                    <div class="col-md-2 pr-0">
                            <label class="vertical-form-label pr-0">
                                Select Medicine :
                            </label>
                        </div>
                <div class="col-md-9 complain-multi medicine-picker">
                    {{Form::select("treatment[medicinedata][]",$medicines,!empty($medicineKey) ? $medicineKey : null,['id'=>'treatment-medicine','class'=>'form-control co-value medicine medicine-co','multiple'=>true])}}
                </div>
            </div>
            <div class="page-loader-wrapper medicine-loader d-none">
                <div class="loader">
                    <div class="m-t-30"><img src="{{url(config('app.loader'))}}" width="48" height="48" alt="Oreo"></div>
                </div>
            </div>
                @if(!empty($treatment))
                    <div class="medicine-data">
                        @foreach($treatment as $key=>$row)
                            @php
                                $mId = preg_replace('/[^a-zA-Z0-9]+/', '_', $row->medicine);
                            @endphp
                            <div class='row mt-2' data-id="{{$mId}}">
                                <div class='col-md-4'>
                                    <div class='input-group'>
                                        {{Form::checkbox('treatment['.$mId.'][injection_status]',1,!empty($row->injection_status) ? true : false,['class'=>'medicines-checkbox'])}}
                                        <span class='input-group-addon'>Medicine : &nbsp</span>
                                        {{Form::text('treatment['.$mId.'][medicine]',$row->medicine,['class'=>'form-control','readonly'])}}
                                        {{-- {{Form::hidden('old_treatment['.$key.'][medicine]',$row->medicine)}} --}}
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        {{Form::select('treatment['.$mId.'][medicine_status]',["1"=>"જમ્યા પછી","2"=>"જમ્યા પહેલાં","3"=>"માસિકની જગ્યાએ મુકવી"],$row->medicine_status,['class'=>'form-control select-padding-0 dose'])}}
                                        {{-- {{Form::hidden('old_treatment['.$key.'][medicine_status]',$row->medicine_status)}} --}}
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='form-group'>
                                        {{Form::select('treatment['.$mId.'][dose]',["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS","5"=>"Weekly / 1","6"=>"Weekly / 2","7"=>"Stat","8"=>"SOS"],$row->dose,['class'=>'form-control select-padding-0 dose'])}}
                                        {{-- {{Form::hidden('old_treatment['.$key.'][dose]',$row->dose)}} --}}
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>Days : &nbsp</span>
                                        {{Form::number('treatment['.$mId.'][no]',$row->no,['class'=>'form-control'])}}
                                        {{-- {{Form::hidden('old_treatment['.$key.'][no]',$row->no)}} --}}
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='input-group'>
                                        <span class='input-group-addon'>Quantity : &nbsp</span>
                                        {{Form::text('treatment['.$mId.'][quantity]',$row->quantity,['class'=>'form-control'])}}
                                        {{-- {{Form::hidden('old_treatment['.$key.'][quantity]',$row->quantity)}} --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row" data-id="{{$mId}}">
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        {{Form::select('treatment['.$mId.'][medicine_time][]',["1"=>"Morning","2"=>"Afternoon","3"=>"Evening","4"=>"Night"],!empty($row->medicine_time) ? $row->medicine_time : null,['class'=>'form-control select-padding-0 dose medicine-co','multiple'=>'true','title'=>'Select Medicine Time'])}}
                                        {{-- @if(!empty($row->medicine_time))
                                            @foreach($row->medicine_time as $timeKey=>$time)
                                                {{Form::hidden('old_treatment['.$key.'][medicine_time]['.$timeKey.']',$time)}}
                                            @endforeach
                                        @endif --}}
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        {{Form::select('treatment['.$mId.'][route]',["IV"=>"IV","IM"=>"IM","SC"=>"SC"],!empty($row->route) ? $row->route : null,['class'=>'form-control select-padding-0 dose','title'=>'Select Medicine Time'])}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="medicine-data"></div>
                @endif
            {{Form::hidden('old_medicine_data',!empty($medicineKey) ? implode(',',$medicineKey) : null,['class'=>'old-medicine-data'])}}
        </div>
    </div>
</div>

@if(empty($stich))
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-addon">
                    Follow Up : &nbsp;
                </span>
                {{Form::text("oe[follow_up]", '',['class'=>'form-control datetimepicker followup next-date'])}}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                {{-- {{Form::text("oe[follow_up_date_diff]",'',['class'=>'form-control next-day','maxlength'=>3,'placeholder'=>'Date Diff'])}} --}}
            </div>
        </div>
        {{-- <span class="col-md-1 p-2 history-lmp-date">Day</span> --}}
    </div>
@else
    {{Form::hidden("oe[follow_up]",!empty($oe->follow_up) ? $oe->follow_up : null)}}
@endif
