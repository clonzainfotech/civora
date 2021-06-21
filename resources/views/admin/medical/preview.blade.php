<style type="text/css">
    .medicines-list, .medical-table{
        font-family: 'Montserrat', Arial, Tahoma, sans-serif;
        width: 100%;
    }
    .medicines-list{
        border-bottom: 1px solid #000000;
        margin-bottom: 10px;
    }
    .medical-table{
        text-align: left;
    }
    .medicines-list tr{
        height: 50px;
        font-size: 20px;
    }
    .medical-table thead th{
        height: 35px;
    }
    .medical-table thead th span{
        border-bottom: 1px solid #000000;
    }
    .medical-table tr {
        height: 27px;
    }
    .table-footer{
        font-weight: 900;
        color: #01d8da;
        height: 50px;
        font-size: 20px;
    }
    td{
        height: 25px;
        font-size: 14px;
    }
    .upper-border {
        border-top: 1px solid #000000;
    }
    .report-header-tr {
        text-align: left;
        height: 35px;
    }
    .report-header-tr-th {
        background-color: #c7dfe0;
        font-size: 13px;
    }
    .amount {
        font-weight: 600;
    }
    .text-center {
        text-align: center;
    }
    .data-font {
        font-size: 11px;
    }

    .td-padding {
        padding: 12px 12px;
    }
    .sub-heading {
        font-size: 13px;
    }

    .seperator {
        border-top: 0.5px solid #dee2e6;
    }

    tr td th {
        padding: 12px 12px;
    }

    .main-title{
        font-size: 20px;
        font-weight: bolder;
    }
    #medical-table{
        text-align: center !important;
        font-size: 24px;
    }
    .sub-title{
        font-size: 20px;
    }
    </style>
    <table class="table m-b-0 table-hover medical-table" id="medical-table" cellspacing="0">
        <thead>
            <tr>
                <th colspan="5">{{strtoupper(config('app.hospitalname1'))}}</th>
            </tr>
        </thead>
    </table>
    {{-- anc --}}
    <div class="card category-data category-data-3 d-none">
        <div class="body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <h5 class="main-title">ANC</h5>
                    </div>
                    <div class="col-md-7"></div>
                </div>
                @if(!empty($ancData) && count($ancData) != 0)
                    @php
                        $mStatus = [1=>'જમ્યા પછી',2=>'જમ્યા પહેલાં',3=>'માસિકની જગ્યાએ મુકવી'];
                        $dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS","5"=>"Weekly / 1","6"=>"Weekly / 2","7"=>"Stat","8"=>"SOS"];
                        $mTime = ["1"=>"Morning","2"=>"Afternoon","3"=>"Evening","4"=>'Night'];
                    @endphp
                    @foreach($ancData as $key=>$row)
                        @php
                            $treatment = json_decode($row->treatment);
                            unset($treatment->medicinedata);
                        @endphp<br>
                        <div class="row">
                            @if(!empty($key) && $key != 0)
                                <hr>
                            @endif
                            <div class="col-md-5 ml-2 sub-title">Appointment Date :- <span class="font-weight-bold">{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s')}}</span></div>
                        </div>
                        <br>
                        <div class="medicines-table">
                            <table class="table m-b-0 table-hover medical-table" id="appointment-table">
                                <thead>
                                    <tr>
                                        <th>Medicines</th>
                                        <th>Medicines Status</th>
                                        <th>Dose</th>
                                        <th>No </th>
                                        <th>Quantity</th>
                                        <th>Medicine Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($treatment))
                                        @foreach($treatment as $value)
                                            <tr>
                                                <td>{{$value->medicine}}</td>
                                                <td>{{!empty($value->medicine_status) ? $mStatus[$value->medicine_status] : null}}</td>
                                                <td>{{!empty($value->dose) ? $dose[$value->dose] : null}}</td>
                                                <td>{{$value->no}}</td>
                                                <td>{{$value->quantity}}</td>
                                                <td>
                                                    @if(!empty($value->medicine_time))
                                                        @php
                                                            $data = [];
                                                            foreach($value->medicine_time as $row){
                                                                $data[] = $mTime[$row];
                                                            }
                                                        @endphp
                                                        {{implode(',',$data)}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan='6' class="text-center">No records available</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                @else
                    <span class="m-text">No Medicine Available</span></h5>
                @endif
            </div>
        </div>
    </div>
    {{-- iui --}}
    <div class="card category-data category-data-2 d-none">
        <div class="body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <h5 class="main-title">IUI</h5>
                    </div>
                    <div class="col-md-7"></div>
                </div>
                @if(!empty($iuiData) && count($iuiData) != 0)
                    @php
                        $mStatus = [1=>'જમ્યા પછી',2=>'જમ્યા પહેલાં',3=>'માસિકની જગ્યાએ મુકવી'];
                        $dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS","5"=>"Weekly / 1","6"=>"Weekly / 2","7"=>"Stat","8"=>"SOS"];
                        $mTime = ["1"=>"Morning","2"=>"Afternoon","3"=>"Evening","4"=>'Night'];
                    @endphp
                    @foreach($iuiData as $row)
                        @php
                            if(!empty($row->description)){
                                $medicine = json_decode($row->description);
                                $medicine = !empty($description->treatment) ? $description->treatment : [];
                                if(!empty($medicine)){
                                    $treatment = $medicine;
                                }
                            }else{
                                $treatment = json_decode($row->treatment);
                                unset($treatment->medicinedata);
                            }
                        @endphp<br>
                        <div class="row">
                            @if(!empty($key) && $key != 0)
                                <hr>
                            @endif
                            <div class="col-md-5 ml-2 sub-title">Appointment Date :- <span class="font-weight-bold">{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s')}}</span></div>
                        </div>
                        <br>
                        <div class="medicines-table">
                            <table class="table m-b-0 table-hover medical-table" id="appointment-table">
                                <thead>
                                    <tr>
                                        <th>Medicines</th>
                                        <th>Medicines Status</th>
                                        <th>Dose</th>
                                        <th>No </th>
                                        <th>Quantity</th>
                                        <th>Medicine Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($treatment))
                                        @foreach($treatment as $value)
                                            <tr>
                                                <td>{{$value->medicine}}</td>
                                                <td>{{!empty($value->medicine_status) ? $mStatus[$value->medicine_status] : null}}</td>
                                                <td>{{!empty($value->dose) ? $dose[$value->dose] : null}}</td>
                                                <td>{{$value->no}}</td>
                                                <td>{{$value->quantity}}</td>
                                                <td>
                                                    @if(!empty($value->medicine_time))
                                                        @php
                                                            $data = [];
                                                            foreach($value->medicine_time as $row){
                                                                $data[] = $mTime[$row];
                                                            }
                                                        @endphp
                                                        {{implode(',',$data)}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan='6' class="text-center">No records available</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                @else
                    <span class="m-text">No Medicine Available</span></h5>
                @endif
            </div>
        </div>
    </div>
    {{-- ivf --}}
    <div class="card category-data category-data-1 d-none">
        <div class="body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <h5 class="main-title">IVF</h5>
                    </div>
                    <div class="col-md-7"></div>
                </div>
                @if(!empty($ivfData) && count($ivfData) != 0)
                    @php
                        $mStatus = [1=>'જમ્યા પછી',2=>'જમ્યા પહેલાં',3=>'માસિકની જગ્યાએ મુકવી'];
                        $dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS","5"=>"Weekly / 1","6"=>"Weekly / 2","7"=>"Stat","8"=>"SOS"];
                        $mTime = ["1"=>"Morning","2"=>"Afternoon","3"=>"Evening","4"=>'Night'];
                    @endphp
                    @foreach($ivfData as $row)
                        @php
                            $treatment = null;
                            if(!empty($row->description)){
                                $medicine = json_decode($row->description);
                                $medicine = !empty($description->treatment) ? $description->treatment : [];
                                if(!empty($medicine)){
                                    $treatment = $medicine;
                                }
                            }else{
                                $treatment = json_decode($row->treatment);
                                unset($treatment->medicinedata);
                            }
                        @endphp<br>
                        <div class="row">
                            @if(!empty($key) && $key != 0)
                                <hr>
                            @endif
                            <div class="col-md-5 ml-2 sub-title">Appointment Date :- <span class="font-weight-bold">{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s')}}</span></div>
                        </div>
                        <br>
                        @if(!empty($treatment))
                            <div class="medicines-table">
                                <table class="table m-b-0 table-hover medical-table" id="appointment-table">
                                    <thead>
                                        <tr>
                                            <th>Medicines</th>
                                            <th>Medicines Status</th>
                                            <th>Dose</th>
                                            <th>No </th>
                                            <th>Quantity</th>
                                            <th>Medicine Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($treatment))
                                            @foreach($treatment as $value)
                                                <tr>
                                                    <td>{{$value->medicine}}</td>
                                                    <td>{{!empty($value->medicine_status) ? $mStatus[$value->medicine_status] : null}}</td>
                                                    <td>{{!empty($value->dose) ? $dose[$value->dose] : null}}</td>
                                                    <td>{{$value->no}}</td>
                                                    <td>{{$value->quantity}}</td>
                                                    <td>
                                                        @if(!empty($value->medicine_time))
                                                            @php
                                                                $data = [];
                                                                foreach($value->medicine_time as $row){
                                                                    $data[] = $mTime[$row];
                                                                }
                                                            @endphp
                                                            {{implode(',',$data)}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <td colspan='6' class="text-center">No records available</td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endforeach
                @else
                    <span class="m-text">No Medicine Available</span></h5>
                @endif
            </div>
        </div>
    </div>
    {{-- gynec --}}
    <div class="card category-data category-data-4 d-none">
            <div class="body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <h5 class="main-title">GYNEC</h5>
                        </div>
                        <div class="col-md-7"></div>
                    </div>
                    @if(!empty($gynecData) && count($gynecData) != 0)
                        @php
                            $mStatus = [1=>'જમ્યા પછી',2=>'જમ્યા પહેલાં',3=>'માસિકની જગ્યાએ મુકવી'];
                            $dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS","5"=>"Weekly / 1","6"=>"Weekly / 2","7"=>"Stat","8"=>"SOS"];
                            $mTime = ["1"=>"Morning","2"=>"Afternoon","3"=>"Evening","4"=>'Night'];
                        @endphp
                        @foreach($gynecData as $row)
                            @php
                                $treatment = json_decode($row->treatment);
                                unset($treatment->medicinedata);
                            @endphp<br>
                            <div class="row">
                                @if(!empty($key) && $key != 0)
                                    <hr>
                                @endif
                                <div class="col-md-5 ml-2 sub-title">Appointment Date :- <span class="font-weight-bold">{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s')}}</span></div>
                            </div>
                            <br>
                            <div class="medicines-table">
                                <table class="table m-b-0 table-hover medical-table" id="appointment-table">
                                    <thead>
                                        <tr>
                                            <th>Medicines</th>
                                            <th>Medicines Status</th>
                                            <th>Dose</th>
                                            <th>No </th>
                                            <th>Quantity</th>
                                            <th>Medicine Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($treatment))
                                            @foreach($treatment as $value)
                                                <tr>
                                                    <td>{{$value->medicine}}</td>
                                                    <td>{{!empty($value->medicine_status) ? $mStatus[$value->medicine_status] : null}}</td>
                                                    <td>{{!empty($value->dose) ? $dose[$value->dose] : null}}</td>
                                                    <td>{{$value->no}}</td>
                                                    <td>{{$value->quantity}}</td>
                                                    <td>
                                                        @if(!empty($value->medicine_time))
                                                            @php
                                                                $data = [];
                                                                foreach($value->medicine_time as $row){
                                                                    $data[] = $mTime[$row];
                                                                }
                                                            @endphp
                                                            {{implode(',',$data)}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <td colspan='6' class="text-center">No records available</td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    @else
                        <span class="m-text">No Medicine Available</span></h5>
                    @endif
                </div>
            </div>
    </div>
