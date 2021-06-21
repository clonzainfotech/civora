@extends('layouts.main')
@section('parentPageTitle', 'IVF History Appointment')
@section('title', 'IVF History Appointment')
@section('content')
@php
    $planData = ['1'=>'Pick Up','2'=>'FET','3'=>'FET-OD','4'=>'FET-ED'];
@endphp
    <div class="row clearfix">
        <div class="col-md-12">
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
        </div>
        {{-- Pick Up --}}
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 roomtype_name">
                    <h5>Pick Up</h5>
                </div>
            </div>
                @foreach($pickupCycle as $key=>$row)
                    @php
                        $cycleNoKey = array_search('1',$dataForSkipPlans);
                        
                        $class = null;
                        if($lastPlan == 1 && $lastCycleNo == $row){
                            $class = 'current-cycle';
                        }
                        $cycleNo = explode('_',$cycleNoKey);
                        $cycleNo = array_filter($cycleNo);
                        if(!empty($cycleNo)){
                            $cycleNo = (int)$cycleNo[1];
                        }
                        if($cycleNo == $row){
                            unset($dataForSkipPlans[$cycleNoKey]);
                            $class = 'skip-cycle';
                        }
                        // for display skip reason
                        $cycleNoKey1 = array_search('1',$dataForSkipReason);
                        $cycleNo1 = explode('_',$cycleNoKey1);
                        $cycleNo1 = array_filter($cycleNo1);
                        if(!empty($cycleNo1)){
                            
                            $cycleNo1 = (int)$cycleNo1[1];
                        }
                        if($cycleNo1 == $row){
                            print_r($dataForSkipReason[$cycleNoKey1]);
                            // $class = 'skip-cycle';
                        }
                    @endphp 
                    <div class="{{'card p-3 patient_name '.$class}}">
                        <span>{{isset($dataForSkipReason['1_'.$row]) ? 'Skip Reason : '.$dataForSkipReason['1_'.$row] : ''}}</span>
                        <div class="row">
                            <div class="col-md-12">
                                <a id="patient_name_display" class="ivf-patinent-name" href="{{URL::to('ivf/cycle/'.encrypt($key).'/'.$patientsId.'/'.encrypt(1).'/'.encrypt($row))}}">
                                    <div class="test">
                                        <div class="pt-1 pb-1">
                                            <span>Cycle {{$row}}</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{URL::to('ivf-plan-report/'.encrypt("1").'/'.$patientsId.'/'.encrypt($row))}}" class="btn btn-sm btn-primary btn-ivf-report">IVF Report</a>
                                <a href="#" class="btn btn-sm btn-primary btn-ivf-report injection-report" data-cycleno="{{$row}}" data-plan="1" data-pid="{{$patientsId}}">Injection Report</a>
                            </div>
                            <!-- <div class="col-md-1"></div>
                            <div class="col-md-3 m-0 p-0">
                               
                            </div>
                            <div class="col-md-5">
                                
                            </div> -->
                        </div>
                    </div>
                @endforeach
        </div>
        {{--FET  --}}
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 roomtype_name">
                    <h5>FET</h5>
                </div>
            </div>
                @foreach($fetCycle as $key=>$row)
                    @php
                       $cycleNoKey = array_search('2',$dataForSkipPlans);
                        $class = null;
                        if($lastPlan == 2 && $lastCycleNo == $row){
                            $class = 'current-cycle';
                        }
                        $cycleNo = explode('_',$cycleNoKey);
                        $cycleNo = array_filter($cycleNo);
                        if(!empty($cycleNo)){
                            $cycleNo = (int)$cycleNo[1];
                        }
                        if($cycleNo == $row){
                            unset($dataForSkipPlans[$cycleNoKey]);
                            $class = 'skip-cycle';
                        }
                        
                    @endphp
                    <div class="{{'card p-3 patient_name '.$class}}">
                        <span>{{isset($dataForSkipReason['2_'.$row]) ? 'Skip Reason : '.$dataForSkipReason['2_'.$row] : ''}}</span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="test">
                                    <div class="pt-1 pb-1">
                                        <a id="patient_name_display" class="ivf-patinent-name" href="{{URL::to('ivf/cycle/'.encrypt($key).'/'.$patientsId.'/'.encrypt(2).'/'.encrypt($row))}}">
                                            <span>Cycle {{$row}}</span>
                                        </a>
                                        <a href="{{URL::to('ivf-plan-report/'.encrypt("1").'/'.$patientsId.'/'.encrypt($row))}}" class="btn btn-sm btn-primary btn-ivf-report">IVF Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>    
        {{-- FET-OD --}}
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 roomtype_name">
                    <h5>FET-OD</h5>
                </div>
            </div>
                @foreach($fetOdCycle as $key=>$row)
                    @php
                        $cycleNoKey = array_search('3',$dataForSkipPlans);
                        $class = null;
                        if($lastPlan == 3 && $lastCycleNo == $row){
                            $class = 'current-cycle';
                        }
                        $cycleNo = explode('_',$cycleNoKey);
                        $cycleNo = array_filter($cycleNo);
                        if(!empty($cycleNo)){
                            $cycleNo = (int)$cycleNo[1];
                        }
                        if($cycleNo == $row){
                            unset($dataForSkipPlans[$cycleNoKey]);
                            $class = 'skip-cycle';
                        }
                        // for display skip reason
                        
                    @endphp
                    <div class="{{'card p-3 patient_name '.$class}}">
                        <span>{{isset($dataForSkipReason['3_'.$row]) ? 'Skip Reason : '.$dataForSkipReason['3_'.$row] : ''}}</span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="test">
                                    <div class="pt-1 pb-1">
                                        <a id="patient_name_display" class="ivf-patinent-name" href="{{URL::to('ivf/cycle/'.encrypt($key).'/'.$patientsId.'/'.encrypt(3).'/'.encrypt($row))}}">
                                            <span>Cycle {{$row}}</span>    
                                        </a>
                                        <a href="{{URL::to('ivf-plan-report/'.encrypt("1").'/'.$patientsId.'/'.encrypt($row))}}" class="btn btn-sm btn-primary btn-ivf-report">IVF Report</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-4 text-right">
                                <a href="{{URL::to('ivf-plan-report/'.encrypt("3").'/'.$patientsId.'/'.encrypt($row))}}" class="btn btn-sm btn-primary btn-ivf-report" >IVF Report</a>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
        </div>    
        {{-- FET-ED	 --}}
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 roomtype_name">
                    <h5>FET-ED</h5>
                </div>
            </div>
                @foreach($fetEdCycle as $key=>$row)
                    @php
                        $cycleNoKey = array_search('4',$dataForSkipPlans);
                        $class = null;
                        if($lastPlan == 4 && $lastCycleNo == $row){
                            $class = 'current-cycle';
                        }
                        $cycleNo = explode('_',$cycleNoKey);
                        $cycleNo = array_filter($cycleNo);
                        if(!empty($cycleNo)){
                            $cycleNo = (int)$cycleNo[1];
                        }
                        if($cycleNo == $row){
                            unset($dataForSkipPlans[$cycleNoKey]);
                            $class = 'skip-cycle';
                        }
                    @endphp
                    <div class="{{'card p-3 patient_name '.$class}}">
                        <span>{{isset($dataForSkipReason['4_'.$row]) ? 'Skip Reason : '.$dataForSkipReason['4_'.$row] : ''}}</span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="test">
                                    <div class="pt-1 pb-1">
                                        <a id="patient_name_display" class="ivf-patinent-name" href="{{URL::to('ivf/cycle/'.encrypt($key).'/'.$patientsId.'/'.encrypt(4).'/'.encrypt($row))}}">
                                            <span>Cycle {{$row}}</span>    
                                        </a>
                                        <a href="{{URL::to('ivf-plan-report/'.encrypt("1").'/'.$patientsId.'/'.encrypt($row))}}" class="btn btn-sm btn-primary btn-ivf-report">IVF Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>    
    </div>
@stop
@section('page-script')
    <script type="text/javascript">
        var injectionString = '';
        $(document).ready(function(){
            
            $(document).on('click','.injection-report',function(e){
                e.preventDefault();
                var cycleNo = $(this).data('cycleno');
                var plan = $(this).data('plan');
                var pId = $(this).data('pid');
                injectionString = 'cycle_no='+cycleNo+'&plan='+plan+'&patient_id='+pId;
                getCycleWiseInjection(injectionString);
            });
        });

        function getCycleWiseInjection(injectionString){
            $.ajax({
                url:'{{URL::to("get-injection-details")}}?'+injectionString,
                type:'GET',
                dataType:'json'
            }).done(function(data){
                if(data.status == 1){
                    w = window.open(window.location.href, "_blank");
                    w.document.open();
                    w.document.write(data.data);
                    w.document.close();
                    setTimeout(function () {
                        w.window.print();
                    }, 100);
                }
            }).fail(function(error){
                
            });
        }
    </script>
@stop