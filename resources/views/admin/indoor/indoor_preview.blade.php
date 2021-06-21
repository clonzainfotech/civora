    <style type="text/css">
       .sticker-modal-width{
           width: 350px !important;
       }
       .sticker-modal-footer{
           display: block !important;
           text-align: center !important;
       }
       .patient-room{
           cursor: pointer;
           
       }
       .p-name{
           color: #F96332 !important;
       }
       .room-head
       {
        background-color: #ccd4dc !important;
           -webkit-print-color-adjust: exact;
       }
       .p-empty
       {
           border: 1px solid #ccd4dc !important;
       }
       .p-5
       {
           padding: 5px !important;
       }
       .mb-15
       {
           margin-bottom: -15px !important;
       }
       .incomplete-invoice
       {
        border: 1px solid #ee2200 !important;
        padding: 5px !important;
       }
       .patient_name
       {
           margin-bottom: 10px !important;
           
       }
       a{
           text-decoration: none !important;
           color:black !important;
       }
       .p-10
       {
           padding: 10px !important;
       }
       body
       {
           font-size: 18px;
       }
       .patient-name
       {
           font-size: 20px;
       }
       @media print {
     {page-break-after: always;}
     @page { margin-top : 50px;}
    }
    </style>

    <div class="row clearfix indoor_detail">
        @if($floor == 0)
            @foreach($indoorTypes as $indoor)
                @php
                    $class = null;
                    if($indoor->name == 'General'){
                        $class = 'general-cycle';
                    }
                @endphp
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-md-12 mb-15">
                            <div class="card p-3 patient_name patient-room room-head">
                                <div class="col-md-12 col-lg-12 col-sm-12 roomtype_name ">
                                    <h5 class="p-5">{{ $indoor->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card room_add">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    @php
                                        $addDective = $indoorBed[$indoor->id];
                                        if($addDective <= 0) {
                                            $addDective = 'not-active';
                                        }
                                    @endphp
                                    <div class="demo-google-material-icon indoor_add">
                                        <a href="{{URL::to('indoor/create/'.encrypt($indoor->id))}}" class="{{$addDective}}">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @foreach($indoor->TypeshasManyRooms as $key=>$patient)
                        @php
                            $roomData = $patient->getIndoorBookData;
                            $invoice = $roomData && $roomData->is_final_invoice ? $roomData->is_final_invoice : 0;
                            $invoice = ($invoice == 0) ? 'incomplete-invoice' : '';
                            $room = 'floor-'.$patient->remark;
                        @endphp
                        @if(!empty($roomData))
                            <div class="card p-3 patient_name {{$invoice. ' '.$room}}">
                                <div class="row">
                                    <div class="col-md-9">
                                        @php
                                            $discharge = $roomData->is_discharge_card;
                                            $discharge = ($discharge == 0) ? '' : 'discharge';
                                        @endphp
                                        <div class="{{$discharge}}">
                                            <div class="p-name">
                                                <a id="patient_name_display"
                                                    data-id="{{encrypt($roomData->id)}}"
                                                    role="button"
                                                    data-toggle="collapse"
                                                    data-target="#collapse_{{$roomData->id}}"
                                                    aria-expanded="true"
                                                    aria-controls="collapse_{{$roomData->id}}"
                                                    href="#collapseOne_{{$roomData->id}}">
                                                        {{-- <span class="p-name"> --}}
                                                            {{ ucwords(strtolower($roomData->getPatientsDetails['name'])) }}
                                                        {{-- </span> --}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @php
                                            $procedureId = !empty($roomData->procedure_id) ? explode(',',$roomData->procedure_id) : null;
                                            $procedureData = [];
                                            if($procedureId){
                                                $procedureData = array_map(function ($q) use ($proceduresId,$procedureData) {
                                                    $procedureData = $proceduresId[$q];
                                                    return $procedureData;
                                                }, $procedureId);
                                            }
                                            $procedureData = implode(',',$procedureData);
                                        @endphp
                                        @if (!empty($procedureData))
                                            <div class="procedure-data">
                                                <a  id="patient_name_display"
                                                    data-id="{{encrypt($roomData->id)}}"
                                                    role="button"
                                                    data-toggle="collapse"
                                                    data-target="#collapse_{{$roomData->id}}"
                                                    aria-expanded="true"
                                                    aria-controls="collapse_{{$roomData->id}}">
                                                    {{ strtoupper($procedureData) }}

                                                    <!-- {{ $subString = substr($procedureData, 0, 38) }} -->
                                                </a>
                                                @if (strlen ($subString) < strlen($procedureData))
                                                    ...
                                                    <a href="{{URL::to('indoor/' . encrypt($roomData->id) . '/bookingedit')}}" class="indoor-read-more">More</a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <span>Room No: </span>{{$patient->room_no}} 
                                        {{!empty($patient->remark) ? '( Floor - '.$patient->remark.')' : ''}}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card p-3 patient_name patient-room p-empty {{'room-'.$patient->remark}}" data-url="{{URL::to('indoor/create/'.encrypt($indoor->id).'/'.encrypt($patient->id))}}">
                                <div class="row justify-content-center p-5">
                                    {{-- <div class="col-md-9"> --}}
                                            {{$patient->room_no}} 
                                        {{!empty($patient->remark) ? '( Floor - '.$patient->remark.')' : ''}}

                                    {{-- </div> --}}
                                    {{-- <div class="col-md-3">
                                        <div class="demo-google-material-icon indoor_add">
                                            <a href="{{URL::to('indoor/create/'.encrypt($indoor->id).'/'.encrypt($patient->id))}}">
                                                <i class="material-icons">add</i>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        @else
        <div class="row clearfix indoor_detail">
           
            <h3>Floor No : {{$floor}} </h3>
            @foreach($indoorRoom as $key => $indoor_room)
            @php
            $isBooked = ($indoor_room->flag == 1) ? 'incomplete-invoice' : '';
            @endphp
            <div class="card p-3 patient_name patient-room p-empty {{$isBooked}}">
                <div class="row justify-content-center p-10">
                    <span>{{$indoorType[$indoor_room->type_id]}} : <b>{{$indoor_room->room_no}}</b></span>
                    @php
                        if($indoor_room->flag == 1 )  
                        {
                            foreach($bookingPatients_floor as $key => $patient)
                            {
                                if($patient->room_id == $indoor_room->id)
                                {
                                    echo '<br><br><span class="patient-name">'. ucwords(strtolower($patient->getPatientsDetails['name'])).'</span>';
                                    echo '<br><span>';
                                    echo (isset($procedure_Type[$patient->procedure_id])) ? strtoupper($procedure_Type[$patient->procedure_id]) : '';
                                    echo '</span>';
                                }
                            }
                        }
                    @endphp
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>


