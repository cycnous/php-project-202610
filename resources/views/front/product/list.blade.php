@extends('front.layout')
@section('title','產品介紹')
@section('content')
<div class="page-hero">
    <div class="container">
        <h1><i class="fa fa-box-open"></i>產品介紹</h1>
        <div class="breadcrumb"><a href="/">首頁</a> <i class="fa fa-chevron-right"></i> 產品介紹</div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="list-toolbar">
            <div class="cat-tabs">
                <button class="cat-tab active" onclick="filterCat(this,'all')">全部</button>
                <button class="cat-tab" onclick="filterCat(this,'cat1')">系列一</button>
                <button class="cat-tab" onclick="filterCat(this,'cat2')">系列二</button>
                <button class="cat-tab" onclick="filterCat(this,'cat3')">系列三</button>
            </div>
            <div class="search-box">
                <i class="fa fa-search"></i>
                <input type="search" class="form-control" id="keyword" placeholder="搜尋產品名稱或編號" oninput="applyFilter()" />
            </div>
        </div>

        <div class="product-grid" id="product-grid">
            <a href="product-detail.html" class="product-card" data-cat="cat1">
                <div class="product-img ph"><i class="fa fa-cube"></i><span class="product-badge">新品</span></div>
                <div class="product-info">
                    <div class="product-cat">系列一</div>
                    <div class="product-title">旗艦系列 A1 精品</div>
                    <div class="product-no">NO. A-00123</div>
                    <div class="product-price"><span class="price-now">NT$ 2,980</span><span class="price-was">NT$ 3,600</span></div>
                </div>
            </a>
            <a href="product-detail.html" class="product-card" data-cat="cat1">
                <div class="product-img ph"><i class="fa fa-gem"></i></div>
                <div class="product-info">
                    <div class="product-cat">系列一</div>
                    <div class="product-title">旗艦系列 A2 進階款</div>
                    <div class="product-no">NO. A-00124</div>
                    <div class="product-price"><span class="price-now">NT$ 3,580</span></div>
                </div>
            </a>
            <a href="product-detail.html" class="product-card" data-cat="cat2">
                <div class="product-img ph"><i class="fa fa-star"></i><span class="product-badge gold">熱銷</span></div>
                <div class="product-info">
                    <div class="product-cat">系列二</div>
                    <div class="product-title">經典系列 B1 限定版商品長標題展示</div>
                    <div class="product-no">NO. B-00205</div>
                    <div class="product-price"><span class="price-now">NT$ 1,880</span><span class="price-was">NT$ 2,200</span></div>
                </div>
            </a>
            <a href="product-detail.html" class="product-card" data-cat="cat2">
                <div class="product-img ph"><i class="fa fa-award"></i></div>
                <div class="product-info">
                    <div class="product-cat">系列二</div>
                    <div class="product-title">經典系列 B2 標準款</div>
                    <div class="product-no">NO. B-00206</div>
                    <div class="product-price"><span class="price-now">NT$ 1,280</span></div>
                </div>
            </a>
            <a href="product-detail.html" class="product-card" data-cat="cat3">
                <div class="product-img ph"><i class="fa fa-leaf"></i></div>
                <div class="product-info">
                    <div class="product-cat">系列三</div>
                    <div class="product-title">自然系列 C1 環保款</div>
                    <div class="product-no">NO. C-00301</div>
                    <div class="product-price"><span class="price-now">NT$ 980</span><span class="price-was">NT$ 1,200</span></div>
                </div>
            </a>
            <a href="product-detail.html" class="product-card" data-cat="cat3">
                <div class="product-img ph"><i class="fa fa-seedling"></i></div>
                <div class="product-info">
                    <div class="product-cat">系列三</div>
                    <div class="product-title">自然系列 C2 輕奢款</div>
                    <div class="product-no">NO. C-00302</div>
                    <div class="product-price"><span class="price-now">NT$ 1,480</span></div>
                </div>
            </a>
            <a href="product-detail.html" class="product-card" data-cat="cat1">
                <div class="product-img ph"><i class="fa fa-crown"></i></div>
                <div class="product-info">
                    <div class="product-cat">系列一</div>
                    <div class="product-title">旗艦系列 A3 尊爵款</div>
                    <div class="product-no">NO. A-00125</div>
                    <div class="product-price"><span class="price-now">NT$ 4,980</span><span class="price-was">NT$ 5,800</span></div>
                </div>
            </a>
            <a href="product-detail.html" class="product-card" data-cat="cat2">
                <div class="product-img ph"><i class="fa fa-heart"></i></div>
                <div class="product-info">
                    <div class="product-cat">系列二</div>
                    <div class="product-title">經典系列 B3 禮盒組合</div>
                    <div class="product-no">NO. B-00207</div>
                    <div class="product-price"><span class="price-now">NT$ 2,480</span></div>
                </div>
            </a>
        </div>
        <div class="empty-state hidden" id="empty-state"><i class="fa fa-search"></i>
            <p>找不到符合的產品</p>
        </div>

        <div class="pagination">
            <span class="disabled"><i class="fa fa-chevron-left"></i></span>
            <span class="active">1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>
@endsection