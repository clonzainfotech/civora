@extends('layouts.main')
@section('parentPageTitle', 'Gynec Appointment History')
@section('title', 'Gynec Appointment History')
@section('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css" integrity="sha256-ibvTNlNAB4VMqE5uFlnBME6hlparj5sEr1ovZ3B/bNA=" crossorigin="anonymous" />
    <link href="{{URL::to('public/css/image-uploader.css')}}" rel="stylesheet">
@stop

@section('content')
    <div class="row clearfix">
        <div class="col-md-12 p-0">
            <div class="card patients-list">
                <div class="header">
                    <h2><strong class="text-secondary">{{ucwords($patient->name)}}</strong></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix anc">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Gynec Appointment</strong>
                     {{-- <small>Description text here...</small> --}}
                    </h2>
                    <ul class="header-dropdown col-md-3">
                        <li class="w-100">
                            {{Form::select("date",$date,'',[
                                'class'=>'form-control select-padding-0 gynec-date',
                                'required',
                                'placeholder'=>'Select Date'
                            ])}}
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="col-md-12 col-lg-12">

                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                            {{Form::open(['class'=>'form','files'=>true,'id'=>'gynec-form'])}}
                                <div class="gynec-history">

                                </div>
                                {{Form::hidden('patients_id',$patientsId,['class'=>'patients-id'])}}
                                <div class="col-sm-12">
                                    {{Form::submit('submit',['class'=>'btn btn-primary submit'])}}
                                    {{-- <a class="btn btn-primary next-appointment text-white">Save & Next Appointment</a> --}}
                                    <button type="submit" class="btn btn-primary submit" value="1">Save & Preivew</button>
                                    <a href="{{URL::to('anc-iui-ivf')}}" class="btn btn-default">Cancel</a>
                                </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
<script src="{{asset('public/js/gynec.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>    $.fn.selectpicker.Constructor.DEFAULTS.iconBase = 'zmdi';
$.fn.selectpicker.Constructor.DEFAULTS.tickIcon = 'zmdi-check';</script>
<script src="{{URL::to('public/js/image-uploader.js')}}"></script>

<script type="text/javascript">
    var code = '';
    var patientsId = $('.patients-id').val();
    var date = '';
    var qstring = '';
    $(document).ready(function(){
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
        qstring = 'date='+date;
        getGynecData(qstring);
        $(document).on('click','.submit',function(e){
            e.preventDefault();
            var formData = new FormData($("#gynec-form")[0]);
            if(this.value==1){
                formData.append('is_print', 1);
            }
            gynecFormData(formData);
        });

        $(document).on('change','select.gynec-date',function(e){
            date = $(this).val();
            qstring = 'date='+date;
            getGynecData(qstring);
        });

        $(document).on('change','select.duration-data',function(){
            var value = $(this).val();
            var dId = $(this).data('id');
            $('.'+dId).addClass('d-none');
            if(value == 'other'){
                $('.'+dId).removeClass('d-none');
            }
        });
    });

    function gynecFormData(data,next=null){
        // var isError = errorMessage();
        // if (isError == false) {
        //     return false;
        // }
        $('.seen-by-error').text('');
        if($('select.seen-by').val() == ''){
            $('.seen-by-error').text('Please select doctor');
            $('html, body').animate({
                scrollTop: ($('.seen-by').offset().top - 150)
            }, 1000);
            return false;
        }
        var url = "{{URL::to('anc-iui-ivf')}}";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{URL::to("gynec")}}',
            type:'POST',
            dataType:'json',
            data:data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
        }).done(function(data){
            if(data.status == 'true'){
                window.location.href = url;
            }else if(data.status == 1){
                $('.gynecId').val(data.id);
                w = window.open(window.location.href, "_blank");
                w.document.open();
                w.document.write(data.data);
                w.document.close();
                w.window.print();
                // window.location.href = url;
                $('#next-appointment-modal').modal('hide');
            }else{
                location.reload();
            }
        });
    }
    function errorMessage() {
        var valid = 1;
        if ($("input[name='ho[follow_up]']").val() == '') {
            $('.gsac-no-data-followup').text('The Follow up Date is required.');
            $('html, body').animate({
                scrollTop: ($('.gsac-no-data-followup').offset().top - 150)
            }, 200);
            return false;
        }
        if(valid == 0){
            $('html, body').animate({
                scrollTop: ($('.weight').offset().top - 150)
            }, 1000);
            return false;
        }
        return true;
    }
    function getGynecData(qstring){
        $.ajax({
            url:"{{URL::to('gynec/history')}}"+'/'+$('.patients-id').val()+'?'+qstring,
            dataType:'json',
            type:'GET',
        }).done(function(data){
            $('.gynec-history').html(data.editGynec);
            $('.ho-value .selectized').addClass('d-none');
            $(function () {
                //Datetimepicker plugin
                $('.datetimepicker').bootstrapMaterialDatePicker({
                    format: 'dddd DD MMMM YYYY',
                    clearButton: true,
                    // minDate:new Date(),
                    time:false,
                    weekStart: 1
                });
                $('.lmd-date').bootstrapMaterialDatePicker({
                    format: 'dddd DD MMMM YYYY',
                    clearButton: true,
                    time:false,
                    weekStart: 1
                });

                $('.timepicker').bootstrapMaterialDatePicker({
                    date: false,
                    shortTime: true,
                    format: 'hh:mm a',
                    switchOnClick: true
                });

                $('.co_value_data').selectize({
                    delimiter: ',',
                    persist: false,
                    create: function(input) {
                        return {
                            value: input,
                            text: input
                        }
                    }
                });
                if(typeof data.reportImagesData != 'undefined'){
                    $('.report-images').imageUploader({
                        preloaded: jQuery.parseJSON(data.reportImagesData),
                        imagesInputName: 'investigation[report][images]',
                        preloadedInputName: 'report_old'
                    });
                }else{
                    $('.report-images').imageUploader({
                        imagesInputName: 'investigation[report][images]',
                    });
                }
                if(typeof data.ancImagesData != 'undefined'){
                    $('.anc-images-data').imageUploader({
                        preloaded: jQuery.parseJSON(data.ancImagesData),
                        imagesInputName: 'investigation[anc][images]',
                        preloadedInputName: 'anc_old'
                    });
                }else{
                    $('.anc-images-data').imageUploader({
                        imagesInputName: 'investigation[anc][images]',
                    });
                }
                $('#treatment-medicine').select2();
                $('.duration-value .selectized').addClass('d-none');
                $('#personal-history .selectized').addClass('d-none');
            });

            $('.select-padding-0').selectpicker('refresh');
            regularType($('select.past-mh-2').val(),'past-ir-regular-data');
            regularType($('select.present-mh-2').val(),'present-ir-regular-data');
            
        }).fail(function(error){

        });
    }
    var medicinesValue = @json($medicines);
</script>
@stop
