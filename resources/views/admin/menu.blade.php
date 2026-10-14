  <aside class="admin-sidebar">
    <a href="index.html" class="admin-brand">
      <div class="logo-box">B</div>
      <div><span>品牌名稱</span><small>ADMIN</small></div>
    </a>
    <nav class="admin-nav">
      <div class="nav-group">總覽</div>
      <a href="/admin/home" {!! Request::is('admin/home') ? " class='active'" : '' !!}><i class="fa fa-tachometer-alt"></i> Home</a>
      <div class="nav-group">網站內容</div>
      <a href="banners.html"><i class="fa fa-images"></i> 首頁輪播</a>
      <a href="features.html"><i class="fa fa-medal"></i> 特色 / 核心價值</a>
      <a href="milestones.html"><i class="fa fa-history"></i> 大事記</a>
      <a href="team-members.html"><i class="fa fa-users"></i> 核心團隊</a>
      <a href="settings.html"><i class="fa fa-cog"></i> 網站設定</a>
      <div class="nav-group">最新消息</div>
      <a href="news.html"><i class="fa fa-newspaper"></i> 消息管理</a>
      <a href="news-categories.html"><i class="fa fa-folder"></i> 消息分類</a>
      <div class="nav-group">產品</div>
      <a href="products.html"><i class="fa fa-box-open"></i> 產品管理</a>
      <a href="product-categories.html"><i class="fa fa-folder-open"></i> 產品分類</a>
      <div class="nav-group">會員與訂單</div>
      <a href="orders.html"><i class="fa fa-receipt"></i> 訂單管理</a>
      <a href="members.html"><i class="fa fa-user-friends"></i> 會員管理</a>
      <a href="addresses.html"><i class="fa fa-map-marker-alt"></i> 會員地址</a>
      <div class="nav-group">系統</div>
      <a href="/admin/manager/list" {!! Request::is('admin/manager/*') ? " class='active'" : '' !!}><i class="fa fa-user-shield"></i> 帳號管理</a>
    </nav>
  </aside>