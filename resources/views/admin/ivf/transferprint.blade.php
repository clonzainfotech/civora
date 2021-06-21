<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<style>
    .patient-name {
        text-transform: uppercase;
    }
    .patient-detail {
        margin-bottom: 20px;
    }
</style>
@php
    $todayDate = Carbon\Carbon::Now();
@endphp
