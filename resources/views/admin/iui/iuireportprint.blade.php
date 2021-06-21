<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

<style>
    .drname {
    font-weight: 500;
    text-transform: uppercase;
}
.degree {
    font-weight: 500;
    text-transform: uppercase;
    font-size: 12px;
}
.proffesion {
    font-weight: 500;
    text-transform: uppercase;
}
.iui-report-print {
    padding: 20px;
}
    .doctor-info {
        padding: 50px 0;
    }
    h6 {
        text-transform: uppercase;
    }
</style>
@php
$iuireportData = json_decode($iuiReport->description);    
// dd($iuireportData->ovum->erphoto);
@endphp
<div class="iui-report-print">
<div class="row">
    <div class="col-md-10">
        <span>Patient Name:</span>
    <span>{{$iuiReport->getPatients['name']}}</span>
    </div>
    <div class="col-md-2">
        <span>Age:</span>
        <span>{{$iuiReport->getPatients['age']}}</span>
    </div>
</div>

<div class="row pb-4">
    <div class="col-md-12">
        <span>Indication:</span>
        <span>{{!empty($iuiReport->indication) ? $iuiReport->indication : ''}}</span>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div><h6><strong>stimulation:</strong></h6></div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
       <div>
           <span>Protocol:</span>
           <span>{{!empty($iuireportData->simulation->protocol) ? $iuireportData->simulation->protocol : ''}}</span>
       </div>
       <div>
            <span>Injection:</span>
            <span>{{!empty($iuireportData->simulation->injection) ? $iuireportData->simulation->injection : ''}}</span>       
        </div>
        <div>
            <span>Antagonist:</span>
            <span>{{!empty($iuireportData->simulation->antagonist) ? $iuireportData->simulation->antagonist : ''}}</span>
        </div>
        <div>
            <span>Stimulation days:</span>
            <span>{{!empty($iuireportData->simulation->simulation_days) ? $iuireportData->simulation->simulation_days : ''}}</span>
        </div>
    </div>

    <div class="col-md-6" style="border-left: 1px solid">
        <div>
            <span>Trigger:</span>
            <span>{{!empty($iuireportData->simulation->trigger->trigger) ? $iuireportData->simulation->trigger->trigger : ''}}</span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <span>Date:</span>
                <span>{{!empty($iuireportData->simulation->trigger->date) ? $iuireportData->simulation->trigger->date : ''}}</span>  
            </div>
            <div class="col-md-6">
                <span>Time:</span>
                <span>{{!empty($iuireportData->simulation->trigger->time) ? $iuireportData->simulation->trigger->time : ''}}</span>
            </div>   
         </div>
         
         <div>
             <span>Total ACF:</span>
             <span>{{!empty($iuireportData->simulation->totalacf) ? $iuireportData->simulation->totalacf : ''}}</span>
         </div>

         <div class="row">
            <div class="col-md-6">
                <span>Rt:</span>
                <span>{{!empty($iuireportData->simulation->rt) ? $iuireportData->simulation->rt : ''}}</span>  
            </div>
            <div class="col-md-6">
                <span>Lt:</span>
                <span>{{!empty($iuireportData->simulation->lt) ? $iuireportData->simulation->lt : ''}}</span>
            </div>   
         </div>
         <div>
             <span>ET:</span>
             <span>{{!empty($iuireportData->simulation->et) ? $iuireportData->simulation->et : ''}}</span>
         </div>

         <div class="row">
            <div class="col-md-6">
                <span>sp2:</span>
                <span>{{!empty($iuireportData->simulation->sp2) ? $iuireportData->simulation->sp2 : ''}}</span>  
            </div>
            <div class="col-md-6">
                <span>Date:</span>
                <span>{{!empty($iuireportData->simulation->sp2date) ? $iuireportData->simulation->sp2date : ''}}</span>
            </div>   
         </div>
         
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div><h6><strong>Ovum pick up:</strong></h6></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <span>Date:</span>
                    <span>{{!empty($iuireportData->ovum->date) ? $iuireportData->ovum->date : ''}}</span>
                </div>
                <div class="col-md-6">
                    <span>Time:</span>
                    <span>{{!empty($iuireportData->ovum->time) ? $iuireportData->ovum->time : ''}} </span>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <span>ER Photo:</span>
                    @php
                     $erPhoto = !empty($iuireportData->ovum->erphoto) ? $iuireportData->ovum->erphoto : null;    
                    @endphp
                <span><img src="{{asset($erPhoto)}}" alt="" height="100px" width="100px"></span>
                </div>
            </div>

            <div>
                <span>Total OCC:</span>
                <span>{{!empty($iuireportData->ovum->totalocc) ? $iuireportData->ovum->totalocc : ''}}</span>
            </div>
        </div>
        <div class="col-md-6" style="border-left: 1px solid">
            <div><strong>Semen Report:</strong>
            <span>{{!empty($iuireportData->ovum->semenreport) ? $iuireportData->ovum->semenreport : ''}}</span>
            </div>

            <div>
                <span>Count:</span>
                <span>{{!empty($iuireportData->ovum->count) ? $iuireportData->ovum->count : ''}}</span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <span>Total Motility:</span>
                    <span>{{!empty($iuireportData->ovum->motility) ? $iuireportData->ovum->motility : ''}}</span>
                </div>
                <div class="col-md-6">
                    <span>Active:</span>
                    <span>{{!empty($iuireportData->ovum->active) ? $iuireportData->ovum->active : ''}}</span>
                </div>
            </div>

            <div>
                <span>Sperm Morphology (ICSI):</span>
                <span>{{!empty($iuireportData->ovum->sperm) ? $iuireportData->ovum->sperm : ''}}</span>
            </div>

            <div class="row p-4">
                <span><strong>Oocyte Quality:</strong></span>
                <span>{{!empty($iuireportData->ovum->quality ? $iuireportData->ovum->quality : '')}}</span>
            </div>
        </div>   
     </div>

     <div class="row p-4">
         <div class="col-md-12">
             <span>Remark:</span>
             <span>{{!empty($iuiReport->remark) ? $iuiReport->remark : ''}}</span>
         </div>
     </div>

    <div class="row doctor-info">
        <div class="col-md-6">
            <div class='drname'>{{config('app.doctor') }}</div>
            <div class='degree'>(M.B., D.G.O)</div>
            <div class='proffesion'>Chief consultant</div>
        </div>
        <div class="col-md-6">
            <div class='drname'>bhavna borkhataria</div>
            <div class='degree'>(M.Sc., ph.D.)</div>
            <div class='proffesion'>embryologist</div>
        </div>
    </div>

</div>
