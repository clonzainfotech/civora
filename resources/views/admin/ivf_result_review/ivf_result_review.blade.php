@extends('layouts.main')
@section('parentPageTitle', 'Medical')
@section('title', 'Medical')
@section('page-style')
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
@stop
@section('content')

<div class="card">
    <div class="body medicine-body-padding">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{ucwords(strtolower($patients->name))}}</h5>
                </div>
                <div class="col-md-6 text-right">
                
                    <a href="#">
                        <button class="btn btn-primary print-medicine">
                            Print
                        </button>
                    </a>
                    <a href="{{URL::to('ivf-result-review')}}">
                        <button class="btn btn-primary">
                            Back
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('page-script')
<script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
    <script type="text/javascript">
        var qstring = '';
        var lastCId = '';
        var page = '';
        var patientId = "";
        var status = '';
        var cId = '';
        var date = '';
        var type = '';

        

        

    </script>
@stop
