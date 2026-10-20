<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>儀表板 — 品牌名稱 管理系統</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- 前台與後台共用同一份 CSS -->
  <link rel="stylesheet" href="/css/style.css" />
</head>
<body class="admin-body">
  <!-- ===== 側欄 ===== -->
   <!-- php的引入檔案的方式有4種: include, include_once, require, require_once -->
    @include('admin.menu');

  <div class="admin-main">
    <!-- ===== 頂部列 ===== -->
    <header class="admin-topbar">
      <button class="admin-menu-toggle" aria-label="選單"><i class="fa fa-bars"></i></button>
      <div class="page-name">@yield('title')</div>
      <div class="admin-user">
        <a href="/" target="_blank"><i class="fa fa-external-link-alt"></i> 前台</a>
        <span><i class="fa fa-user-circle"></i> {{ session()->get('userId') }}</span>
        <a href="/admin/logout" data-logout><i class="fa fa-sign-out-alt"></i> 登出</a>
      </div>
    </header>

    <main class="admin-content">
        @yield('content')
    </main>
    <footer class="admin-footer">&copy; 2026 品牌名稱 管理系統</footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/js/main.js"></script>
  <script src="/js/admin.js"></script>
</body>
</html>
