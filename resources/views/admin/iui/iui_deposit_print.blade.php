@php
    $iuiDepositHistoryInjection = !empty($iuiBill->injections) ? json_decode($iuiBill->injections) : null;
    // dd($iuiDepositHistoryInjection);
@endphp
<style type="text/css">
    .iui-report-table-first, .module-report-table{
        font-family: 'Montserrat', Arial, Tahoma, sans-serif;
        width: 100%;

    }
    .module-report-table tr {
        border: 1px solid #000000;
        height: 36px;
    }

    .iui-report-table-first {
        margin-top: 80px;
    }
    .iui-report-header-tr-th {
        font-size: 13px;
    }
    .module-report-table {
        font-family: 'Montserrat', Arial, Tahoma, sans-serif;
        width: 100%;
    }
    .iui-report-date-font {
        font-size: 14px;
    }

    .iui-report-height-fifty {
        height: 50px;
    }
    .iui-report-header {
        font-weight: 900;
        font-size: 20px;
    }
    .iui-report-header-tr{
        text-align: left;
        height: 35px;
        background-color: #bdf3f5;
        border: 1px solid #000000;
    }
    .charges {
        font-weight: 600;
        font-size: 11px;
    }
    .upper-border {
        border-top: 1px solid #000000;
    }
    .text-left {
        text-align: left;
        font-size: 13px;
    }
    .text-center {
        text-align: center;
        font-size: 13px;
    }
    .text-right {
        text-align: right;
    }
    .seperator {
        border-top: 0.5px solid #dee2e6;
    }
    .data-font {
        font-size: 11px;
    }
    tr, th, td {
        padding: 12px 12px;
        font-size: 13px;
    }

    .upper-border {
        border-top: 1px solid #000000;
    }
</style>
<table class="table m-b-0 table-hover iui-report-table-first">
    <br />
    <br />
    <br />
    <br />

    <thead>
        <tr>
            <th>IUI Bill</th>
        </tr>
    </thead>
</table>
<table class="module-report-table font" cellspacing="0">
    <tbody>
        <tr>
            <td class="seperator">NAME :</td>
            <td class="seperator">{{ ucwords(strtolower($iuiBill->getPatients['name'])) }}</td>
        </tr>
    </tbody>
</table>
<table cellspacing="0" cellpadding="0" class="table m-b-0 table-hover module-report-table">
    <tbody>
        <tr>
            <td class="seperator">O.STUDY :</td>
            <td class="seperator"></td>
            <td class="seperator"></td>
            <td class="seperator"></td>
            <td class="seperator">{{ $iuiBill->o_study }}</td>
        </tr>
        @if ($iuiDepositHistoryInjection)
            @foreach($iuiDepositHistoryInjection as $key => $value)
            {{-- {{dd($value)}} --}}
                <tr>
                    <td class="seperator">{{ $value->name }}</td>
                    <td class="seperator">{{ $value->quantity }}</td>
                    <td class="seperator">X</td>
                    <td class="seperator">{{ ($value->injection_price  != 0) ? $value->injection_price : null }}</td>
                    <td class="seperator text-left">{{ $value->price }}</td>
                </tr>
            @endforeach
        @endif
        <tr>
            <td class="seperator">IUI</td>
            <td class="seperator"></td>
            <td class="seperator"></td>
            <td class="seperator"></td>
            <td class="seperator">{{ $iuiBill->iui }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <th class="text-right">Total</th>
            <th class="seperator upper-border text-left">{{ $iuiBill->total }}</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right">Discount</td>
            <td class="seperator">
                @php
                    if (!empty($iuiBill->discount)) {
                        echo ($iuiBill->discount_in == 1) ? $iuiBill->discount . ' %' : $iuiBill->discount;
                    } else {
                        echo '-';
                    }
                @endphp
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right">Deposit</td>
            <td class="seperator">{{ !empty($currentDeposit) ? $currentDeposit : '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <th class="text-right ">Grand Total</th>
            <th class="seperator upper-border text-left">{{ $iuiBill->grand_total}}</th>
        </tr>
    </tbody>
</table>
