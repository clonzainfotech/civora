@extends('layouts.main')
@section('parentPageTitle', 'IUI')
@section('title', 'Result IUI')

@section('page-style')
<style>
    .iui-result-data { margin-top: 6px; }

    .iui-result-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        background: #fff;
        border: 1px solid #eceff1;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
        overflow: hidden;
        transition: transform .15s ease, box-shadow .15s ease;
    }
    .iui-result-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 22px rgba(0, 0, 0, .12);
    }

    .iui-card-head {
        position: relative;
        text-align: center;
        padding: 12px 14px 10px;
        border-bottom: 1px solid #f1f3f4;
    }
    .iui-card-date { display: block; font-weight: 600; font-size: 15px; color: #263238; line-height: 1.2; }
    .iui-card-day  { display: block; font-size: 11px; letter-spacing: .6px; text-transform: uppercase; color: #b0bec5; margin-top: 2px; }

    .iui-today-badge {
        position: absolute; top: 10px; right: 10px;
        font-size: 10px; font-weight: 600; color: #fff;
        padding: 2px 8px; border-radius: 20px; line-height: 1.4;
    }

    .iui-card-patients { list-style: none; margin: 0; padding: 6px 0; flex: 1 1 auto; }
    .iui-card-patients li {
        padding: 7px 14px;
        font-size: 13.5px;
        color: #455a64;
        border-bottom: 1px dashed #eef1f2;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .iui-card-patients li:last-child { border-bottom: none; }
    .iui-card-patients li.is-empty { color: #b0bec5; font-style: italic; }

    .iui-card-foot {
        display: flex; align-items: center; justify-content: space-between;
        padding: 9px 14px;
        background: #fafbfc;
        border-top: 1px solid #f1f3f4;
        font-size: 12px; color: #78909c;
    }
    .iui-count {
        min-width: 24px; text-align: center;
        font-weight: 600; color: #fff;
        border-radius: 20px; padding: 1px 9px;
    }

    /* today highlight (uses the theme primary via .candor-* helper classes) */
    .iui-result-card.is-today { box-shadow: 0 0 0 2px rgba(0,0,0,.04), 0 6px 16px rgba(0, 0, 0, .12); }
    .iui-result-card.is-today .iui-card-head { background: rgba(0, 0, 0, .02); }
</style>
@stop

@section('content')
    <div class="row clearfix iui-result-data">
        @forelse($iuiHistoryData as $key => $row)
            @php
                $isToday = $key == \Carbon\Carbon::now()->format('Y-m-d');
            @endphp
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                <div class="iui-result-card {{ $isToday ? 'is-today' : '' }}">
                    <div class="iui-card-head">
                        <span class="iui-card-date">{{ cdate($key)->format('d M Y') }}</span>
                        <span class="iui-card-day">{{ cdate($key)->format('l') }}</span>
                        @if($isToday)
                            <span class="iui-today-badge candor-bg-color">Today</span>
                        @endif
                    </div>

                    <ul class="iui-card-patients">
                        @forelse($row as $patient)
                            @php $pname = ucwords(strtolower($patient['get_patients_info']['name'] ?? '')); @endphp
                            <li title="{{ $pname }}">{{ $pname !== '' ? $pname : '—' }}</li>
                        @empty
                            <li class="is-empty">No patients</li>
                        @endforelse
                    </ul>

                    <div class="iui-card-foot">
                        <span><i class="zmdi zmdi-accounts-list"></i> Total</span>
                        <span class="iui-count candor-bg-color">{{ count($row) }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted p-5">No records available</div>
        @endforelse
    </div>
@endsection
