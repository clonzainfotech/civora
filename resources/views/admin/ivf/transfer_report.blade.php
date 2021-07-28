@extends('layouts.printpreview')
@section('page-style')
@stop
@section('content')
{{-- <html lang="en"> --}}
    {{-- <head> --}}
        {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
        <style>
            .module-report-table {
                text-align: left;
                width: 100%;
            }
            td, th{
                padding: 1px 0px 4px 0px;
            }
            .p-name{
                font-size: 18px;
            }
            .table thead th {
                border-bottom: 2px solid black !important;
            }
            .table-bordered td, .table-bordered th {
                border: 1px solid black !important;
            }
            .pl-10
            {
                padding-left: 5rem;
            }
            .ivf-label{
                font-weight: normal;
            }
            .text-center
            {
             text-align: center;
            }
            .float-right
            {
                float: right;
            }
            .font-bold
            {
                font-weight: bold;
            }
            .module-report-table>tbody>tr>td, .module-report-table>tbody>tr>th, .module-report-table>thead>tr>td, .module-report-table>thead>tr>th
            {
                border: none !important;
            }
            h3{
                color: #1e5f63;
                -webkit-print-color-adjust: exact;
            }
            .module-report-table
            {
                margin-bottom: 10px !important;
            }
        </style>
    {{-- </head> --}}
    {{-- <body> --}}
        {{-- <div class="container-fluid"> --}}
            <div class="row content watermark">
                
                <div class="col-sm-12">
                    <h3 class="text-center"><u>IVF REPORT</u></h3>
                </div>
                
                
                <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 module-report-table'}}">
                    <tbody>
                        <tr>
                            <th>
                                <span class="pb-1 ivf-label">Name : <span><span class="pb-1 font-bold ivf-label">{{ ucwords(strtolower($transferReport->getPatient['name']))}}</span>
                                <br>
                                <span class="pb-1 ivf-label">Indication : </span>{{ !empty($transferReport->indication) ? $transferReport->indication : '-' }}
                            </th>
                            <th>
                            <th class="pb-1 float-right ivf-label">
                                <span class="pb-1 ivf-label">Age :</span> {{ !empty($transferReport->getPatient['age']) ? $transferReport->getPatient['age'] : '-' }}<br>
                                <span class="pb-1 ivf-label">Weight :</span> {{ !empty($transferReport->getPatient['weight']) ?$transferReport->getPatient['weight'] : '-' }}
                            </th>
                        </tr>
                    </tbody>
                </table>
                {{-- <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <strong>Indication :</strong>
                        </div>
                        <div class="col-sm-6">
                            
                        </div>
                        <div class="col-sm-2">
                            
                        </div>
                        <div class="col-sm-2">
                            
                        </div>
                    </div>
                </div> --}}
                <table class="table table-bordered mt-2 transfer-table">
                   
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">Embryo Transfer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ET Date</td>
                            <td>{{ !empty($transferReport->et_date) ? Carbon\Carbon::parse($transferReport->et_date)->format('D d-M-Y') : '-' }}</td>
                            <td>Day</td>
                            <td>{{ !empty($transferReport->day) ? $transferReport->day : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Endo. Thickness</td>
                            <td>{{ !empty($transferReport->endo_thickness) ? $transferReport->endo_thickness : '-' }}</td>
                            <td>ET Procedure</td>
                            <td>{{ !empty($transferReport->et_procedure) ? $transferReport->et_procedure : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Embryos Transferred</td>
                            <td colspan="3">{{ !empty($transferReport->embryos_transferred) ? $transferReport->embryos_transferred : '-' }}
                            
                            </td>
                        </tr>
                        <tr>
                            <td>Frozen Embryos</td>
                            <td colspan="3">{{ !empty($transferReport->frozen_embryos) ? $transferReport->frozen_embryos : '-' }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Embryos Transferred Report</td>
                            <td colspan="3">
                                @if(!empty($transferReport->embryos_transferred_image))
                                <img src="{{url($transferReport->embryos_transferred_image)}}" height="100" width="100">
                                @endif
                            </td>
                        </tr>
                    </tfoot>
                </table>
                {{-- <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">Embryo Transfer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pick up  Date</td>
                            <td>{{ !empty($transferReport->pickup_date) ? Carbon\Carbon::parse($transferReport->pickup_date)->format('D d-M-Y') : '-' }}</td>
                            <td>Simulation Protocol</td>
                            <td>{{ !empty($transferReport->simulation_protocol) ? $transferReport->simulation_protocol : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Total OCC</td>
                            <td>{{ !empty($transferReport->total_occ) ? $transferReport->total_occ : '-' }}</td>
                            <td>Mll</td>
                            <td>{{ !empty($transferReport->mll) ? $transferReport->mll : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Ml</td>
                            <td>{{ !empty($transferReport->ml) ? $transferReport->ml : '-' }}</td>
                            <td>GV</td>
                            <td>{{ !empty($transferReport->gv) ? $transferReport->gv : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Oocyte Quality</td>
                            <td>{{ !empty($transferReport->oocycle_quality) ? $transferReport->oocycle_quality : '-' }}</td>
                            <td>Sperm Quality</td>
                            <td>{{ !empty($transferReport->sperm_quality) ? $transferReport->sperm_quality : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Fertilization Procedure</td>
                            <td colspan="3">{{ !empty($transferReport->fertilization_procedure) ? $transferReport->fertilization_procedure : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Remark</td>
                            <td colspan="3">{{ !empty($transferReport->remark) ? $transferReport->remark : '-' }}</td>
                        </tr>
                    </tbody>
                </table> --}}
                
                <table cellspacing="0" cellpadding="0" class="{{'table m-b-0 module-report-table'}}">
                    <tbody>
                        @php
                            $todayDate = Carbon\Carbon::Now();
                        @endphp
                        <tr>
                            <th>
                                <span class="pb-1 ivf-label">Follow Up Date : {{Carbon\Carbon::parse(!empty($transferReport->created_at) ? $transferReport->created_at : $todayDate)->addDays(14)->format('D d-M-Y')}}</span><br>
                                <span class="pb-1 ivf-label">Best Of Luck</span>
                            </th>
                            <th>
                                <span class="pb-1 ivf-label">{{config('app.doctor') }}</span>
                                <br>
                                <span class="pb-1 ivf-label">Chief Consultant</span>
                            </th>
                            <th>
                            <th class="pb-1 float-right ivf-label text-center">
                                <span class="pb-1 ivf-label">Dr. Bhavna Borkhataria</span>
                                <br>
                                <span class="pb-1 ivf-label">Embryologist</span>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        {{-- </div> --}}
    {{-- </body> --}}
{{-- </html> --}}
@endsection