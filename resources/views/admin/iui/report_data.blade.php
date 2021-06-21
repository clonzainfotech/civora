<div class="card">
    <div class="body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <h5>Hystroscopy Report</h5>
                </div>
            </div>
            @if(!empty($report->hystroscopy->images))    
                @foreach($report->hystroscopy->images as $key=>$row)
                    <div class="report-file">
                        <iframe src="{{URL::to($row)}}" height="200" width="233"></iframe>
                        <br>
                        <div class="row view-report-file">
                            <a href="{{URL::to($row)}}" class="btn btn-primary btn-sm" target="_blank">View</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No report uploaded</p>
            @endif
        </div>
    </div>
</div>
<div class="card">
    <div class="body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <h5>Laproscopy Report</h5>
                </div>
            </div>
            @if(!empty($report->laproscopy->images))    
                @foreach($report->laproscopy->images as $key=>$row)
                    <div class="report-file">
                        <iframe src="{{URL::to($row)}}" height="200" width="233"></iframe>
                        <br>
                        <div class="row view-report-file">
                            <a href="{{URL::to($row)}}" class="btn btn-primary btn-sm" target="_blank">View</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No report uploaded</p>
            @endif
        </div>
    </div>
</div>
<div class="card">
    <div class="body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <h5>HCG Report</h5>
                </div>
            </div>
            @if(!empty($report->hcg->images))
                @foreach($report->hcg->images as $key=>$row)
                    <div class="report-file">
                        <iframe src="{{URL::to($row)}}" height="200" width="233"></iframe>
                        <br>
                        <div class="row view-report-file">
                            <a href="{{URL::to($row)}}" class="btn btn-primary btn-sm" target="_blank">View</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No report uploaded</p>
            @endif
        </div>
    </div>
</div>