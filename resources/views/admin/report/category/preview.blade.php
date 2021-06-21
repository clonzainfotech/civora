<style type="text/css">
.category-report-table-first, .category-report-table{
    font-family: 'Montserrat', Arial, Tahoma, sans-serif;
    width: 100%;
}
.category-report-table-first{
    border-bottom: 1px solid #000000;
    margin-bottom: 10px;
}
.category-report-table{
    text-align: left;
}
.category-report-table-first tr{
    height: 50px;
    font-size: 20px;
}
.doctor-category{
    color: #01d8da;
}
.category-report-table thead th{
    height: 35px;
}
.category-report-table thead th span{
    border-bottom: 1px solid #000000;
}
.category-report-table tr {
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
</style>
<table class="table m-b-0 table-hover category-report-table-first" id="category-report-table" cellspacing="0">
    <thead>
        <tr>
            <th colspan="5">{{strtoupper(config('app.hospitalname1'))}}</th>
        </tr>
        <tr>
            <th>Doctor / Category Wise @if($reportDatails['type']==2) Summary @endif Report</th>
        </tr>
    </thead>
</table>
<table class="table m-b-0 table-hover category-report-table" id="category-report-table" cellspacing="0">
@if($reportDatails['type']==1)
    <?php 
        $i = 1;
    ?>
    <thead>
        <tr class="report-header-tr seperator">
            <th class="report-header-tr-th">Sr No</th>
            <th class="report-header-tr-th">Code</th>
            <th class="report-header-tr-th">Patient Name</th>
            <th class="report-header-tr-th">Mobile</th>
            <th class="report-header-tr-th">Category</th>
            <th class="report-header-tr-th">Amount</th>
        </tr>
        @if($reportDatails['doctor'])
            <tr>
                <th colspan="6" class="sub-heading">Doctor Name : {{ucwords(strtolower($reportDatails['doctor']))}}</th>
            </tr>
        @endif
        @if($reportDatails['category'])
            <tr>
                <th colspan="6" class="sub-heading">Category Name : {{ucfirst($reportDatails['category'])}}</th>
            </tr>
        @endif
        </thead>
        <tbody>
        @forelse($categoryReport as $row)
            <tr>
                <td class="data-font seperator">{{ ($i++) . '.' }}</td>
                <td class="data-font seperator">{{ $row->getAppointment->getPatientsDetails['code'] }}</td>
                <td class="data-font seperator">{{strtoupper($row->getAppointment->getPatientsDetails['name'])}}</td>
                <td class="data-font seperator">{{$row->getAppointment->getPatientsDetails['mobile_number']}}</td>
                <td class="data-font seperator">{{ucfirst($row->getAppointment->categoryDetails['name']) }}</td>
                <td class="data-font seperator">
                    <div class="amount">
                        {{$row->netamount}}
                    </div>
                </td>
            </tr>
        @empty
            <td colspan="6" class="text-center">No records available</td>
        @endforelse
        @if ($reportDatails['total'] > 0)
            <tr>
                <th colspan="4"></th>
                <th colspan="1">Grand Total :</th>
                <th class="upper-border">{{$reportDatails['total']}}</th>
            </tr>
        @endif
    </tbody>
@else
    <thead>
        <tr>
            <th>Category</th>
            <th>Total Patient</th>
        </tr>
        <tr>
            <th colspan="2">Doctor Name : {{$reportDatails['doctor']}}</th>
        </tr>
    </thead>
    <tbody>
        @if($reportDatails['category'])
            <tr>
                <td>{{$reportDatails['category']}}</td>
                <td>{{$reportDatails['count']}}</td>
            </tr>
        @endif
    </tbody>
@endif
</table>
