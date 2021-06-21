@php
    $ho = !empty($stich->ho) ? json_decode($stich->ho) : null;
    $co = !empty($stich->co) ? json_decode($stich->co) : null;
    $oe = !empty($stich->oe) ? json_decode($stich->oe) : null;
    $stichLine = !empty($stich->stich_line) ? json_decode($stich->stich_line) : null;
    $treatment = !empty($stich->treatment) ? json_decode($stich->treatment) : null;
    $hoTypeValue = ['ftnd'=>'FTND','lscs'=>'L.S.C.S','tlh'=>'TLH','myomectomy'=>'Myomectomy','ectopic'=>'Laparoscopic Ectopic','diagnostic_hystrolapro'=>'Diagnostic Hystrolapro'];
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
                        <th class="w-250">
                            <span class="anc-label ">H/O : </span>
                            {{!empty($ho->ho_details) ? $ho->ho_details : '-' }} Amenorrhoea
                        </th>
                        @if(!empty($ho->ho_type_value))
                            <th>{{$hoTypeValue[$ho->ho_type_value]}}</th>
                        @endif
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
                            <div class="panel-title header-print-title">C/O</div>
                        </td>
                    </tr>
                    {{-- @if(!empty($co->co_type) || !empty($co->since)) --}}
                        <tr>
                            {{-- @if(isset($co->co_type) && is_array($co->co_type)) --}}
                                <th class="seperator w-500">
                                    {{-- <span class="anc-label">C/O :</span> --}}
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

        @if(!empty($oe) && (!empty($oe->le->bp) || !empty($oe->le->temp) || !empty($oe->le->pulse)) && (!empty($oe->breast) && (!empty($oe->breast->right) || !empty($oe->breast->left)) && !empty($oe->lochia)) )
            <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 table-hover module-report-table'}}">
                <tbody>
                    <tr>
                        <td colspan="6">
                            <div class="panel-title header-print-title">O/E</div>
                        </td>
                    </tr>
                    {{-- @if(!empty($oe->le->bp) || !empty($oe->le->temp) || !empty($oe->le->pulse)) --}}
                        <tr>
                            <th class="seperator w-100">
                                Vitals
                            </th>
                            {{-- @if(!empty($oe->le->bp)) --}}
                                <th class="seperator">
                                    <span class="anc-label">B.P :</span>
                                    {{$oe->le->bp ? $oe->le->bp : '110/70'}} MMHG
                                </td>
                            {{-- @endif --}}
                            @if(!empty($oe->le->temp))
                                <th class="seperator">
                                    <span class="anc-label ">Temp :</span>
                                    {{$oe->le->temp}}
                                </th>
                            @endif
                            {{-- @if(!empty($oe->le->pulse)) --}}
                                <th class="seperator">
                                    <span class="anc-label ">Pulse :</span>
                                    {{$oe->le->pulse ? $oe->le->pulse : '80'}} / Min
                                </td>
                            {{-- @endif --}}
                        </tr>
                    {{-- @endif --}}
                    @if(!empty($oe->breast) && (!empty($oe->breast->right) || !empty($oe->breast->left)))
                        <tr>
                            <th class="seperator w-100">
                                Breast
                            </th>
                            @if(!empty($oe->breast->right))
                                <th class="seperator">
                                    <span class="anc-label">Right :</span>
                                    {{$oe->breast->right}}
                                </th>
                            @endif
                            @if(!empty($oe->breast->left))
                                <th class="seperator">
                                    <span class="anc-label">Left :</span>
                                    {{$oe->breast->left}}
                                </th>
                            @endif
                        </tr>
                    @endif
                    @if(!empty($oe->lochia))
                        <tr>
                            <th class="seperator">
                                <span class="anc-label">Lochia :</span>
                                {{$oe->lochia}}
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        @endif
        @if(!empty($stichLine->le))
            <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 table-hover module-report-table'}}">
                <tbody>
                    <tr>
                        <td colspan="6">
                            <div class="panel-title header-print-title">Stich Line</div>
                        </td>
                    </tr>
                    <tr>
                        <th class="seperator w-500">
                            <span class="anc-label">L/E :</span>
                            {{$stichLine->le}}
                        </th>
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
                            <div class="panel-title header-print-title">Treatment (Medicine)</div>
                        </td>
                    </tr>
                    @php
                        $old_dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS","5"=>"Weekly / 1","6"=>"Weekly / 2","7"=>"Stat","8"=>"SOS"];
                        $old_medicine_time = ["1"=>"Morning","2"=>"Afternoon","3"=>"Evening","4"=>'Night'];
                        unset($treatment->medicinedata);
                    @endphp
                    @if(!empty($treatment))
                        @foreach($treatment as $key=>$row)
                        @php
                        $mData = $row->medicine;
                        if(!empty($row->injection_status) && $row->injection_status == 1){
                            $mData .= ' State ';
                            $mData .= !empty($row->route) ? $row->route : null;
                        }else{
                            switch($row->medicine_status){
                                case '1':
                                    $mData .= ' જમ્યા પછી ';
                                    break;
                                case '2':
                                    $mData .= ' જમ્યા પહેલાં ';
                                    break;
                                case '3':
                                    $mData .= ' માસિકની જગ્યાએ મુકવી ';
                                    break;
                            }
                            // if(in_array($row->dose,['1','2','3','4'])){
                            //     $mData .= ' દરરોજ ';
                            // }else{
                            //     $mData .= ' અઠવાડિયે ';
                            // }
                            // switch($row->dose){
                            //     case '1':
                            //         $mData .= ' એક વાર';
                            //         break;
                            //     case '2':
                            //         $mData .= ' બે વાર';
                            //         break;
                            //     case '3':
                            //         $mData .= ' ત્રણ વાર';
                            //         break;
                            //     case '4':
                            //         $mData .= ' ચાર વાર';
                            //         break;
                            //     case '5':
                            //         $mData .= ' એક વાર';
                            //         break;
                            //     case '6':
                            //         $mData .= ' બે વાર';
                            //         break;
                            // }
                            $timeData = [];
                            // $mData .= ' ( ';
                            foreach($row->medicine_time as $key => $value) {
                                switch($value){
                                    case '1':
                                        $time = 'સવારે';
                                        break;
                                    case '2':
                                        $time = 'બપોરે';
                                        break;
                                    case '3':
                                        $time = 'સાંજે';
                                        break;
                                    case '4':
                                        $time = 'રાત્રે';
                                        break;
                                }
                                $timeData[] = $time;
                            }
                            $timeData = implode(',',$timeData);
                            $mData .= $timeData;
                            // $mData .= ' )';
                            $mData .= ' '.$row->quantity;
                            $mData .= ' ગોળી';
                            $mData .= ' '.$row->no;
                            $mData .= ' દિવસ સુધિ લેવી';
                        }
                    @endphp
                    <tr>
                        <td>
                            {{$mData}}
                        </td>
                    </tr>
                        @endforeach
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
