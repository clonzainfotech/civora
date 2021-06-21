@extends('layouts.main')
@section('parentPageTitle', 'Indoor')
@section('title', 'Edit Indoor')

@section('page-style')

@stop

@section('content')

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Update Rooms</strong></h2>

                    <ul class="header-dropdown">
                        <li>
                            <a href="{{URL::to('indoorsetting')}}">
                                <button class="btn btn-primary">
                                    Back
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    {{Form::open([
                        'class' => 'update-indoor-settings',
                        'id' => 'update-indoor-settings'
                    ])}}
                        {{ Form::hidden('room_type_id', encrypt($indoorRooms->id), [
                            'id' => 'room_type_id'
                        ]) }}
                        {{ Form::hidden('total_room', count($roomWiseBeds), [
                            'id' => 'total_room'
                        ]) }}
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Type : &nbsp;</span>
                                    {{Form::text('room_type', $indoorRooms->name,[
                                        'class'=>'form-control',
                                        'placeholder'=>'Enter Type of Room',
                                        'required',
                                        'maxlength' => 255,
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('roomtype')}}
                                </span>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Total Rooms : &nbsp;</span>
                                    {{Form::text('total_rooms', count($roomWiseBeds),[
                                        'class'=>'form-control total-rooms',
                                        'placeholder'=>'Add Total Room',
                                        'required',
                                        'maxlength' => 2,
                                        'oninput' => 'checkNumberOfRoom(this.value)'
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('room')}}
                                </span>
                            </div>
                        </div>
                        @for ($i = 1; $i <= count($roomWiseBeds); $i++)
                            <div class="row clearfix">
                                <div class="col-md-2 unik-lbl-spn ">
                                    Room No. {{ $roomWiseBeds[($i - 1)]->id }}
                                </div>
                                <div class="col-md-2">
                                    @php
                                        $statusShow = true;
                                        for ($j = 1; $j <= count($roomWiseBeds[($i - 1)]->Beds); $j++) {
                                            if ($roomWiseBeds[($i - 1)]->Beds[($j - 1)]->flag == 1) {
                                                $statusShow = false;
                                                break;
                                            }
                                        }
                                    @endphp
                                    @if ($statusShow == true)
                                        <div class="checkbox">
                                            {!! Form::checkbox('room_status', null, ($roomWiseBeds[($i - 1)]->status == 1) ? true : false, [
                                                'class' => 'room-status',
                                                'id' => $roomWiseBeds[($i - 1)]->id
                                            ]) !!}
                                            <label for="{{ $roomWiseBeds[($i - 1)]->id }}" class="unik-lbl-spn">
                                                Status
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endfor
                        <div class="room-data"></div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Room Charge : &nbsp;</span>
                                    {{Form::number('price', $indoorRooms->price, [
                                        'class'=>'form-control price',
                                        'placeholder'=>'Enter Price',
                                        'required'
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('price')}}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Nursing Charge : &nbsp;</span>
                                    {{Form::number('nursing_charge',  $indoorRooms->nursing_charge, [
                                        'class'=>'form-control nursing_charge',
                                        'placeholder'=>'Enter Nursing Charge',
                                        'required'
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('nursing_charge')}}
                                </span>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon unik-lbl-spn">Dr. Visit Charge : &nbsp;</span>
                                    {{Form::number('dr_visit_charge',  $indoorRooms->dr_visit_charge, [
                                        'class'=>'form-control dr_visit_charge',
                                        'placeholder'=>'Enter Dr. Visit Charge',
                                        'required'
                                    ])}}
                                </div>
                                <span class="form-error-msg">
                                    {{$errors->first('dr_visit_charge')}}
                                </span>
                            </div>
                        </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                            <a href="{{URL::to('indoorsetting')}}" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>

@stop

@section('page-script')
<script>
    var roomNo = 0;
    var totalRoom = $('#total_room').val()
    $(document).ready(function () {
        $(document).on('blur', '.total-rooms', function () {
            printRooms($(this).val());
        });

        $('#update-indoor-settings').submit(function(event) {
            event.preventDefault();
            var roomStatusOff = [];
            var roomStatusOn = [];
            $('.room-status:checkbox:not(:checked)').each(function () {
                roomStatusOff.push($(this).attr('id'));
            });

            $('.room-status:checkbox:checked').each(function () {
                roomStatusOn.push($(this).attr('id'));
            });

            var formData = $('#update-indoor-settings').serialize();
            formData = formData + '&room_status_off=' + roomStatusOff + '&room_status_on=' + roomStatusOn;
            $.ajax({
                url: "{{URL::to('update-indoor-settings')}}",
                dataType: 'JSON',
                type: 'POST',
                data: formData
            }).done(function(data) {

                window.location.href = "{{URL::to('indoorsetting')}}"
            }).fail(function(error) {
            });
        });
    })


    function printRooms(roomNo) {

        if (parseInt(totalRoom) > parseInt(roomNo)) {
            $('.total-rooms').val(totalRoom);
            return false;
        }
        $('.room-data').empty();
        var roomNoData = '';
        var j = 1;

        for (i = (parseInt(totalRoom) + 1); i <= roomNo; i++) {
            roomNoData +=
                "<div class='row clearfix'>" +
                    "<div class='col-md-2 label-padding-edit-indoor'>" +
                        "<label for='room[" + i + "][id]' class='unik-lbl-spn'> New Room " + j + "</label>" +
                    "</div>" +
                    "<div class='col-md-4'>" +
                        "<input type='hidden' name='room[" + i + "][id]'>" +
                        "<input type='number' name='room[" + i + "][bed]' data-id='" + i + " onwheel='this.blur()' min=0 class='form-control bed-number check-number-" + i + "' placeholder='Enter Total Bed' maxlength='3' required >" +
                    "</div>" +
                "</div>"
            ;
            j++;
        }
        $('.room-data').append(roomNoData);
    }

    function validNumber(value) {
        if (/[a-zA-Z!@#$&()\\`.+,/\"%\-*{}[|:;'<>~?^_=\] ]/.test(value)) {
            return value.substring(0, (value.length - 1));
        } else {
            return value;
        }
    }

    function checkNumberOfRoom(value) {
        $('.total-rooms').val(validNumber(value));
    }
</script>
@stop
