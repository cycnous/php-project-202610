@extends('front.layout')
@section('title', '大事記')
@section('content')
<div class="page-hero">
    <div class="container container-narrow">
        <h1><i class="fa fa-history"></i>大事記</h1>
        <div class="breadcrumb"><a href="/">首頁</a> <i class="fa fa-chevron-right"></i> 大事記</div>
    </div>
</div>

<div class="section-lg">
    <div class="container container-narrow">
        <div class="timeline">
            {{-- 傳統php: <?php $cnt = 0; ?> --}}
            @php
            $cnt = 0;   // 計數器初始值為0,
            @endphp
            {{-- 第一個迴圈為年份 --}}
            @foreach($years as $yy)
            <div class="year-marker">
                <div class="year-pill">{{ $yy }}</div>
            </div>
                @foreach($list as $data)    {{-- 第二個迴圈為所有大事記 --}}
                    @continue($data->years != $yy)  {{-- 當大事記的 years 不等於外圈的$yy時, 則跳過繼續下一筆 --}}
                    @php
                        $cnt++;
                    @endphp
                    {{-- %: 取餘數, 判斷要放左還放右 --}}
                <div class="event {{ $cnt % 2 == 0 ? 'left' : 'right' }}">
                    <div class="event-dot {{ $data->point == 'Y' ? 'highlight' : '' }}"></div>
                    <div class="event-content">
                        <div class="event-month">{{ $data->months }} 月</div>
                        <div class="event-title">{{ $data->title }}</div>
                        <div class="event-desc">{!! $data->content !!}</div>
                        <span class="event-tag tag-{{ $data->types->label }}"><i class="fa fa-star"></i> {{ $data->types->title }}</span>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection