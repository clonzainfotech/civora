@extends('layouts.main')
@section('parentPageTitle', 'Event')
@section('title', 'Event')

@section('page-style')
@stop

@section('content')
    <div class="row clearfix event">
        <div class="card">
            <div class="header">
                <h2><strong>Events</strong></h2>
                <ul class="header-dropdown">
                    <li>
                        <a href="{{URL::to('event/create')}}">
                            <button class="btn btn-primary">
                                Add
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
            @if(Session::has('msg'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{Session::get('msg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close"></i>
                        </span>
                    </button>
                </div>
            @endif
        </div>
        <div class="col-md-12 event-data  active"></div>
    </div>
    <div class="eventShow">
        <div class="overlay"></div>
        <div class="img-show">
            <span class="text-danger">X</span>
            <img src="">
        </div>
    </div>
@stop
@section('modal')
    <div class="modal"  id="EventModal">
        <div class="modal-dialog modal-lg" role="document" style="width:1250px;">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModal">Display Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <img src="">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-script')
    <script type="text/javascript">
        var qstring = '';
        var page = '';

        $(document).ready(function(){

            $(document).on('click','.popup img',function(){
                var $src = $(this).attr("src");
                $("#EventModal").fadeIn();
                $(".modal-body img").attr("src", $src);
            });
            $(document).on('click',"#EventModal .close, #EventModal #close" ,function () {
                $("#EventModal").fadeOut();
            });

            getUserData(qstring);

            $(document).on('click', '.pagination a',function(event){
                event.preventDefault();
                page=$(this).attr('href').split('page=')[1];
                qstring = 'page='+page;
                getUserData(qstring);
            });

            $(document).on('click','.delete-event',function(){
                eventId = $(this).data('id');
                showConfirmMessage();
            });
            $(document).on('click','.eventImage',function(){
                var $src = $(this).attr("src");

                $(".eventShow").fadeIn();
                $(".img-show img").attr("src", $src);
            });

            $("span, .overlay").click(function () {
                $(".eventShow").fadeOut();
            });

        });

        $(document).on('dblclick', '.editEvent', function(event) {
            var eventId = $(this).data('id');
            if(typeof(eventId) !== 'undefined'){
                var url = 'event/'+eventId+'/edit';
                window.location.href = url;
            }
        });

        // get all event data

        function getUserData(qstring){

            $.ajax({
                url: "{{URL::to('event')}}?"+qstring,
                dataType: 'json',
            }).done(function(data) {
                $('.event-data').html(data);
            }).fail(function() {

            });
        }
        function showConfirmMessage() {
            swal({
                title: "Are you sure?",
                text: "You want to delete this event!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                removeUser();
                $('.showSweetAlert').hide();
                location.reload();
                // swal("Deleted!", "Your event has been deleted.", "success");
            });
        }

        // remove event
        function removeUser(){
            $.ajax({
                url: "{{URL::to('event/delete/')}}"+'/'+eventId,
                dataType: 'json',
            }).done(function(data) {
                qstring = 'page=1';
                getUserData(qstring);
            }).fail(function() {

            });
        }
    </script>
@stop
