<style type="text/css">
    .print-invoice-table, .invoice-header, .invoice-receipt, .invoice-data {
        font-family: 'Montserrat', Arial, Tahoma, sans-serif;
        width: 100%;
    }
    .invoice-header,.invoice-data{
        border: 1px solid #ddd;
    }

    .invoice-width {
        width: 100%;
    }
    .invoice-hospital{
        height: 50px;
        font-size: 28px;
        font-weight: 900;
    }
    .invoice-address{
        text-align: center;
        height: 45px;
    }

    .invoice-receipt {
        background-color: #ddd;
    }

    .invoice-receipt-th {
        line-height: 15px;
        font-size: 18px;
        font-weight: 900;
    }

    .invoice-data {
        padding: 10px 10px;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right
    }
    th {
        text-align: left;
        padding: 10px 10px;
    }

    .invoice td {
        height: 25px;
        font-size: 14px;
        padding: 10px 10px;
    }

    .all-side-border {
        border: 0.5px solid #dee2e6;
    }

    .left-right-side-border {
        border-left: 0.5px solid #dee2e6;
        border-right: 0.5px solid #dee2e6;
    }

</style>
<table id="print-invoice-table" class="print-invoice-table">
    <tbody>
    <br />
    <br />
    <br />
    <br />
        <tr>
            <td>
                <table class="invoice-receipt" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="invoice-receipt-th text-center">HORMON</th>
                        </tr>
                    </thead>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="invoice-data invoice" cellpadding="0" cellspacing="0">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Patient Name :</td>
                            <td>{{ucwords(strtolower($patientname[0]))}}</td>
                        </tr>
                         @if($hormon->charge_type == 1)
                        <tr>
                            <td>Charge Type</td>
                            <td>HORMON</td>
                        </tr>
                         <tr>
                            <td>Injection</td>
                            <td>{{$hormon->injection}}</td>
                        </tr>
                        @elseif($hormon->charge_type == 2)
                        <tr>
                            <td>Charge Type</td>
                            <td>IVF</td>
                        </tr>
                        @else
                        <tr>
                            <td>Charge Type</td>
                            <td>IUI </td>
                        </tr>
                        @endif
                        <tr>
                            <td>Refrence Doctor</td>
                            <td>{{$doctor[0]}} </td>
                        </tr>
                        <tr>
                            <td>Charge Amount</td>
                            <td>
                                 {{$hormon->amount}}
                            </td>
                        </tr>
                    <tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
