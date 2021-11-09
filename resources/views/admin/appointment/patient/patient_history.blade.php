@extends('layouts.main')
@section('parentPageTitle', 'Patient History')
@section('title', 'Patient History')
@section('page-style')
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
@endsection
<style>
.follicular-table tbody,.follicular-table thead
{
    font-size: 16px !important;
}
.follicular-table .visit-lable {
    font-size: 16px !important;
}
span.ivf-label
{
    font-weight: 700 !important;
}
table.medicine-table
{
    width: 100%
}

</style>

@section('content')
    <div class="row clearfix">
        <div class="col-md-12 p-0">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong class="text-secondary">{{ucwords($patients->name)}}</strong></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix appointment">
        <div class="col-md-12">
            <div class="card patients-list">
                @foreach($history as $key => $type)
                    @foreach($type as $category => $data)
                        @if(!empty($data))
                            <div class="header">
                                
                                <h2><strong>{{$category}}</strong></h2>
                                {{-- <ul class="header-dropdown">
                                    <li>
                                        <a href="{{URL::to('create-patient')}}">
                                            <button class="btn btn-primary">
                                                Add
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <button class="btn btn-primary patients-print">
                                                Print
                                            </button>
                                        </a>
                                    </li>
                                </ul> --}}
                            </div>

                            <div class="body">
                                <!-- Nav tabs -->
                                    <div class="col-md-12">
                                        @php echo htmlspecialchars_decode(stripslashes($data)); @endphp
                                    </div>
                                <!-- Tab panes -->
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    
@endsection

@section('page-script')
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
    <script type="text/javascript">
        var page = '';
        var patientId = '';
        var referenceDoctorId = '';
        var search = '';
        var date = '';

        $(document).ready(function(){

            $(".daterange").daterangepicker({
                locale: {
                    direction: 'drop-down-date-range',
                    cancelLabel: 'Clear',
                    format: 'D/M/Y',
                }
            });
        });
        
    </script>
@stop
