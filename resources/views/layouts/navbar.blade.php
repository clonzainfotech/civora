@php
$file = url('public/images/default_user.png');
if (is_file(Auth::user()->profile_picture))
{
$file = url(Auth::user()->profile_picture);
}
@endphp
<style type="text/css">

</style>
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
            </div>
        </li>
        <li class="d-none d-lg-inline-block nav-menu-font"><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true">
                <i class="zmdi zmdi-swap"></i>
            </a></li>

            <li class="nav-menu-font"><a href="{{URL::to('holiday-manager')}}" class="{{ Request::segment(1) === 'holiday-manager' ? 'active open' : null }}">Calender
                </a></li>
        @if(in_array(Auth::user()->role,[1,2]))
            <li class="nav-menu-font"><a href="{{URL::to('income-manager')}}" class="{{ Request::segment(1) === 'income-manager' ? 'active open' : null }}">Income
                </a></li>
        @endif
        @if(in_array(Auth::user()->role,[1,2]))
            <li class="nav-menu-font"><a href="{{URL::to('expense-manager')}}" class="{{ Request::segment(1) === 'expense-manager' ? 'active open' : null }}">Expence
                </a></li>
        @endif
        @if(in_array(Auth::user()->role,[1,2,3,6,7,8]))
            <li class="nav-menu-font"><a href="{{URL::to('event')}}" class="{{ Request::segment(1) === 'event' ? 'active open' : null }}">Events
                </a></li>
        @endif
        @if(in_array(Auth::user()->role,[1,2,3,6,7,8]))
            <li class="nav-menu-font"><a href="{{URL::to('review')}}" class="{{ Request::segment(1) === 'review' ? 'active open' : null }}"><span>Reviews</span></a></li>
        @endif
        @if(in_array(Auth::user()->role,[1,2,3,6,7,8]))
            <li class="nav-menu-font"><a href="{{URL::to('testimonials')}}" class="{{ Request::segment(1) === 'testimonials' ? 'active open' : null }}"><span>Testimonials</span></a></li>
        @endif

        <li class="float-right mt-1 dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="lgn-usr-name">
                    <img src="{{ $file}}" style="width:40px; height: 40px; border-radius: 50%; margin-right: 10px;"/>{{ ucwords(strtolower(Auth::user()->name)) }}
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-right slideUp" aria-labelledby="navbarDropdownMenuLink" >
                <li><a href="{{URL::to('user/'.encrypt(Auth::user()->id).'/edit')}}">Edit Profile</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
        </li>
        <li class="float-right col-md-3 mt-lg-4 patient-search-bar">
            {{ Form::open([
                'url'=>'search-patient-data',
                'method'=>'post',
                'class'=>'form search-patient-form',
                'files'=>'false'
            ])}}
                <div class="row clearfix">
                    <div class="col-sm-12 gloabal-search">
                            {{Form::text('search_patient', (isset($code)) ? $code : '', [
                                'class' => 'search-patient',
                                'placeholder'=>'Search patient code',
                                'required',
                                // 'maxlength'=>9
                            ])}}
                            {{ Form::button('<i class="zmdi zmdi-search"></i>',[
                                'class'=> 'search-button',
                                'type' => 'submit',
                            ]) }}
                        <span class="form-error-msg">
                            {{$errors->first('search_patient')}}
                        </span>
                    </div>
                </div>
            {{ Form::close() }}
        </li>
    </ul>
</nav>
