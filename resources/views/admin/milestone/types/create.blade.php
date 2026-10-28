<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>新增大事記類別 — 品牌名稱 管理系統</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- 前台與後台共用同一份 CSS -->
    <link rel="stylesheet" href="/css/style.css" />
    <!-- 新增Jqurey 4.x minified-->
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
</head>

<body class="admin-body">
    <!-- ===== 側欄 ===== -->
    <aside class="admin-sidebar">
        <a href="index.html" class="admin-brand">
            <div class="logo-box">B</div>
            <div><span>品牌名稱</span><small>ADMIN</small></div>
        </a>
        <!-- 
             1. 修改[儀表板]的超連結為'/'
             2. 修改[管理員],[返回列表]的超連結為'/manager/list' 
        -->
        <nav class="admin-nav">
            <div class="nav-group">總覽</div>
            <a href="/"><i class="fa fa-tachometer-alt"></i> 儀表板</a>
            <div class="nav-group">網站內容</div>
            <a href="banners.html"><i class="fa fa-images"></i> 首頁輪播</a>
            <a href="features.html"><i class="fa fa-medal"></i> 特色 / 核心價值</a>
            <a href="/admin/milestone/list"><i class="fa fa-history"></i> 大事記</a>
            <a href="/admin/milestone/types/list" class="active"><i class="fa fa-history"></i> 大事記類別</a>
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
            <a href="/manager/list"><i class="fa fa-user-shield"></i> 管理員</a>
        </nav>
    </aside>

    <div class="admin-main">
        <!-- ===== 頂部列 ===== -->
        <header class="admin-topbar">
            <button class="admin-menu-toggle" aria-label="選單"><i class="fa fa-bars"></i></button>
            <div class="page-name">大事記管理</div>
            <div class="admin-user">
                <a href="../index.html" target="_blank"><i class="fa fa-external-link-alt"></i> 前台</a>
                <span><i class="fa fa-user-circle"></i> 系統管理員</span>
                <a href="login.html" data-logout><i class="fa fa-sign-out-alt"></i> 登出</a>
            </div>
        </header>

        <main class="admin-content">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h2><i class="fa fa-user-shield"></i> <span data-mode-text>新增大事記類別</span></h2>
                    <a href="/admin/milestone/types/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
                </div>
                <div class="admin-card-body">
                    <!-- 
                        1. 在 MileStoneTypeController 中新增 function store
                        2. 在路由新增 Route::post('/admin/milestone/types/store', [MileStoneTypeController::class, 'store'])
                        3. 新增完成後, 要告知使用者已新增完畢
                        4. 告知提示會使用sweetalert2, 要在列表(list.blade.php)中引入 sweetalert2 的 css & js

                     -->
                    <form class="admin-form" action='/admin/milestone/types/store' method='post'>
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="label">標籤 <span class="req">*</span></label>
                                <input type="text" id="label" name="label" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="title">標題 <span class="req">*</span></label>
                            <div class="input-icon-wrap">
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
                            <a href="/admin/milestone/types/list" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer class="admin-footer">&copy; 2026 品牌名稱 管理系統</footer>
    </div>
</body>

</html>