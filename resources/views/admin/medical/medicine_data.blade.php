{{-- anc --}}
    <div class="card category-data category-data-3 d-none">
        <div class="body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <h5>ANC</h5>
                    </div>
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                        <input type="text" class="form-control daterange anc-date" data-id="anc-date" placeholder="Select Date">
                    </div>
                </div>
                @if(!empty($ancData) && count($ancData) != 0)
                    @php
                        $mStatus = [1=>'જમ્યા પછી',2=>'જમ્યા પહેલાં',3=>'માસિકની જગ્યાએ મુકવી'];
                        $dose = ["1"=>"OD","2"=>"BD","3"=>"TDS","4"=>"ADS","5"=>"Weekly / 1","6"=>"Weekly / 2","7"=>"Stat","8"=>"SOS"];
                        $mTime = ["1"=>"Morning","2"=>"Afternoon","3"=>"Evening","4"=>'Night'];
                    @endphp
                    @foreach($ancData as $row)
                        @php
                            $treatment = json_decode($row->treatment);
                            unset($treatment->medicinedata);
                        @endphp<br>
                        <div class="row">
                            <div class="col-md-5 ml-2">Appointment Date :- <span class="font-weight-bold">{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s')}}</span></div>
                        </div>
                        <br>
                        <div class="medicines-table">
                            <table class="table m-b-0 table-hover" id="appointment-table">
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
                        <h5>IUI</h5>
                    </div>
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                        <input type="text" class="form-control daterange iui-date" data-id="iui-date" placeholder="Select Date">
                    </div>
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
                            <div class="col-md-5 ml-2">Appointment Date :- <span class="font-weight-bold">{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s')}}</span></div>
                        </div>
                        <br>
                        <div class="medicines-table">
                            <table class="table m-b-0 table-hover" id="appointment-table">
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
                        <h5>IVF</h5>
                    </div>
                    <div class="col-md-7"></div>
                    <div class="col-md-3">
                        <input type="text" class="form-control daterange ivf-date" data-id="ivf-date" placeholder="Select Date">
                    </div>
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
                            <div class="col-md-5 ml-2">Appointment Date :- <span class="font-weight-bold">{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s')}}</span></div>
                        </div>
                        <br>
                        @if(!empty($treatment))
                            <div class="medicines-table">
                                <table class="table m-b-0 table-hover" id="appointment-table">
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
                            <h5>GYNEC</h5>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-3">
                            <input type="text" class="form-control daterange gynec-date" data-id="gynec-date" placeholder="Select Date">
                        </div>
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
                                <div class="col-md-5 ml-2">Appointment Date :- <span class="font-weight-bold">{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i:s')}}</span></div>
                            </div>
                            <br>
                            <div class="medicines-table">
                                <table class="table m-b-0 table-hover" id="appointment-table">
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
{{-- no data avaliable  --}}
@if(empty($lastType))
    <div class="card">
        <div class="body">
            <div class="col-md-12">
                <h5>No Medicine Available</h5>
            </div>
        </div>
    </div>
@endif
