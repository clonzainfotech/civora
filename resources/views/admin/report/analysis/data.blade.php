
<div class="row m-0 clearfix dashboard">
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">TOTAL</p>
                        <h4 class="number mt-0 mb-0">{{ $data ['total'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">NEW INF</p>
                        <h4 class="number mt-0 mb-0">{{ $data['newinf']  }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">OLD INF</p>
                        <h4 class="number mt-0 mb-0">{{ $data['oldinf'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">Continue</p>
                        <h4 class="number mt-0 mb-0">{{ $data['continue'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">Drop</p>
                        <h4 class="number mt-0 mb-0">{{ $data['drop'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">CC</p>
                        <h4 class="number mt-0 mb-0">{{ $data['cc'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">LTC</p>
                        <h4 class="number mt-0 mb-0">{{ $data['ltc'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">Consive</p>
                        <h4 class="number mt-0 mb-0">{{ $data['consive'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-12">
                        <p class="text-muted">Fail</p>
                        <h4 class="number mt-0 mb-0">{{ $data['fail'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="row m-0">--}}
{{--    <div class="col-md-1">--}}
{{--        No--}}
{{--    </div>--}}
{{--    <div class="col-md-8">--}}
{{--        Name--}}
{{--    </div>--}}
{{--    <div class="col-md-3">--}}
{{--        Mobile--}}
{{--    </div>--}}
{{--</div>--}}
{{--@foreach($data['patients'] as $index => $patient)--}}
{{--    <div class="row m-0">--}}
{{--        <div class="col-md-1">--}}
{{--            {{$index+1}}--}}
{{--        </div>--}}
{{--        <div class="col-md-8">--}}
{{--            {{$patient->name}}--}}
{{--        </div>--}}
{{--        <div class="col-md-3">--}}
{{--            {{$patient->mobile_number}}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}
