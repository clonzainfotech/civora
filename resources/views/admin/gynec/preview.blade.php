@php
    $patientsInfo = !empty($gynec->patients_info) ? json_decode($gynec->patients_info) : null;
    $ho = !empty($gynec->ho) ? json_decode($gynec->ho) : null;
    $co = !empty($gynec->co) ? json_decode($gynec->co) : null;
    $mh = !empty($gynec->mh) ? json_decode($gynec->mh) : null;
    $patientsDetails = !empty($gynec->patients_details_ho) ? json_decode($gynec->patients_details_ho) : null;
    $oe = !empty($gynec->oe) ? json_decode($gynec->oe) : null;
    $oh = !empty($gynec->oh) ? json_decode($gynec->oh) : null;
    $planManagement = !empty($gynec->plan_of_management	) ? json_decode($gynec->plan_of_management	) : null;
    $investigation = !empty($gynec->investigation	) ? json_decode($gynec->investigation	) : null;
    $treatment = !empty($gynec->treatment) ? json_decode($gynec->treatment) : null;
    $contraceptionData = ['barrier_method'=>'Barrier Method','cu_t'=>'Cu - T','tl_done'=>'TL Done ','occipill'=>'Occipill','other_contraception'=>'Other'];
    $dose = ["1"=>"Daily","2"=>"Once a week","3"=>"Twice a week","4"=>"Stat","5"=>"SOS","6"=>"Alternate Day","7"=>"6 hourly","8"=>"8 hourly","9"=>"12 hourly","10"=>"24 hourly"];
    $medqty = ['1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5];
    $medicine_time = ['1'=>'IV','2'=>'IM','3'=>'SC',"4"=>'Oral',"5"=>'P/V',"6"=>"P/A"];
@endphp

<style>
    .module-report-table {
        font-family: roboto-black;
        width: 100%;
    }
    .module-report-table{
        margin-bottom: 10px;
    }
    .module-report-table{
        text-align: left;
    }

    .doctor-category{
        color: #01d8da;
    }
    .module-report-table thead th{
        height: 35px;
    }

    .module-report-table tr {
        height: 27px;
    }
    .table-footer{
        font-weight: 900;
        color: #01d8da;
        height: 50px;
        font-size: 20px;
    }
    td {
        height: 25px;
        font-size: 14px;
        padding: 3px 3px;
    }
    th{
        text-align: left;
    }

    .report-header-tr {
        text-align: left;
        height: 35px;
    }
    .report-header-tr-th {
        background-color: #bdf3f5;
        font-size: 13px;
    }

    .white-font {
        color: #ffffff;
    }
    .header-print-title{
        font-size: 20px;
        background-color: #f5f5f5;
        color: #55555a;
        width: 100%;
    }
    .main-print-anc-div{
        margin: 0 auto;
        width: 100%;
    }
    .input-group-addon.title{
        font-size: 16px;
        font-weight: 900;
    }
    .seperator {
        border-top: 0.5px solid #dee2e6;
    }

    .p70 {
        padding-top: 70px;
    }

    .d-none {
        display: none !important;
    }
    .text-danger{
        color:red;
    }
    .f-date{
        font-weight: bold;
    }
    .anc-label {
        font-weight: normal;
    }
    .w-100{
        width: 100px !important;
    }
    .w-200{
        width: 200px !important;
    }
    .w-300{
        width: 300px !important;
    }
    .w-400{
        width: 400px !important;
    }
    .w-500{
        width: 500px !important;
    }
    .w-150{
        width: 150px !important;
    }
    .w-250{
        width: 250px !important;
    }
    .w-350{
        width: 350px !important;
    }
    .w-450{
        width: 450px !important;
    }
    .w-550{
        width: 550px !important;
    }
    .lmd-lable{
        font-size: 17px;
    }
    /* .mt-30 {
        position:relative;
        display:table;
        table-layout:fixed;
        padding-top:30px;
        padding-bottom:30px;
        width: 94%;
        height:auto;
    } */
    .panel-primary{
        border: 1px solid;
        padding: 11px;
        /* margin-top: 100px; */
    }
    .medicine-table td{
        padding: 2px 15px;
        text-transform: capitalize;
    }
    
    /* @media all {
        .page-break { display: none; }
    }
    @media print {
        .page-break { display: block; page-break-before: always; }
    } */
    @page { margin-top : 120px; margin-bottom : 80px;}
</style>

<div class="main-print-anc-div">
    <div class="panel panel-primary">
        <!-- H/O -->
        @if($ho && !empty($ho->ho_details))
            <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 table-hover module-report-table'}}">
                <tbody>
                    <tr>
                        <td colspan="6">
                            <div class="panel-title header-print-title">1. H/O</div>
                        </td>
                    </tr>
                    <th class="w-250 seperator">
                        <span class="anc-label ">H/O : </span>
                        {{!empty($ho->ho_details) ? $ho->ho_details : '-' }}
                    </th>
                    </tr>
                </tbody>
            </table>
        @endif

        <!-- C/O -->
        {{-- @if(!empty($co) && !empty($co->co_type) || !empty($co->since)) --}}
            <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 table-hover module-report-table'}}">
                <tbody>
                    <tr>
                        <td colspan="6">
                            <div class="panel-title header-print-title">2. C/O</div>
                        </td>
                    </tr>
                    {{-- @if(!empty($co->co_type) || !empty($co->since)) --}}
                        <tr>
                            {{-- @if(isset($co->co_type) && is_array($co->co_type)) --}}
                                <th class="seperator w-500">
                                    <span class="anc-label">C/O :</span>
                                    {{ (isset($co->co_type) && is_array($co->co_type)) ? implode(', ', $co->co_type) : 'None' }}
                                </th>
                            {{-- @endif --}}
                            @if(!empty($co->since))
                                <th class="seperator">
                                    <span class="anc-label">Since :</span>
                                    {{ !empty($co->since) ? $co->since : '-' }}
                                </th>
                            @endif
                        </tr>
                    {{-- @endif --}}
                </tbody>
            </table>
        {{-- @endif --}}
        <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 table-hover module-report-table'}}">
            <tbody>
                <tr>
                    <td colspan="6">
                        <div class="panel-title header-print-title">3. O/E</div>
                    </td>
                </tr>
                @if(!empty($oe->gynec_tvs->type) && $oe->gynec_tvs->type == 'yes' && empty($oe->gynec_ut->details))
                    <tr>
                        <th class="seperator w-500">
                            <span class="anc-label">TVS :</span>
                            <span class="anc-label">Uterus:</span>
                            {{$oe->gynec_ut->details}}
                        </th>
                    </tr>
                @endif
                @if(!empty($oe->gynec_endometrial_cavity->details))
                    <tr>
                        <th class="seperator w-500">
                            <span class="anc-label">Endometrial Cavity :</span>
                            <span>{{$oe->gynec_endometrial_cavity->details}}</span>
                        </th>
                    </tr>
                @endif
                @if(!empty($oe->gynec_p_s->type) && $oe->gynec_p_s->type == 'yes' && !empty($oe->gynec_p_s->details))
                    <tr>
                        <th class="seperator w-500">
                            <span class="anc-label">P/S Details :</span>
                            {{$oe->gynec_p_s->details}}
                        </th>
                    </tr>
                @endif
                {{-- @if(!empty($oe->gynec_le->bp) || (!empty($oe->gynec_le->temp) || !empty($oe->gynec_le->pulse))) --}}
                    <tr>
                        <th class="seperator w-500">
                            Vitals
                        </th>
                        {{-- @if(!empty($oe->gynec_le->bp)) --}}
                            <th class="seperator w-500">
                                <span class="anc-label">B.P :</span>
                                {{isset($oe->gynec_le->bp) ? $oe->gynec_le->bp : '110/70'}} MMHG
                            </td>
                        {{-- @endif --}}
                        @if(!empty($oe->gynec_le->temp))
                            <th class="seperator w-500">
                                <span class="anc-label">&nbsp;Temp :</span>
                                {{$oe->gynec_le->temp}}
                            </td>
                        @endif
                        {{-- @if(!empty($oe->gynec_le->pulse)) --}}
                            <th class="seperator w-500">
                                <span class="anc-label">&nbsp;Pulse :</span>
                                {{isset($oe->gynec_le->pulse) ? $oe->gynec_le->pulse : '80'}} / Min
                            </td>
                        {{-- @endif --}}
                    </tr>
                {{-- @endif --}}
            </tbody>
        </table>

        @if($gynec->is_gynec == 0)
            @if(!empty($planManagement) && !empty($planManagement->plan_of_management_data))
                <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 table-hover module-report-table'}}">
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <div class="panel-title header-print-title">7. Plan Of Management</div>
                            </td>
                        </tr>
                        @if(!empty($planManagement->plan_of_management_data))
                            <tr>
                                <th class="seperator w-500">
                                    <span class="anc-label">Plan Of Management Type :</span>
                                    {{implode(',',$planManagement->plan_of_management_data)}}
                                </th>
                            </tr>
                            @if(!empty($planManagement->surgically_details))
                                @php
                                    $sData = [];
                                    foreach ($planManagement->surgically_details as $row) {
                                        $sData[] = $surgicallyData[$row];
                                    }
                                @endphp
                                <tr>
                                    <th class="seperator w-500">
                                        <span class="anc-label">Plan Of Management Type :</span>
                                        {{implode(',',$sData)}}
                                    </th>
                                </tr>
                            @endif
                        @endif
                    </tbody>
                </table>
            @endif
        @endif

        {{--gynec investigation tab --}}
        @if($gynec->is_gynec == 1)
            <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 table-hover module-report-table'}}">
                <tbody>
                    <tr>
                        <td colspan="6">
                            <div class="panel-title header-print-title">4. Investigation</div>
                        </td>
                    </tr>
                    <tr>
                        <th>Investigation</th>
                    </tr>
                    <tr>
                        @if(!empty($investigation->investigation_anc_date))
                            <th class="seperator w-500">
                                <span class="anc-label">Date :</span>
                                {{$investigation->investigation_anc_date}}
                            </th>
                        @endif
                        @if(!empty($investigation->investigation_blood_group))
                            <th class="seperator w-500">
                                <span class="anc-label">Blood Group :</span>
                                {{$investigation->investigation_blood_group}}
                            </th>
                        @endif
                        @if(!empty($investigation->investigation_anc_rbs))
                            <th class="seperator w-500">
                                <span class="anc-label">RBS :</span>
                                {{$investigation->investigation_anc_rbs}}
                            </th>
                        @endif
                    </tr>
                    @if(!empty($investigation->investigation_cbc_mp->status))
                        <tr>
                            <th class="seperator w-500">
                                <span class="anc-label">CBC MP :</span>
                                {{$investigation->investigation_cbc_mp->status == 1 ? 'WNL' : 'Abnormal'}}
                            </th>
                            @if($investigation->investigation_cbc_mp->status == 2)
                                @if($investigation->investigation_cbc_mp->aneamia)
                                    <th>
                                        <span class="anc-label">Aneamia :</span>
                                        {{$investigation->investigation_cbc_mp->aneamia}}
                                    </th>
                                @endif
                                @if($investigation->investigation_cbc_mp->leacocytosis)
                                    <th>
                                        <span class="anc-label">Leacocytosis:</span>
                                        {{$investigation->investigation_cbc_mp->leacocytosis}}
                                    </th>
                                @endif
                            @endif
                        </tr>
                    @endif
                    @if(!empty($investigation->investigation_urine) && !empty($investigation->investigation_urine->status))
                        <tr>
                            <th class="seperator w-500">
                                <span class="anc-label">Urine :</span>
                                {{$investigation->investigation_urine->status == 1 ? 'WNL' : 'Abnormal'}}
                            </th>
                            @if($investigation->investigation_urine->status == 2)
                                @if($investigation->investigation_urine->type)
                                    <th>
                                        <span class="anc-label">Puccell  :</span>
                                        {{ucfirst($investigation->investigation_urine->type)}}
                                    </th>
                                    @if($investigation->investigation_urine->type == 'present')
                                        <th>
                                            <span class="anc-label">Puscell :</span>
                                            {{$investigation->investigation_urine->puscell}}
                                        </th>
                                    @endif
                                @endif
                                @if($investigation->investigation_urine->urine_albumine)
                                    <th>
                                        <span class="anc-label">Urine Albumine:</span>
                                        {{$investigation->investigation_urine->urine_albumine}}
                                    </th>
                                @endif
                            @endif
                        </tr>
                    @endif
                    <tr>
                        @if(!empty($investigation->anc_hiv))
                            <th class="seperator w-500">
                                <span class="anc-label">HIV :</span>
                                {{ucfirst($investigation->anc_hiv)}}
                            </th>
                        @endif
                        @if(!empty($investigation->anc_hbsag))
                            <th class="seperator w-500">
                                <span class="anc-label">HBSAG :</span>
                                {{ucfirst($investigation->anc_hbsag)}}
                            </th>
                        @endif
                        @if(!empty($investigation->anc_vdrl))
                            <th class="seperator w-500">
                                <span class="anc-label">VDRL  :</span>
                                {{ucfirst($investigation->anc_vdrl)}}
                            </th>
                        @endif
                    </tr>
                </tbody>
            </table>
        @endif

        {{-- treatment tab --}}
        @if(!empty($treatment))
            <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 table-hover module-report-table'}}">
                <tbody>
                    <tr>
                        <td colspan="6">
                            <div class="panel-title header-print-title">{{$gynec->is_gynec == 1 ? 5 : 9}}. Treatment (Medicine)</div>
                        </td>
                    </tr>
                    @php
                        // $old_dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS","5"=>"Weekly / 1","6"=>"Weekly / 2","7"=>"Stat","8"=>"SOS"];
                        // $old_medicine_time = ["1"=>"Morning","2"=>"Afternoon","3"=>"Evening","4"=>'Night'];
                        unset($treatment->medicinedata);
                    @endphp
                    @if(!empty($treatment))
                    <table class="medicine-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Dose</th>
                                <th>Timing</th>
                                <th>Freq.</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($treatment as $key=>$row)
                            <tr>
                                <?php
                                    $medicine_status = '';
                                    $mId = preg_replace('/[^a-zA-Z0-9]+/', '_', $row->medicine);
                                    $firstCharacter = strtoupper(substr($mId, 0, 3));
                                    if($firstCharacter == "INJ"){
                                        switch($row->medicine_time){
                                            case '1':
                                                $medicine_status = 'IV';
                                                break;
                                            case '2':
                                                $medicine_status = 'IM';
                                                break;
                                            case '3':
                                                $medicine_status = 'SC';
                                                break;
                                            case '4':
                                                $medicine_status = 'Oral';
                                                break;
                                            case '5':
                                                $medicine_status = 'P/V';
                                                break;
                                            case '6':
                                                $medicine_status = 'P/A';
                                                break;
                                        }
                                        $mData = !empty($row->medicine_time) ? $medicine_status : $medicine_status;
                                        if($mData==$medicine_status) {
                                            $medicine_status = "-";
                                        }
                                    }else{
                                        $mData = [0,0,0,0];

                                        if(@$row->quantity>0) {
                                            $mData[0] = $row->quantity;
                                        }
                                        if(@$row->quantity_2>0) {
                                            $mData[1] = $row->quantity_2;
                                        }
                                        if(@$row->quantity_3>0) {
                                            $mData[2] = $row->quantity_3;
                                        }
                                        if(@$row->quantity_4>0) {
                                            $mData[3] = $row->quantity_4;
                                        }
                                        $mData = implode('-',$mData);
                                        switch($row->medicine_status){
                                            case '1':
                                                $medicine_status = 'જમ્યા પછી';
                                                break;
                                            case '2':
                                                $medicine_status = 'જમ્યા પહેલાં';
                                                break;
                                            case '3':
                                                $medicine_status = 'માસિકની જગ્યાએ મુકવી';
                                                break;
                                        }
                                    }
                                ?>
                                <td>{{$row->medicine}}</td>
                                <td>{{$mData}}</td>
                                <td>{{$medicine_status}}</td>
                                <td>{{isset($dose[$row->dose]) ? $dose[$row->dose] : ''}}</td>
                                <td>{{$row->no.' days'}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                </tbody>
            </table>
        @endif
        <div class="row">
            <div class="col-md-1">
                <span class="f-date"> Follow up :</span>
                <span class="col-md-2">
                    {{ isset($ho->follow_up) && !empty($ho->follow_up) ? $ho->follow_up : '-' }}
                </span>
            </div>
            <div class="col-md-1">
                <span class="f-date"> Remark :</span>
                <span class="col-md-2">
                    {{ isset($ho->remark) && !empty($ho->remark) ? $ho->remark : '-' }}
                </span>
            </div>
        </div>
    </div>
</div>
