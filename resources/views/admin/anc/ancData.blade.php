
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<?php
    $systemSetting = systemSetting();
    $htmlFavicon = isset($systemSetting->html_favicon) && !empty($systemSetting->html_favicon) ? $systemSetting->html_favicon : 'favicon.ico';
    $title = isset($systemSetting->html_title) && !empty($systemSetting->html_title) ? $systemSetting->html_title : null;
?>
{{--added by developer <html lang="{{ app()->getLocale() }}" oncontextmenu="return false;">--}}
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if (isset($htmlFavicon) && !empty($htmlFavicon))
            <link rel="icon" href="{{URL::to('assets/' . $htmlFavicon)}}" type="image/x-icon"> <!-- Favicon-->
        @endif
        <title>@yield('title') {{ !empty($title) ? ' - ' . $title : null }}</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')
        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        @if (trim($__env->yieldContent('page-style')))
            @yield('page-style')
        @endif
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{url('assets/css/main.css')}}">
        <link rel="stylesheet" href="{{url('assets/css/color_skins.css')}}">
        @stack('after-styles')
        <link rel="stylesheet" href="{{url('assets/plugins/sweetalert/sweetalert.css')}}"/>
        <link rel="stylesheet" href="{{url('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}">
        <link rel="stylesheet" href="{{url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('assets/css/themes.css')}}">
        <style type="text/css">
            .imgstyle{
                width: 100px;
                height: 100px;
                margin-left: 20px;
            }
        </style>
    </head>
    <?php
        $setting = !empty($_GET['theme']) ? $_GET['theme'] : '';
        $theme = "theme-cyan";
        $menu = "";

        $pData= $data['patientsInfo'];
        $ho = $data['ho'];
        $co = $data['co'];
        $cotype = $co->co_type;
        $patientsObstratics = $data['patientsObstratics'];
        $childData =  $patientsObstratics->child->child_data;
        $mtpdata = $patientsObstratics->mtp->mtp_data;
        $abortionData = $patientsObstratics->abortion->abortion_data;
        $sMarriageChildData = $patientsObstratics->second_marriage->child->child_data;
        $sMarriageMtpData = $patientsObstratics->second_marriage->mtp->mtp_data;
        $sMarriageAbortionData = $patientsObstratics->second_marriage->abortion->abortion_data;
        $mh= $data['mh'];
        $patientsDetails = $data['patientsDetails'];
        $oe = $data['oe'];
        $patientsInvestigation = $data['patientsInvestigation'];
        $patientsInjection = $data['patientsInjection'];
        $usg = $data['usg'];
        $treatment = $data['treatment'];
        // dd($oe);
        if(!empty($patientsInvestigation->investigation_early_scan_type)){
        $investigationimg=$patientsInvestigation->investigation_early_scan_type;
        }
        if(!empty($patientsInvestigation->anc)){
        $ancimage=$patientsInvestigation->anc;
        }
        if(!empty($patientsInvestigation->other_report_data)){
        $otherdataimg=$patientsInvestigation->other_report_data;
        }
        if(!empty($patientsInvestigation->growth_report)){
        $grouthimage=$patientsInvestigation->growth_report;
        }
        if(!empty($usg->images)){
        $usgimg=$usg->images;
        }
        $systemSetting = systemSetting();
        $primary = isset($systemSetting->primary) && !empty($systemSetting->primary) ? $systemSetting->primary : null;
    ?>
    <style>
        .loader{
            background-color: <?php echo $primary ?> !important;
            color: <?php echo $primary ?> !important;
        }
    </style>
    <body class="theme-cyan">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{url(config('app.loader'))}}" width="48" height="48" alt="Oreo"></div>
                <!-- <p>Please wait...</p> -->
            </div>
        </div>
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        {{-- @include('layouts.navbar')
        @include('layouts.sidebar') --}}
        <section class="content home" style="margin: 0;">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                       @if (Request::segment(2) === 'doctors' or Request::segment(2) === 'add-doctor' or Request::segment(2) === 'all-patients' or Request::segment(2) === 'add-patients' or Request::segment(2) === 'add-payment' or Request::segment(2) === 'all-departments' or Request::segment(2) === 'add-department')
                            <button class="btn btn-white btn-icon d-none d-md-inline-block float-right m-l-10" type="button">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        @endif

                        @if (Request::segment(2) === 'profile' or Request::segment(2) === 'patients-profile')
                            <button class="btn btn-white btn-icon d-none d-md-inline-block float-right m-l-10" type="button">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix anc">
                    <div class="col-md-12">
                        <div class="card patients-list">
                            <div class="header">
                                <h2><strong>ANC</strong></h2>
                            </div>

                            <div class="body">
                                <div class="mb-3">
                                    <h5>Patient Basic Information</h5>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Name :</span>
                                            @if(!empty($ancData->getPatients['name']))
                                            <span><strong>{{$ancData->getPatients['name']}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            @if(!empty($ancData->getPatients['code']))
                                            <span>Code :</span>
                                            <span><strong>{{$ancData->getPatients['code']}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            @if(!empty($ancData->getPatients['age']))
                                            <span>Age :</span>
                                            <span><strong>{{$ancData->getPatients['age']}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            @if(!empty($ancData->getPatients['weight']))
                                            <span>Weight :</span>
                                            <span><strong>{{$ancData->getPatients['weight']}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            @if(!empty($ancData->getPatients['mobile_number']))
                                            <span>Mobile Number :</span>
                                            <span><strong>{{$ancData->getPatients['mobile_number']}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            @if(!empty($pData->visit_date))
                                            <span>Visit Date :</span>
                                            <span><strong>{{$pData->visit_date}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            @if(!empty($ancData->getPatients->getReferenceDoctor['name']))
                                                <span>Reference Dr. :</span>
                                                <span><strong>{{$ancData->getPatients->getReferenceDoctor['name']}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            @if(!empty($ancData->getPatients->getReferenceDoctor['mobile_number']))
                                                <span>Reference Dr. Mobile Number :</span>
                                                <span><strong>{{$ancData->getPatients->getReferenceDoctor['mobile_number']}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @if(!empty($ancData->getPatients['residence']))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Residence :</span>
                                            <span><strong>{{$ancData->getPatients['residence']}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ancData->getPatients['main_area']))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Area :</span>
                                            <span><strong>{{$ancData->getPatients['main_area']}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ancData->getPatients['city']))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>City :</span>
                                            <span><strong>{{$ancData->getPatients['city']}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <h5>H/O</h5>
                                </div>

                                <div class="row mb-3">
                                    @if(!empty($ho->ho_details))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>H/O Details:</span>
                                            <span><strong>{{$ho->ho_details}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ho->amenorrhoea))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Amenorrhoea:</span>
                                            <span><strong>{{$ho->amenorrhoea}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ho->ho_type))
                                    <?php
                                        $hoType = '';
                                        if($ho->ho_type == 1) {
                                            $hoType = 'Naturally';
                                        } else if($ho->ho_type == 2) {
                                            $hoType = 'Medicine';
                                        } else if($ho->ho_type == 3) {
                                            $hoType = 'IUI';
                                        } else {
                                            $hoType = 'IVF';
                                        }
                                    ?>
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>H/O Type:</span>
                                            <span><strong>{{$hoType}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ho->when_where))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>When/where :</span>
                                            <span><strong>{{$ho->when_where}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ho->le->bp))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>BP :</span>
                                            <span><strong>{{$ho->le->bp}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ho->le->temp))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Temp :</span>
                                            <span><strong>{{$ho->le->temp}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ho->le->pulse))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Pulse :</span>
                                            <span><strong>{{$ho->le->pulse}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>


                                    <div class="mb-3">
                                        <h5>C/O</h5>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                  <span>C/O Type :</span>
                                                    <span><strong>
                                                        @foreach ($cotype as $type)
                                                            {{$type}},
                                                        @endforeach
                                                    </strong></span>
                                                {{-- @endif --}}
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                @if(!empty($co->since))
                                                <span>Since :</span>
                                                <span><strong>{{$co->since}}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                {{-- @endif --}}

                                <div class="mb-3">
                                    <h5>Obstetrict History</h5>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            @if(!empty($patientsObstratics->marriage_life))
                                            <span>First Marriage Life :</span>
                                            <span><strong>{{$patientsObstratics->first_marriage_life}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            @if(!empty($patientsObstratics->upt_type))
                                            <span>UPT :</span>
                                            <span><strong>{{$patientsObstratics->upt_type}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            @if(!empty($patientsObstratics->upt_details))
                                            <span>UPT Details :</span>
                                            <span><strong>{{$patientsObstratics->upt_details}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-1">
                                                    @if(!empty($patientsObstratics->child_no))
                                                    <span>Child No :</span>
                                                    <span><strong>{{$patientsObstratics->child_no}}</strong></span>
                                                    @endif
                                                </div>
                                            </div>
                                            @if(!empty($patientsObstratics->child->ho_type))
                                                    <?php
                                                        $hoType = '';
                                                        if($patientsObstratics->child->ho_type == 1) {
                                                            $hoType = 'Naturally';
                                                        } else if($patientsObstratics->child->ho_type == 2) {
                                                            $hoType = 'Medicine';
                                                        } else if($patientsObstratics->child->ho_type == 3) {
                                                            $hoType = 'IUI';
                                                        } else {
                                                            $hoType = 'IVF';
                                                        }
                                                    ?>
                                            <div class="col-md-3">
                                                <div class="mb-1">
                                                    <span>H/O Type :</span>
                                                    <span><strong>{{$hoType}}</strong></span>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-3">
                                                <div class="mb-1">
                                                    @if(!empty($patientsObstratics->child->when_where))
                                                    <span>When / Where :</span>
                                                    <span><strong>{{$patientsObstratics->child->when_where}}</strong></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($patientsObstratics) && ($patientsObstratics->child_no != null && $patientsObstratics->child_no != 0))
                                    <div class="col-md-12">
                                        <div class="mb-1 mt-1"><h6>Child Data</h6></div>
                                        <?php $i =1;?>
                                        @foreach ($childData as $cdata)
                                        <div class="row">

                                            <div class="col-md-1">
                                                <div class="mb-1">
                                                  Child {{$i++}} :-

                                                </div>
                                            </div>
                                            @if(!empty($cdata->ho_term))
                                            <div class="col-md-2">
                                                <div class="mb-1">

                                                    <span>H/O Term :</span>
                                                    <span><strong>{{$cdata->ho_term}}</strong></span>

                                                </div>
                                            </div>
                                            @endif
                                            @if(!empty($cdata->ho_term_details))
                                            <div class="col-md-2">
                                                <div class="mb-1">

                                                    <span>H/O Term Details:</span>
                                                    <span><strong>{{$cdata->ho_term_details}}</strong></span>

                                                </div>
                                            </div>
                                            @endif
                                            @if(!empty($cdata->ho_type))
                                            <?php
                                                $hoType = '';
                                                if($cdata->ho_type == 1) {
                                                    $hoType = 'Naturally';
                                                } else if($cdata->ho_type == 2) {
                                                    $hoType = 'Medicine';
                                                } else if($cdata->ho_type == 3) {
                                                    $hoType = 'IUI';
                                                } else {
                                                    $hoType = 'IVF';
                                                }
                                            ?>
                                            <div class="col-md-2">
                                                <div class="mb-1">
                                                    <span>H/O Type :</span>
                                                    <span><strong>{{$hoType}}</strong></span>
                                                </div>
                                            </div>
                                            @endif
                                            @if(!empty($cdata->ho_gender))
                                            <div class="col-md-2">
                                                <div class="mb-1">

                                                    <span>H/O Gender :</span>
                                                    <span><strong>{{$cdata->ho_gender}}</strong></span>

                                                </div>
                                            </div>
                                            @endif
                                            @if(!empty($cdata->ho_birth_type))
                                            <div class="col-md-2">
                                                <div class="mb-1">

                                                    <span>H/O Birth Type :</span>
                                                    <span><strong>{{$cdata->ho_birth_type}}</strong></span>

                                                </div>
                                            </div>
                                            @endif
                                            @if(!empty($cdata->expired_reason))
                                            <div class="col-md-2">
                                                <div class="mb-1">

                                                    <span>Expired reason :</span>
                                                    <span><strong>{{$cdata->expired_reason}}</strong></span>

                                                </div>
                                            </div>
                                            @endif
                                            @if(!empty($cdata->live_health_year))
                                            <div class="col-md-2">
                                                <div class="mb-1">

                                                    <span>Live health Year :</span>
                                                    <span><strong>{{$cdata->live_health_year}}</strong></span>

                                                </div>
                                            </div>
                                            @endif


                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    @if(!empty($patientsObstratics  && ($patientsObstratics->mtp_no != null && $patientsObstratics->mtp_no != 0 )))
                                    <div class="col-md-12">
                                        <div class="mb-1 mt-1"><h6>MTP Data</h6></div>
                                        <?php $i =1;?>
                                        @foreach ($mtpdata as $mdata)
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="mb-1">
                                                  MTP {{$i++}} :-

                                                </div>
                                            </div>
                                            @if(!empty($mdata->mtp_status))
                                            <div class="col-md-2">
                                                <div class="mb-1">

                                                    <span>MTP Status:</span>
                                                    <span><strong>{{$mdata->mtp_status}}</strong></span>
                                                </div>
                                            </div>
                                            @endif
                                            @if(!empty($mdata->mtp_month_of_pregancy))
                                            <div class="col-md-2">
                                                <div class="mb-1">
                                                    <span>MTP Moth of Pregancy:</span>
                                                    <span><strong>{{$mdata->mtp_month_of_pregancy}}</strong></span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach

                                    </div>
                                    @endif


                                    @if(!empty($patientsObstratics && ($patientsObstratics->abortion_no != null && $patientsObstratics->abortion_no != 0 )))
                                    <div class="col-md-12">
                                        <div class="mb-1 mt-1"><h6>Abortion Data</h6></div>
                                        <?php $i =1;?>
                                        @foreach ($abortionData as $adata)
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="mb-1">
                                                  Abortion {{$i++}} :-

                                                </div>
                                            </div>
                                            @if(!empty($adata->spontancous_abortion_status))
                                            <div class="col-md-2">
                                                <div class="mb-1">

                                                    <span>Spontancous Abortion Status:</span>
                                                    <span><strong>{{$adata->spontancous_abortion_status}}</strong></span>
                                                </div>
                                            </div>
                                            @endif
                                            @if(!empty($adata->spontancous_abortion_month_of_pregancy))
                                            <div class="col-md-2">
                                                <div class="mb-1">
                                                    <span>Spontancous abortion month of pregancy:</span>
                                                    <span><strong>{{$adata->spontancous_abortion_month_of_pregancy}}</strong></span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach

                                    </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            @if(!empty($patientsObstratics->second_marriage_life))
                                            <span>Second marriage life :</span>
                                            <span><strong>{{$patientsObstratics->second_marriage_life}}</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                    @if(!empty($patientsObstratics->second_marriage_life) && $patientsObstratics->second_marriage_life == 'yes')
                                        <div class="col-md-12">
                                            <div class="mb-1">
                                                @if(!empty($patientsObstratics->second_marriage_details))
                                                <span>Second marriage details :</span>
                                                <span><strong>{{$patientsObstratics->second_marriage_details}}</strong></span>
                                                @endif
                                            </div>
                                        </div>
                                        @if(!empty($patientsObstratics) && isset($patientsObstratics->second_marriage) && ($patientsObstratics->second_marriage->child_no != null && $patientsObstratics->second_marriage->child_no != 0))
                                        <div class="col-md-12">
                                            <div class="mb-1 mt-1"><h6>Second marriage Child Data</h6></div>
                                            <?php $i =1;?>
                                            @foreach ($patientsObstratics->second_marriage->child->child_data as $secondChild)
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="mb-1">
                                                    Child {{$i++}} :-
                                                    </div>
                                                </div>
                                                @if(!empty($secondChild->ho_term))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>H/O Term :</span>
                                                        <span><strong>{{$cdata->ho_term}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($secondChild->ho_term_details))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>H/O Term Details:</span>
                                                        <span><strong>{{$secondChild->ho_term_details}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($secondChild->ho_type))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>H/O Type :</span>
                                                        <span><strong>{{$secondChild->ho_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($secondChild->ho_birth_type))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>H/O Birth Type :</span>
                                                        <span><strong>{{$secondChild->ho_birth_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($secondChild->expired_reason))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>Expired reason :</span>
                                                        <span><strong>{{$secondChild->expired_reason}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($secondChild->live_health_year))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>Live health Year :</span>
                                                        <span><strong>{{$secondChild->live_health_year}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif

                                        @if(!empty($patientsObstratics) && isset($patientsObstratics->second_marriage) && ($patientsObstratics->second_marriage->mtp_no != null && $patientsObstratics->second_marriage->mtp_no != 0 ))
                                        <div class="col-md-12">
                                            <div class="mb-1 mt-1"><h6>Second marriage MTP Data</h6></div>
                                            <?php $i =1;?>
                                            @foreach ($sMarriageMtpData as $secondMdata)
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="mb-1">
                                                    MTP {{$i++}} :-
                                                    </div>
                                                </div>
                                                @if(!empty($secondMdata->mtp_status))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>MTP Status:</span>
                                                        <span><strong>{{$secondMdata->mtp_status}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($secondMdata->mtp_month_of_pregancy))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>MTP Moth of Pregancy:</span>
                                                        <span><strong>{{$secondMdata->mtp_month_of_pregancy}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach

                                        </div>
                                        @endif
                                        @if(!empty($patientsObstratics && isset($patientsObstratics->second_marriage) && ($patientsObstratics->second_marriage->abortion_no != null && $patientsObstratics->second_marriage->abortion_no != 0 )))
                                        <div class="col-md-12">
                                            <div class="mb-1 mt-1"><h6>Second marriage Abortion Data</h6></div>
                                            <?php $i =1;?>
                                            @foreach ($sMarriageAbortionData as $secondAdata)
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="mb-1">
                                                    Abortion {{$i++}} :-

                                                    </div>
                                                </div>
                                                @if(!empty($secondAdata->spontancous_abortion_status))
                                                <div class="col-md-2">
                                                    <div class="mb-1">

                                                        <span>Spontancous Abortion Status:</span>
                                                        <span><strong>{{$secondAdata->spontancous_abortion_status}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($adata->spontancous_abortion_month_of_pregancy))
                                                <div class="col-md-2">
                                                    <div class="mb-1">
                                                        <span>Spontancous abortion month of pregancy:</span>
                                                        <span><strong>{{$secondAdata->spontancous_abortion_month_of_pregancy}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach

                                        </div>
                                        @endif
                                    @endif
                                    </div>

                                {{-- </div> --}}

                                <div class="mb-3">
                                    <h5>M/H</h5>
                                </div>

                                <div class="row">
                                    @if(!empty($mh->type_and_year_of_infertility))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Type and year of infertility:</span>
                                            <span><strong>{{$mh->type_and_year_of_infertility}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->age_of_menarchy))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Age of Menarchy:</span>
                                            <span><strong>{{$mh->age_of_menarchy}}</strong></span>
                                        </div>
                                    </div>
                                    @endif

                                    @if(!empty($mh->since_year))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Since year:</span>
                                            <span><strong>{{$mh->since_year}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    @if(!empty($mh->past_mh_1))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Past MH 1:</span>
                                            <span><strong>{{$mh->past_mh_1}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->past_mh_2))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Past MH 2:</span>
                                            <span><strong>{{$mh->past_mh_2}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->past_duration_of_day))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Past duration of the day:</span>
                                            <span><strong>{{$mh->past_duration_of_day}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->past_interval_of_day))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Past interval of the day:</span>
                                            <span><strong>{{$mh->past_interval_of_day}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->past_month))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Past Month:</span>
                                            <span><strong>{{$mh->past_month}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="row">
                                    @if(!empty($mh->present_mh_1))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Present MH 1:</span>
                                            <span><strong>{{$mh->present_mh_1}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->present_mh_2))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Present MH 2:</span>
                                            <span><strong>{{$mh->present_mh_2}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->present_duration_of_day))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Present duration of the day:</span>
                                            <span><strong>{{$mh->present_duration_of_day}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->present_interval_of_day))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Present interval of the day:</span>
                                            <span><strong>{{$mh->present_interval_of_day}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->present_month))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Present Month:</span>
                                            <span><strong>{{$mh->present_month}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row mb-3">
                                    @if(!empty($mh->last_menstrual_date))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Last Menstrual Date:</span>
                                            <span><strong>{{$mh->last_menstrual_date}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->edd))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>EDD:</span>
                                            <span><strong>{{$mh->edd}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->edd_week))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>EDD Week:</span>
                                            <span><strong>{{$mh->edd_week}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->since_month))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Since Month:</span>
                                            <span><strong>{{$mh->since_month}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($mh->since_cycle))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Since Cycle:</span>
                                            <span><strong>{{$mh->since_cycle}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <h5>Patient Details H/O</h5>
                                </div>

                                <div class="row">
                                    @if(!empty($patientsDetails->personal_history_history_type))

                                    <?php
                                    $per_history = "";
                                        if($patientsDetails->personal_history_history_type == 1) {
                                            $per_history = 'NAD';
                                        } else if($patientsDetails->personal_history_history_type == 2) {
                                            $per_history = 'Diabetes Mellitus';
                                        } else if($patientsDetails->personal_history_history_type == 3) {
                                            $per_history = 'Thyroid';
                                        } else if($patientsDetails->personal_history_history_type == 4) {
                                            $per_history = 'Heart Disease';
                                        } else {
                                            $per_history = 'Hypertension';
                                        }
                                    ?>
                                    <div class="col-md-3">
                                        <div class="">
                                            <span>Personal History :</span>
                                            <span><strong>{{$per_history}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($patientsDetails->personal_history_date))
                                    <div class="col-md-3">
                                        <div class="">
                                            <span>Date :</span>
                                            <span><strong>{{$patientsDetails->personal_history_date}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row mb-3">
                                    @if(!empty($patientsDetails->family_history))
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            <span>Family History :</span>
                                            <span><strong>{{$patientsDetails->family_history}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($patientsDetails->past_history_type))
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            <span>Past History :</span>
                                            <span><strong>{{$patientsDetails->past_history_type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <h5>O/E</h5>
                                </div>

                                <div class="row mb-3">
                                    @if(!empty($oe->oe_no))

                                    <?php
                                        $oechildNo = "";
                                        if($oe->oe_no == 1) {
                                            $oechildNo = "Single";
                                        } else if($oe->oe_no == 2) {
                                            $oechildNo = "Twins";
                                        } else if($oe->oe_no == 3) {
                                            $oechildNo = "Triplets";
                                        } else {
                                            $oechildNo = "Quadruple";
                                        }
                                    ?>
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>O/E:</span>
                                            <span><strong>{{$oechildNo}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->oe_child_type))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>O/E Child Status:</span>
                                            <span><strong>{{$oe->oe_child_type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    {{-- @foreach($oe->utdata as $key=>$value)
                                        <div class="row">
                                            @if(!empty($value->ut_type))
                                            <div class="col-md-12">
                                                <span>UT Type:</span>
                                                <span><strong>{{$value->ut_type}}</strong></span>
                                            </div>
                                            @if(!empty($value->ut_type))
                                            <div class="col-md-12">
                                                <span>UT Sac:</span>
                                                <span><strong>{{$value->oe_ut_sac}}</strong></span>
                                            </div>
                                            @if(!empty($value->oe_ut_sac_2))
                                            <div class="col-md-12">
                                                <span>UT Sac 2:</span>
                                                <span><strong>{{$value->oe_ut_sac_2}}</strong></span>
                                            </div>
                                            @if(!empty($value->oe_ut_sac_details))
                                            <div class="col-md-12">
                                                <span>UT Sac Details:</span>
                                                <span><strong>{{$value->oe_ut_sac_details}}</strong></span>
                                            </div>
                                            @if(!empty($value->child_type))
                                            <div class="col-md-12">
                                                <span>Child Type:</span>
                                                <span><strong>{{$value->child_type}}</strong></span>
                                            </div>
                                            @if(!empty($value->crl))
                                            <div class="col-md-12">
                                                <span>CRL:</span>
                                                <span><strong>{{$value->crl}}</strong></span>
                                            </div>
                                            @if(!empty($value->crl_details))
                                            <div class="col-md-12">
                                                <span>CRL Details:</span>
                                                <span><strong>{{$value->crl_details}}</strong></span>
                                            </div>
                                            @if(!empty($value->fcp))
                                            <div class="col-md-12">
                                                <span>FCP:</span>
                                                <span><strong>{{$value->fcp}}</strong></span>
                                            </div>
                                            @if(!empty($value->liquor_type))
                                            <div class="col-md-12">
                                                <span>Liquor Type:</span>
                                                <span><strong>{{$value->liquor_type}}</strong></span>
                                            </div>
                                            @if(!empty($value->position_type))
                                            <div class="col-md-12">
                                                <span>Position Type</span>
                                                <span><strong>{{$value->position_type}}</strong></span>
                                            </div>
                                        </div>
                                    @endforeach --}}

                                    @if(!empty($oe->ec_topic))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>EC Topic:</span>
                                            <span><strong>{{$oe->ec_topic}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->expert_usg))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Expert USG:</span>
                                            <span><strong>{{$oe->expert_usg}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->expert_usg_date))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Expert usg date:</span>
                                            <span><strong>{{$oe->expert_usg_date}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->blood_report))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Blood Report:</span>
                                            <span><strong>{{$oe->blood_report}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->blood_report_date))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Blood report Date:</span>
                                            <span><strong>{{$oe->blood_report_date}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->follow_up))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Follow up:</span>
                                            <span><strong>{{$oe->follow_up}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <h5>Investigation</h5>
                                </div>

                                <div class="row">
                                    @if(!empty($patientsInvestigation->early_scan_type))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Early Scan Report :</span>
                                            <span><strong>{{$patientsInvestigation->early_scan_type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($patientsInvestigation->early_scan_type) && $patientsInvestigation->early_scan_type == 'yes')
                                        @if(!empty($patientsInvestigation->investigation_early_scan_date))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Early Scan Date :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_early_scan_date}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_early_scan_hb))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Early Scan HB :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_early_scan_hb}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_early_scan_hb_details))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Early Scan HB Details:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_early_scan_hb_details}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_tsh))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>TSH :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_tsh}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_tsh_details))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>TSH Details:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_tsh_details}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_rbs))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>RBS:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_rbs}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                    @endif

                                    @if(!empty($patientsInvestigation->investigation_rbs_details))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>RBS Details:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_rbs_details}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @if(!empty($investigationimg->images))
                                    <div class="col-md-12">
                                        <span>Early Sacn Image:</span><br>
                                    @foreach($investigationimg->images as $data)
                                    <?php $s=substr($data, 7);?>
                                        <img src="{{url($s)}}" class="anc-images imgstyle"/>
                                    @endforeach
                                    </div>
                                @endif
                                <div class="row">
                                    @if(!empty($patientsInvestigation->anc_profile_type))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>ANC Profile :</span>
                                            <span><strong>{{$patientsInvestigation->anc_profile_type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif

                                    @if(!empty($patientsInvestigation->anc_profile_type) && $patientsInvestigation->anc_profile_type == 'yes')
                                        @if(!empty($patientsInvestigation->investigation_anc_date))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>ANC Date :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_anc_date}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_cbc_mp->status))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>CBS MP Status:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_cbc_mp->status}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_cbc_mp->aneamia))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>CBS MP Aneamia:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_cbc_mp->aneamia}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_cbc_mp->leacocytosis))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>CBS MP Leacocytosis:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_cbc_mp->leacocytosis}}</strong></span>
                                            </div>
                                        </div>
                                        @endif

                                        @if(!empty($patientsInvestigation->investigation_urine->status))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Urine :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_urine->status}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_urine->type))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Urine Type :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_urine->type}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_urine->puscell))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Urine Puscell :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_urine->puscell}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_urine->urine_albumine))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Urine Albumine :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_urine->urine_albumine}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_blood_group))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Blood Group :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_blood_group}}</strong></span>
                                            </div>
                                        </div>
                                        @endif

                                        @if(!empty($patientsInvestigation->investigation_anc_rbs))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>RBS :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_anc_rbs}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->anc_hiv))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>HIV :</span>
                                                <span><strong>{{$patientsInvestigation->anc_hiv}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->anc_hbsag))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>HBSG :</span>
                                                <span><strong>{{$patientsInvestigation->anc_hbsag}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->anc_vdrl))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>VDRL :</span>
                                                <span><strong>{{$patientsInvestigation->anc_vdrl}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                </div>
                                @if(!empty($ancimage->images))
                                    <div class="col-md-12">
                                        <span>Early Sacn Image:</span><br>
                                    @foreach($ancimage->images as $data)
                                    <?php $s=substr($data, 7);?>
                                        <img src="{{url($s)}}" class="anc-images imgstyle"/>
                                    @endforeach
                                    </div>
                                @endif
                                <div class="row">
                                    @if(!empty($patientsInvestigation->growth_report_type))
                                    <div class="col-md-2">
                                        <div class="mb-1">
                                            <span>Growth Report :</span>
                                            <span><strong>{{$patientsInvestigation->growth_report_type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($patientsInvestigation->growth_report_type) && $patientsInvestigation->growth_report_type == 'yes')
                                        @if(!empty($patientsInvestigation->investigation_growth_date))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Growth Report Date:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_growth_date}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_growth_hb))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>HB:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_growth_hb}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_growth_fbs))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>FBS:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_growth_fbs}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_growth_fbs_details))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>FBS Details:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_growth_fbs_details}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_growth_pp2bs))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>PP2BS:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_growth_pp2bs}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_growth_pp2bs_details))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>PP2BS Details:</span>
                                                <span><strong>{{$patientsInvestigation->investigation_growth_pp2bs_details}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                </div>
                                @if(!empty($grouthimage->images))
                                    <div class="col-md-12">
                                        <span>Early Sacn Image:</span><br>
                                    @foreach($grouthimage->images as $data)
                                            <?php $s=substr($data, 7);?>
                                        <img src="{{url($s)}}" class="anc-images imgstyle" />
                                    @endforeach
                                    </div>
                                @endif
                                <div class="row mb-3">
                                    @if(!empty($patientsInvestigation->other_report_type) && $patientsInvestigation->other_report_type == 'yes')
                                        @if(!empty($patientsInvestigation->other_report_type))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Other Report :</span>
                                                <span><strong>{{$patientsInvestigation->other_report_type}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->d_m_date))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Double Marker Date :</span>
                                                <span><strong>{{$patientsInvestigation->d_m_date}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->amniocentesis_date))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Amniocentesis Date :</span>
                                                <span><strong>{{$patientsInvestigation->amniocentesis_date}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($patientsInvestigation->investigation_extra))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Extra :</span>
                                                <span><strong>{{$patientsInvestigation->investigation_extra}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                </div>
                                @if(!empty($otherdataimg->images))
                                    <div class="col-md-12">
                                        <span>Early Sacn Image:</span><br>
                                    @foreach($otherdataimg->images as $data)
                                    <?php $s=substr($data, 7);?>
                                        <img src="{{url($s)}}" class="anc-images imgstyle"/>
                                    @endforeach
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <h5>Injection</h5>
                                </div>
                                <div class="row mb-3">
                                    @if(!empty($patientsInjection->tt1))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>TT1 :</span>
                                            <span><strong>{{$patientsInjection->tt1}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($patientsInjection->tt2))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>TT2 :</span>
                                            <span><strong>{{$patientsInjection->tt2}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($patientsInjection->betnasol_1))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Betnasol 1 :</span>
                                            <span><strong>{{$patientsInjection->betnasol_1}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($patientsInjection->betnasol_2))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Betnasol 2 :</span>
                                            <span><strong>{{$patientsInjection->betnasol_2}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <h5>USG</h5>
                                </div>

                                <div class="row mb-3">
                                    @if(!empty($usg->early_scan))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Early Scan :</span>
                                            <span><strong>{{$usg->early_scan}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($usg->nt_scan))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>N.T Scan :</span>
                                            <span><strong>{{$usg->nt_scan}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($usg->anomalies_miles))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Anomalies Miles :</span>
                                            <span><strong>{{$usg->anomalies_miles}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($usg->growth_scan))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Growth Scan :</span>
                                            <span><strong>{{$usg->growth_scan}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @if(!empty($usg->images))
                                    <div class="col-md-12">
                                        <span>Early Sacn Image:</span><br>
                                    @foreach($usg->images as $data)
                                    <?php $s=substr($data, 7);?>
                                        <img src="{{url($s)}}" class="anc-images imgstyle"/>
                                    @endforeach
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <h5>Treatment</h5>
                                </div>
                                <div class="mb-3">
                                @if(!empty($treatment))
                                    @foreach($treatment as $row)
                                    <div class="row">
                                        @if(!empty($row->medicine))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Medicine :</span>
                                                <span><strong>{{$row->medicine}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->medicine_status))
                                        <?php
                                            if($row->medicine_status == 1) {
                                                $mStatus = "જમ્યા પછી";
                                            } else if($row->medicine_status == 2) {
                                                $mStatus = "જમ્યા પહેલાં";
                                            } else {
                                                $mStatus = "માસિકની જગ્યાએ મુકવી";
                                            }
                                        ?>
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Medicine status:</span>
                                                <span><strong>{{$mStatus}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->dose))
                                        <?php
                                            if($row->dose == 1) {
                                                $mDose = "OD";
                                            } else if($row->dose == 2) {
                                                $mDose = "BD";
                                            } else if($row->dose == 3) {
                                                $mDose = "TDS";
                                            } else {
                                                $mDose = "ADS";
                                            }
                                        ?>
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Medicine Dose:</span>
                                                <span><strong>{{$mDose}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->no))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Days:</span>
                                                <span><strong>{{$row->no}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->quantity))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Quantity:</span>
                                                <span><strong>{{$row->quantity}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->medicine_time))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Medicine Time:</span>
                                                <span><strong>{{$row->medicine_time}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->no))
                                        <div class="col-md-2">
                                            <div class="mb-1">
                                                <span>Days:</span>
                                                <span><strong>{{$row->no}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        @yield('modal')
        @stack('before-scripts')
        <script src="{{ url('assets/bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ url('assets/bundles/vendorscripts.bundle.js') }}"></script>
        <script src="{{ url('assets/bundles/mainscripts.bundle.js') }}"></script>
        <script src="{{url('assets/js/raphael-min.js')}}"></script>
        <script src="{{url('assets/js/morris.min.js')}}"></script>
        <script src="{{url('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script src="{{url('assets/plugins/momentjs/moment.js')}}"></script>
        <script src="{{url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
        <script src="{{url('assets/js/theme.js')}}"></script>
        @stack('after-scripts')
        @if (trim($__env->yieldContent('page-script')))
            @yield('page-script')
		@endif
    </body>
</html>
