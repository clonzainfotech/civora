<style type="text/css">
    .review-list, .review-table{
        font-family: 'Montserrat', Arial, Tahoma, sans-serif;
        width: 100%;
    }
    .review-list{
        border-bottom: 1px solid #000000;
        margin-bottom: 10px;
    }
    .review-table{
        text-align: left;
    }
    .review-list tr{
        height: 50px;
        font-size: 20px;
    }
    .review-table thead th{
        height: 35px;
    }
    .review-table thead th span{
        border-bottom: 1px solid #000000;
    }
    .review-table tr {
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
    <link rel="stylesheet" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/themes.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/main.css')}}">
    <table class="table m-b-0 table-hover review-list" id="review-table" cellspacing="0">
        <thead>
            <tr>
                <th colspan="5">{{strtoupper(config('app.hospitalname1'))}}</th>
            </tr>
        </thead>
    </table>
    <table class="table m-b-0 table-hover review-table" id="review-table" cellspacing="0">
        <?php 
            $j = 1;
        ?>
        <thead>
            <tr class="report-header-tr seperator">
                <th class="report-header-tr-th">Sr No</th>
                <th class="report-header-tr-th">Name</th>
                <th class="report-header-tr-th">Role</th>
                <th class="report-header-tr-th">Rating</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviewData as $review)
                <tr>
                    <td class="data-font seperator">{{($j++).'.'}}</td>
                    <td class="review-patient-name">{{$review->name}}</td>
                    <td class="review-patient-name">
                        @foreach($review->getReviewData as $row)
                            <div class="review-role-name">{{$row->getReviewRole->name}}</div>
                        @endforeach
                    </td>
                    <td class="review-patient-name">
                        @foreach($review->getReviewData as $row)
                            @for($i = 0; $i < 5; ++$i)
                                <i class="zmdi zmdi-star{{ $row->rate <= $i ? '-o' : '' }}" aria-hidden="true" style="color:#eca63b"></i>
                            @endfor
                            @php
                                echo '<br />';
                            @endphp
                        @endforeach
                    </td>
                </tr>
            @empty
                <td colspan="4" class="text-center">No records available</td>
            @endforelse
        </tbody>
    </table>
    