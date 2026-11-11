<!DOCTYPE html>
<html lang="zh-Hant">
{{-- 後台樣板管理
     1. 修改 title: <title>@yield('title')</title>
        @yield('title'): 每個網頁可以設定自己的標題, 當載入樣板時, 標題會自動載入 <title></title> 中
     2. 將 <main></main> 中的html全部刪除, 改為 @yield('content')
     3. 修改選單超連結
--}}

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- 前台與後台共用同一份 CSS -->
    <link rel="stylesheet" href="/css/style.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.min.css">

    <!-- 新增Jqurey 4.x minified-->
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>

    <!-- 新增 doDelete function -->
    <script>
        function doDelete(id, btn, url) {
            // 引用 sweetalert2 的 A dialog with three buttons
            Swal.fire({
                icon: "warning",
                title: "確定刪除?",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "確定",
                denyButtonText: `放棄`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(msg)
                        {
                            Swal.fire('已刪除!', '', 'success');
                            // btn: 傳進來的 button
                            // closest: 尋找最近的符合條件的元素
                            // tr: 表格中的列
                            // [data-row]: 具有 data-row 屬性
                            // 從目前元素(button)開始, 往上尋找最近的一個符合條件的<tr>
                            // remove: 移除
                            $(btn).closest('tr[data-row]').remove();
                        }
                    });
                };
                // Swal.fire("Saved!", "", "success");
            });
        }
    </script>

</head>

<body class="admin-body">
    @if(Session::has('message'))
    <script>
        Swal.fire({
            title: "{{ Session::get('message') }}",
            text: "",
            icon: "success"
        });
    </script>
    @endif
    <!-- ===== 側欄 ===== -->
    <aside class="admin-sidebar">
        <a href="/admin/home" class="admin-brand">
            <div class="logo-box">B</div>
            <div><span>品牌名稱</span><small>ADMIN</small></div>
        </a>
        <nav class="admin-nav">
            <div class="nav-group">總覽</div>
            <a href="/admin/home"{!! Request::is('admin/home') ? " class='active'" : "" !!}>
                <i class="fa fa-tachometer-alt"></i> 儀表板</a>
            <div class="nav-group">網站內容</div>
            <a href="/admin/banner"{!! Request::is('admin/banner/*') ? " class='active'" : "" !!}>
                <i class="fa fa-images"></i> 首頁輪播</a>
            <a href="/admin/features"{!! Request::is('admin/features/*') ? " class='active'" : "" !!}>
                <i class="fa fa-medal"></i> 特色 / 核心價值</a>
            <a href="/admin/milestone/list"{!! Request::is('admin/milestone/list') ? " class='active'" : "" !!}>
                <i class="fa fa-history"></i> 大事記</a>
            <a href="/admin/milestone/types/list"{!! Request::is('admin/milestone/types/list') ? " class='active'" : "" !!}>
                <i class="fa fa-history"></i> 大事記類別</a>
            <a href="/admin/team-member"{!! Request::is('admin/team-member') ? " class='active'" : "" !!}>
                <i class="fa fa-users"></i> 核心團隊</a>
            <a href="/admin/setting"{!! Request::is('admin/setting/*') ? " class='active'" : "" !!}>
                <i class="fa fa-cog"></i> 網站設定</a>
            <div class="nav-group">最新消息</div>
            <a href="/admin/news"{!! Request::is('admin/news/*') ? " class='active'" : "" !!}>
                <i class="fa fa-newspaper"></i> 消息管理</a>
            <a href="/admin/news-categorie"{!! Request::is('admin/news-categorie') ? " class='active'" : "" !!}>
                <i class="fa fa-folder"></i> 消息分類</a>
            <div class="nav-group">產品</div>
            <a href="/admin/product"{!! Request::is('admin/product') ? " class='active'" : "" !!}>
                <i class="fa fa-box-open"></i> 產品管理</a>
            <a href="/admin/product-categorie"{!! Request::is('admin/product-categorie') ? " class='active'" : "" !!}>
                <i class="fa fa-folder-open"></i> 產品分類</a>
            <div class="nav-group">會員與訂單</div>
            <a href="/admin/order"{!! Request::is('admin/order') ? " class='active'" : "" !!}>
                <i class="fa fa-receipt"></i> 訂單管理</a>
            <a href="/admin/member"{!! Request::is('admin/member') ? " class='active'" : "" !!}>
                <i class="fa fa-user-friends"></i> 會員管理</a>
            <a href="/admin/addresse"{!! Request::is('admin/addresse') ? " class='active'" : "" !!}>
                <i class="fa fa-map-marker-alt"></i> 會員地址</a>
            <div class="nav-group">系統</div>
            <a href="/manager/list"{!! Request::is('manager/list') ? " class='active'" : "" !!}>
                <i class="fa fa-user-shield"></i> 管理員</a>
        </nav>
    </aside>

    <div class="admin-main">
        <!-- ===== 頂部列 ===== -->
        <header class="admin-topbar">
            <button class="admin-menu-toggle" aria-label="選單"><i class="fa fa-bars"></i></button>
            <!-- 將 page-name 改成 yield('title') -->
            <div class="page-name">@yield('title')</div>
            <div class="admin-user">
                <!-- 調整超連結內容 -->
                <a href="/" target="_blank"><i class="fa fa-external-link-alt"></i> 前台</a>
                <span><i class="fa fa-user-circle"></i> 系統管理員</span>
                <a href="/admin/logout" data-logout><i class="fa fa-sign-out-alt"></i> 登出</a>
            </div>
        </header>

        <!-- 將 <main></main> 中的html全部刪除, 改為 yield('content') -->
        <main class="admin-content">
            @yield('content')
        </main>
        <footer class="admin-footer">&copy; 2026 品牌名稱 管理系統</footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/main.js"></script>
    <!-- <script src="/js/admin.js"></script> -->
</body>

</html>