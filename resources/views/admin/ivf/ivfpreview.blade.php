<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<style>
    .patient-name {
        text-transform: uppercase;
    }
    .patient-detail {
        margin-bottom: 20px;
    }
</style>
@php
    $todayDate = Carbon\Carbon::Now();
@endphp
<div class="print-ivf-div">
    <div class="panel panel-primary">

        <div class="row patient-detail">
            <div class="col-md-12">
                <strong class="patient-name">{{ ucwords(strtolower($ivf->getPatients['name']))}}</strong>
            </div>
            <div class="col-md-12">
                <strong>{{ $ivf->getPatients['mobile_number'] }}</strong>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-md-12">
                <span>Trigger date : </span><span> {{$todayDate->format('d-m-Y')}}</span>
            </div>
            <div class="col-md-12">
                <span>Time : </span><span> {{!empty($historyData->trigger->hcg->time) ? $historyData->trigger->hcg->time : '-'}}</span>
            </div>
            @if(!empty($historyData->trigger->decapeptyl->time))
            <div class="col-md-12">
                <span>Pick up date : </span>
                <span>
                    @php
                        $triggerDate = $todayDate->addDays(2)->format('d-m-Y');
                    @endphp
                    {{$triggerDate}}
                </span>
            </div>
            <div class="col-md-12">
                <span>Time : </span><span>{{!empty($historyData->trigger->decapeptyl->time) ? $historyData->trigger->decapeptyl->time : '-'}}</span>
            </div>
            @endif
            <div class="col-md-12">

               @if(!empty($historyData->trigger->hcg->dose))
                <span>Dose : </span><span>{{$historyData->trigger->hcg->dose}}</span>
               @endif

               @if(!empty($historyData->trigger->hcg->brand))
                <span>Brand : </span><span>{{ $historyData->trigger->hcg->brand}}</span>
                @endif
            </div>
        </div>

    </div>

</div>