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
            <div class="year-marker">
                <div class="year-pill">2025</div>
            </div>
            <div class="event right">
                <div class="event-dot highlight"></div>
                <div class="event-content">
                    <div class="event-month">11 月</div>
                    <div class="event-title">年度客戶感謝活動圓滿落幕</div>
                    <div class="event-desc">五百位貴賓蒞臨，現場展示全新旗艦系列，締造單日業績新高。</div>
                    <span class="event-tag tag-milestone"><i class="fa fa-star"></i> 里程碑</span>
                </div>
            </div>
            <div class="event left">
                <div class="event-dot"></div>
                <div class="event-content">
                    <div class="event-month">08 月</div>
                    <div class="event-title">全新秋冬系列產品正式發佈</div>
                    <div class="event-desc">以「自然共生」為設計理念，推出12款環保材質新品。</div>
                    <span class="event-tag tag-product"><i class="fa fa-box-open"></i> 產品</span>
                </div>
            </div>
            <div class="event right">
                <div class="event-dot"></div>
                <div class="event-content">
                    <div class="event-month">03 月</div>
                    <div class="event-title">榮獲年度最佳品質獎</div>
                    <div class="event-desc">由台灣優良商品協會評選，連續三年獲此殊榮，再次印證品質承諾。</div>
                    <span class="event-tag tag-award"><i class="fa fa-trophy"></i> 獲獎</span>
                </div>
            </div>

            <div class="year-marker">
                <div class="year-pill">2024</div>
            </div>
            <div class="event left">
                <div class="event-dot"></div>
                <div class="event-content">
                    <div class="event-month">10 月</div>
                    <div class="event-title">電商平台正式上線</div>
                    <div class="event-desc">全新官方購物平台正式啟用，提供更便捷的網路購物體驗，首月訂單逾千筆。</div>
                    <span class="event-tag tag-milestone"><i class="fa fa-globe"></i> 里程碑</span>
                </div>
            </div>
            <div class="event right">
                <div class="event-dot"></div>
                <div class="event-content">
                    <div class="event-month">05 月</div>
                    <div class="event-title">進駐台中全新旗艦店</div>
                    <div class="event-desc">台中旗艦展示中心盛大開幕，佔地300坪，提供全系列產品完整體驗。</div>
                    <span class="event-tag tag-milestone"><i class="fa fa-store"></i> 展店</span>
                </div>
            </div>
            <div class="event left">
                <div class="event-dot"></div>
                <div class="event-content">
                    <div class="event-month">01 月</div>
                    <div class="event-title">ISO 9001 品質認證通過</div>
                    <div class="event-desc">歷時半年的審核程序圓滿完成，取得國際品質管理系統認證。</div>
                    <span class="event-tag tag-award"><i class="fa fa-certificate"></i> 認證</span>
                </div>
            </div>

            <div class="year-marker">
                <div class="year-pill">2023</div>
            </div>
            <div class="event right">
                <div class="event-dot"></div>
                <div class="event-content">
                    <div class="event-month">09 月</div>
                    <div class="event-title">海外市場首次拓展至日本</div>
                    <div class="event-desc">與日本代理商簽訂合作協議，正式踏入亞洲國際市場，開啟品牌國際化新篇章。</div>
                    <span class="event-tag tag-milestone"><i class="fa fa-flag"></i> 里程碑</span>
                </div>
            </div>
            <div class="event left">
                <div class="event-dot"></div>
                <div class="event-content">
                    <div class="event-month">03 月</div>
                    <div class="event-title">第二代旗艦產品系列問世</div>
                    <div class="event-desc">歷時兩年研發，全新旗艦系列導入專利製程，質感與功能大幅提升。</div>
                    <span class="event-tag tag-product"><i class="fa fa-box-open"></i> 產品</span>
                </div>
            </div>

            <div class="year-marker">
                <div class="year-pill">2020</div>
            </div>
            <div class="event right">
                <div class="event-dot highlight"></div>
                <div class="event-content">
                    <div class="event-month">01 月</div>
                    <div class="event-title">公司正式創立</div>
                    <div class="event-desc">由一群對品質充滿熱忱的創業者共同創辦，以「讓每個人都能擁有優質生活」為核心使命，踏出品牌第一步。</div>
                    <span class="event-tag tag-milestone"><i class="fa fa-flag-checkered"></i> 創立</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection