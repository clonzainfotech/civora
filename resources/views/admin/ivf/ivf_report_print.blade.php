<link rel="stylesheet" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<style>
    .patient-info {
        margin-bottom: 20px;
        font-weight: 500;
    }
    .drname {
    font-weight: 500;
    text-transform: uppercase;
}
.degree {
    font-weight: 500;
    text-transform: uppercase;
    font-size: 12px;
}
.proffesion {
    font-weight: 500;
    text-transform: uppercase;
}
/* .ivf-report-data {
    padding: 50px;
} */
.patient-info {
    padding: 50px 0;
}
.display-name {
    text-transform: capitalize;
}
.doctor-info {
    padding: 50px 0;
}
</style>

<div class="container ivf-report-data">
    <div class="row patient-info">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">Patient name :</div>
            <div class="col-md-9 display-name">Mrs. {{strtolower($ivfReport->getPatients->name)}}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">Date :</div>
            <div class="col-md-6">{{$ivfReport->date}}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">Age :</div>
                <div class="col-md-6">{{$ivfReport->getPatients->age}}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">Reason :</div>
                <div class="col-md-6">{{$ivfReport->reason}}</div>
            </div>
        </div>
    </div>
    @php 
    $volume = json_decode($ivfReport->volume);
    $sperm = json_decode($ivfReport->sperm_count);
    $motility = json_decode($ivfReport->total_motility);
    $actively = json_decode($ivfReport->actively);
    $sluggishly = json_decode($ivfReport->sluggishly);
    $motile = json_decode($ivfReport->non_motile);
    $morphology = json_decode($ivfReport->morphology);
    $cells = json_decode($ivfReport->pus_cells);
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="container">
            <table class="table table-bordered">
                <thead>
                    <th>Parameter</th>
                    <th>Pre-wash</th>
                    <th>Post-wash</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Volume</td>
                        <td>{{!empty($volume->pre) ? $volume->pre.' ml' : ''}}</td>
                        <td>{{!empty($volume->post) ? $volume->post.' ml' : ''}}</td>
                    </tr>
                    <tr>
                        <td>Sperm Count/ml</td>
                        <td>{{!empty($sperm->pre) ? $sperm->pre.' mill/ml' : ''}}</td>
                        <td>{{!empty($sperm->post) ? $sperm->post.' mill/ml' : ''}}</td>
                    </tr>
                    <tr>
                        <td>Total Motility (%)</td>
                        <td>{{!empty($motility->pre) ? $motility->pre.' %' : ''}}</td>
                        <td>{{!empty($motility->post) ? $motility->post.' %' : ''}}</td>
                    </tr>
                    <tr>
                        <td>Actively Motile (%)</td>
                        <td>{{!empty($actively->pre) ? $actively->pre.' %' : ''}}</td>
                        <td>{{!empty($actively->post) ? $actively->post.' %' : ''}}</td>
                    </tr>
                    <tr>
                        <td>Sluggishly Motile(%)</td>
                        <td>{{!empty($sluggishly->pre) ? $sluggishly->pre.' %' : ''}}</td>
                        <td>{{!empty($sluggishly->post) ? $sluggishly->post.' %' : ''}}</td>
                    </tr>
                    <tr>
                        <td>Non-motile(%)</td>
                        <td>{{!empty($motile->pre) ? $motile->pre.' %' : ''}}</td>
                        <td>{{!empty($motile->post) ? $motile->post.' %' : ''}}</td>
                    </tr>
                    <tr>
                        <td>Normal Morphology</td>
                        <td>{{!empty($morphology->pre) ? $morphology->pre.' %' : ''}}</td>
                        <td>{{!empty($morphology->post) ? $morphology->post.' %' : ''}}</td>
                    </tr>
                    <tr>
                        <td>Pus Cells/hpf</td>
                        <td>{{!empty($cells->pre) ? $cells->pre.'/hpf' : ''}}</td>
                        <td>{{!empty($cells->post) ? $cells->post.'/hpf' : ''}}</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="row doctor-info">
        <div class="col-md-4">
            <div class='drname'>{{config('app.doctor') }}</div>
            <div class='degree'>(M.B., D.G.O)</div>
            <div class='proffesion'>Chief consultant</div>
        </div>
        <div class="col-md-4">
            <div class='drname'>bhavna borkhataria</div>
            <div class='degree'>(M.Sc., ph.D.)</div>
            <div class='proffesion'>embryologist</div>
        </div>
        <div class="col-md-4">
            <div class='drname'>devisha mavani</div>
            <div class='degree'>(M.Sc.)</div>
            <div class='proffesion'>andrologist</div>
        </div>
    </div>
</div>
