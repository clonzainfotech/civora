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
    @php
    $co=$data['co'];
    $ho=$data['ho'];
    $oe=$data['oe'];
    if(!empty($oe->utdata)){
    $ut=$oe->utdata;
    }
    $patientsInvestigation = $data['patientsInvestigation'];
    $patientsInjection=$data['patientsInjection'];
    $usg = $data['usg'];
    $treatment = $data['treatment'];
    $patientsDetails = $data['patientsDetails'];
    $patientsInjection = $data['patientsInjection'];
    $ancImagesValue= $data['ancImagesValue'];
    $earlyScanImagesValue=$data['earlyScanImagesValue'];
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
    @endphp
     <body class="theme-cyan">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{url(config('app.loader'))}}" width="48" height="48" alt="Oreo"></div>
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
                                <h2><strong>ANC HISTORY</strong></h2>
                            </div>
            
                            <div class="body">
                               <div class="mb-3">
                                    <h5>H/O</h5>
                                </div>
                                <div class="row mb-3">
                                     @if(!empty($ho->ho_details))
                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <span>HO Details :</span>
                                                <span><strong>{{$ho->ho_details}}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($ho->le->bp))
                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <span>BP :</span>
                                                <span><strong>{{$ho->le->bp}}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($ho->le->temp))
                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <span>Temp :</span>
                                                <span><strong>{{$ho->le->temp}}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($ho->le->pulse))
                                        <div class="col-md-3">
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
                                     @if(!empty($co->since))
                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <span>Since:</span>
                                                <span><strong>{{$co->since}}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($co->co_type))
                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <span>CO Type:</span>
                                                @foreach($co->co_type as $data)
                                                <span><strong>{{$data}},</strong></span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <h5>O/E</h5>
                                </div>
                                <div class="row mb-3">
                                    @if(!empty($oe->oe_no))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>OE NO:</span>
                                            <span><strong>{{$oe->oe_no}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->oe_child_type))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>OE Child Type:</span>
                                            <span><strong>{{$oe->oe_child_type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($ut))
                                        @foreach($ut as $data)
                                            @if($data->ut_type == 'ut')
                                                @if(!empty($data->ut_type))
                                                    <div class="col-md-3">
                                                        <div class="mb-1">
                                                            <span>UT Type:</span>
                                                            <span><strong>{{$data->ut_type}}</strong></span>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac:</span>
                                                        <span><strong>{{$data->oe_ut_sac}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac_2))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac 2:</span>
                                                        <span><strong>{{$data->oe_ut_sac_2}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac_details))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac DEtails:</span>
                                                        <span><strong>{{$data->oe_ut_sac_details}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->child_type))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Child Type:</span>
                                                        <span><strong>{{$data->child_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->crl))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>CRL:</span>
                                                        <span><strong>{{$data->crl}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->crl_details))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>CRL Details:</span>
                                                        <span><strong>{{$data->crl_details}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->fcp))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>FCP:</span>
                                                        <span><strong>{{$data->fcp}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->liquor_type))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Liquor:</span>
                                                        <span><strong>{{$data->liquor_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->position_type))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Position Type:</span>
                                                        <span><strong>{{$data->position_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->placenta))
                                                @if (isset($data->placenta) && !empty($data->placenta))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Position Type:</span>
                                                        @php
                                                $placentaKeys = array_keys($placenta);
                                            @endphp
                                            
                                            @foreach ($data->placenta as $placentaData)
                                                @if (in_array($placentaData, $placentaKeys))
                                                    @php
                                                        echo $placenta[$placentaData].'<br/>';
                                                    @endphp
                                                @endif
                                            @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                                @if(!empty($data->color_dropler))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Color Dropler:</span>
                                                        <span><strong>{{$data->color_dropler}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                            @endif
                                            <br>
                                            @if($data->ut_type == 'g-sac')
                                                @if(!empty($data->ut_type))
                                                    <div class="col-md-3">
                                                        <div class="mb-1">
                                                            <span>UT Type:</span>
                                                            <span><strong>{{$data->ut_type}}</strong></span>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac:</span>
                                                        <span><strong>{{$data->oe_ut_sac}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac_2))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac 2:</span>
                                                        <span><strong>{{$data->oe_ut_sac_2}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac_details))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac DEtails:</span>
                                                        <span><strong>{{$data->oe_ut_sac_details}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->child_type))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Child Type:</span>
                                                        <span><strong>{{$data->child_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->crl))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>CRL:</span>
                                                        <span><strong>{{$data->crl}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->crl_details))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>CRL Details:</span>
                                                        <span><strong>{{$data->crl_details}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->fcp))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>FCP:</span>
                                                        <span><strong>{{$data->fcp}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->liquor_type))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Liquor:</span>
                                                        <span><strong>{{$data->liquor_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->position_type))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Position Type:</span>
                                                        <span><strong>{{$data->position_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->placenta))
                                                @if (isset($data->placenta) && !empty($data->placenta))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Position Type:</span>
                                                        @php
                                                $placentaKeys = array_keys($placenta);
                                            @endphp
                                            
                                            @foreach ($data->placenta as $placentaData)
                                                @if (in_array($placentaData, $placentaKeys))
                                                    @php
                                                        echo $placenta[$placentaData].'<br/>';
                                                    @endphp
                                                @endif
                                            @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                                @if(!empty($data->color_dropler))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Color Dropler:</span>
                                                        <span><strong>{{$data->color_dropler}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    <div class="row mb-3 ml-1">
                                        @foreach($ut as $data)
                                         @if($data->ut_type == 'g-sac')
                                                @if(!empty($data->ut_type))
                                                    <div class="col-md-3">
                                                        <div class="mb-1">
                                                            <span>UT Type:</span>
                                                            <span><strong>{{$data->ut_type}}</strong></span>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac:</span>
                                                        <span><strong>{{$data->oe_ut_sac}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac_2))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac 2:</span>
                                                        <span><strong>{{$data->oe_ut_sac_2}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->oe_ut_sac_details))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>UT Sac DEtails:</span>
                                                        <span><strong>{{$data->oe_ut_sac_details}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->child_type))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Child Type:</span>
                                                        <span><strong>{{$data->child_type}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->crl))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>CRL:</span>
                                                        <span><strong>{{$data->crl}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->crl_details))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>CRL Details:</span>
                                                        <span><strong>{{$data->crl_details}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->yalk_sac))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>YLK:</span>
                                                        <span><strong>{{$data->yalk_sac}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->fefal_pole))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Fefal:</span>
                                                        <span><strong>{{$data->fefal_pole}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($data->placenta))
                                                @if (isset($data->placenta) && !empty($data->placenta))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Position Type:</span>
                                                        @php
                                                $placentaKeys = array_keys($placenta);
                                            @endphp
                                            
                                            @foreach ($data->placenta as $placentaData)
                                                @if (in_array($placentaData, $placentaKeys))
                                                    @php
                                                        echo $placenta[$placentaData].'<br/>';
                                                    @endphp
                                                @endif
                                            @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                                @if(!empty($data->color_dropler))
                                                <div class="col-md-3">
                                                    <div class="mb-1">
                                                        <span>Color Dropler:</span>
                                                        <span><strong>{{$data->color_dropler}}</strong></span>
                                                    </div>
                                                </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    @if(!empty($oe->ec_topic))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>EC Toipic:</span>
                                            <span><strong>{{$oe->ec_topic}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->expert_usg))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Expert USG:</span>
                                            <span><strong>{{$oe->expert_usg}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->expert_usg_date))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Expert Date:</span>
                                            <span><strong>{{$oe->expert_usg_date}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->blood_report))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Blood Report:</span>
                                            <span><strong>{{$oe->blood_report}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->blood_report_date))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Blood Report Date:</span>
                                            <span><strong>{{$oe->blood_report_date}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->treact->type))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Blood Report Date:</span>
                                            <span><strong>{{$oe->treact->type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->treact->medicine_details))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Medicine Details:</span>
                                            <span><strong>{{$oe->treact->medicine_details}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->treact->medicine_dose))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Medicine Dose:</span>
                                            <span><strong>{{$oe->treact->medicine_dose}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->treact->surgical_details))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Surgical Details:</span>
                                            <span><strong>{{$oe->treact->surgical_details}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->fefal_reduction->type))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>FEFAL Type:</span>
                                            <span><strong>{{$oe->fefal_reduction->type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->fefal_reduction->date))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>FEFAL Date:</span>
                                            <span><strong>{{$oe->fefal_reduction->date}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->p_s->type))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>PS Type:</span>
                                            <span><strong>{{$oe->p_s->type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->p_s->details))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>PS Details:</span>
                                            <span><strong>{{$oe->p_s->details}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->p_v->type))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>PV Type:</span>
                                            <span><strong>{{$oe->p_v->type}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->p_v->details))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>PV Details:</span>
                                            <span><strong>{{$oe->p_v->details}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->remark))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Remark:</span>
                                            <span><strong>{{$oe->remark}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!empty($oe->follow_up))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Follow Up:</span>
                                            <span><strong>{{$oe->follow_up}}</strong></span>
                                        </div>
                                    </div>
                                    @endif 
                                    @if(!empty($oe->follow_up_date_diff))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Follow Up Diff:</span>
                                            <span><strong>{{$oe->follow_up_date_diff}}</strong></span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="mb-3">
                                    <h5>Investigation</h5>
                                </div>
                                <div class="mb-3">
                                    <h6>Early Scan Report:</h6>
                                </div>
                                <div class="row mb-3">
                                @if(!empty($patientsInvestigation->early_scan_type))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Early Sacn Type:</span>
                                            <span><strong>{{$patientsInvestigation->early_scan_type}}</strong></span>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($patientsInvestigation->investigation_early_scan_date))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Early Sacn Date:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_early_scan_date}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_early_scan_hb))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Scan HB:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_early_scan_hb}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_early_scan_hb_details))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Scan HB:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_early_scan_hb_details}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_tsh))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>TSH:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_tsh}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_tsh_details))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>TSH Details:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_tsh_details}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_rbs))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>RBS:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_rbs}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_rbs_details))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>RBS Details:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_rbs_details}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($investigationimg->images))
                                    <div class="col-md-12">
                                        <span>Early Sacn Image:</span><br>
                                    @foreach($investigationimg->images as $data)
                                        <img src="{{url($data)}}" class="anc-images imgstyle"/>
                                    @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                    <h6>ANC Profile:</h6>
                            </div>
                            <div class="row mb-3">
                                @if(!empty($patientsInvestigation->anc_profile_type))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>ANC Profile Type:</span>
                                            <span><strong>{{$patientsInvestigation->anc_profile_type}}</strong></span>
                                        </div>
                                    </div>
                                @endif


                                @if(!empty($patientsInvestigation->investigation_anc_date))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>ANC Date:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_anc_date}}</strong></span>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($patientsInvestigation->investigation_cbc_mp->status) && $patientsInvestigation->investigation_cbc_mp->status == 1)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>OBP MP :</span>
                                            <span><strong>WNL</strong></span>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($patientsInvestigation->investigation_cbc_mp->status) && $patientsInvestigation->investigation_cbc_mp->status == 2)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>OBP MP :</span>
                                            <span><strong>Abnormal</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_cbc_mp->aneamia) && $patientsInvestigation->investigation_cbc_mp->status == 2)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Aneamia :</span>
                                            <span><strong>{{$patientsInvestigation->investigation_cbc_mp->aneamia}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_cbc_mp->leacocytosis) && $patientsInvestigation->investigation_cbc_mp->status == 2)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Leacocytosis :</span>
                                            <span><strong>{{$patientsInvestigation->investigation_cbc_mp->leacocytosis}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                
                                @if(!empty($patientsInvestigation->investigation_urine->status) && $patientsInvestigation->investigation_urine->status == 1)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>URINE:</span>
                                            <span><strong>WNL</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_urine->status) && $patientsInvestigation->investigation_urine->status == 2)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>URINE:</span>
                                            <span><strong>Abnormal</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_urine->type) && $patientsInvestigation->investigation_urine->status == 2)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>URINE Type:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_urine->type}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_urine->puscell) && $patientsInvestigation->investigation_urine->status == 2)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Puscell:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_urine->puscell}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_urine->urine_albumine) && $patientsInvestigation->investigation_urine->status == 2)
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>URINE Albumine:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_urine->urine_albumine}}</strong></span>
                                        </div>
                                    </div>
                                @endif


                                @if(!empty($patientsInvestigation->investigation_blood_group))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Blood Group:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_blood_group}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_anc_rbs))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>ANC RBS:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_anc_rbs}}</strong></span>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($patientsInvestigation->anc_hiv))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>ANC HIV:</span>
                                            <span><strong>{{$patientsInvestigation->anc_hiv}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->anc_hbsag))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>ANC HBSAG:</span>
                                            <span><strong>{{$patientsInvestigation->anc_hbsag}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->anc_vdrl))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>ANC VDRL:</span>
                                            <span><strong>{{$patientsInvestigation->anc_vdrl}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($ancimage->images))
                                    <div class="col-md-12">
                                        <span>ANC Image:</span><br>
                                    @foreach($ancimage->images as $data)
                                        <img src="{{url($data)}}" class="anc-images imgstyle"/>
                                    @endforeach
                                    </div>
                                @endif
                            </div>
                            
                            <div class="mb-3">
                                <h6>Grouth Report:</h6>
                            </div>
                            <div class="row mb-3">
                                @if(!empty($patientsInvestigation->growth_report_type))
                                    <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Grouth Report:</span>
                                            <span><strong>{{$patientsInvestigation->growth_report_type}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_growth_date))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Grouth Date:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_growth_date}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_growth_hb))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Grouth HB:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_growth_hb}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_growth_fbs))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Grouth FBS:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_growth_fbs}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_growth_fbs_details))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Grouth FBS Details:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_growth_fbs_details}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_growth_pp2bs))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Grouth PP2BS:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_growth_pp2bs}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_growth_pp2bs_details))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Grouth PP2BS Details:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_growth_pp2bs_details}}</strong></span>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($grouthimage->images))
                                    <div class="col-md-12">
                                        <span>Grouth Image:</span><br>
                                    @foreach($grouthimage->images as $data)
                                        <img src="{{url($data)}}" class="anc-images imgstyle"/>
                                    @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <h6>Other Report:</h6>
                            </div>
                            @php
                            $otherReport = !empty($patientsInvestigation->other_report) ? $patientsInvestigation->other_report : [];
                            @endphp

                            <div class="row mb-3">
                                @if(!empty($patientsInvestigation->other_report_type))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Other REport Type:</span>
                                            <span><strong>{{ !empty($patientsInvestigation->other_report_type) && $patientsInvestigation->other_report_type == 'yes' ? 'Yes' : 'No' }}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->other_report_type))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Double Marker:</span>
                                            <span><strong>@if (in_array('double_marker',$otherReport)) Yes @else No @endif</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->d_m_date))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Double Marker Date:</span>
                                            <span><strong>{{$patientsInvestigation->d_m_date}}</strong></span>
                                        </div>
                                    </div>
                                @endif

                                @if(!empty($patientsInvestigation->other_report_type))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Genetic Test:</span>
                                            <span><strong>@if (in_array('genetic_test', $otherReport)) Yes @else No @endif</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->other_report_type))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Amniocentesis:</span>
                                            <span><strong>@if (in_array('amniocentesis', $otherReport)) Yes @else No @endif</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->amniocentesis_date))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Amniocentesis:</span>
                                            <span><strong>{{$patientsInvestigation->amniocentesis_date}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($patientsInvestigation->investigation_extra))
                                     <div class="col-md-3">
                                        <div class="mb-1">
                                            <span>Extra:</span>
                                            <span><strong>{{$patientsInvestigation->investigation_extra}}</strong></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if(!empty($otherdataimg->images))
                                    <div class="col-md-12">
                                        <span>Early Sacn Image:</span><br>
                                    @foreach($otherdataimg->images as $data)
                                        <img src="{{url($data)}}" class="anc-images imgstyle"/>
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
                                        <div class="col-md-3">
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
                                        <div class="col-md-3">
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
                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <span>Medicine Dose:</span>
                                                <span><strong>{{$mDose}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->no))
                                        <div class="col-md-3">
                                            <div class="mb-">
                                                <span>Days:</span>
                                                <span><strong>{{$row->no}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->quantity))
                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <span>Quantity:</span>
                                                <span><strong>{{$row->quantity}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->medicine_time))
                                        <div class="col-md-3">
                                            <div class="mb-1">
                                                <span>Medicine Time:</span>
                                                <span><strong>{{$row->medicine_time}}</strong></span>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($row->no))
                                        <div class="col-md-3">
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
                             @if(!empty($patientsInjection))
                                <div class="mb-3">
                                    <h5>Injection </h5>
                                </div>
                                @endif
                                
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
                                        <div class="col-md-12">
                                            <div class="mb-1">
                                                <span>Early Scan :</span>
                                                <span><strong>{{$usg->early_scan}}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($usg->nt_scan))
                                        <div class="col-md-12">
                                            <div class="mb-1">
                                                <span>N.T Scan :</span>
                                                <span><strong>{{$usg->nt_scan}}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($usg->anomalies_miles))
                                        <div class="col-md-12">
                                            <div class="mb-1">
                                                <span>Anomalies Miles :</span>
                                                <span><strong>{{$usg->anomalies_miles}}</strong></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($usg->growth_scan))
                                        <div class="col-md-12">
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
                                            <img src="{{url($data)}}" class="anc-images imgstyle"/>
                                        @endforeach
                                    </div>
                                @endif
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
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
