<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>大事記類別管理 — 品牌名稱 管理系統</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- 前台與後台共用同一份 CSS -->
    <link rel="stylesheet" href="/css/style.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.25/dist/sweetalert2.min.css">
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
        <a href="index.html" class="admin-brand">
            <div class="logo-box">B</div>
            <div><span>品牌名稱</span><small>ADMIN</small></div>
        </a>
        <nav class="admin-nav">
            <div class="nav-group">總覽</div>
            <a href="index.html"><i class="fa fa-tachometer-alt"></i> 儀表板</a>
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
            <div class="page-name">大事記類別管理</div>
            <div class="admin-user">
                <a href="../index.html" target="_blank"><i class="fa fa-external-link-alt"></i> 前台</a>
                <span><i class="fa fa-user-circle"></i> 系統管理員</span>
                <a href="login.html" data-logout><i class="fa fa-sign-out-alt"></i> 登出</a>
            </div>
        </header>

        <main class="admin-content">
            <div class="admin-card" data-crud-list>
                <div class="admin-card-header">
                    <h2><i class="fa fa-history"></i> 大事記類別</h2>
                    <div class="admin-toolbar">
                        <!-- 關鍵字即時查詢：輸入時自動篩選並標示關鍵字 -->
                        <form class="search-box">
                            <i class="fa fa-search"></i>
                            <input type="search" name="keyword" class="form-control" placeholder="搜尋標籤 / 標題" autocomplete="off" />
                        </form>
                        <!-- <select name="tag_type" class="form-control" data-filter>
                            <option value="">全部類型</option>
                            <option value="milestone">里程碑</option>
                            <option value="product">產品</option>
                            <option value="award">獲獎 / 認證</option>
                        </select> -->
                        <button type="button" class="btn btn-light btn-sm" data-clear><i class="fa fa-times"></i> 清除</button>
                        <a href="/admin/milestone/types/create" class="btn btn-gold btn-sm"><i class="fa fa-plus"></i> 新增大事記類別</a>
                    </div>
                </div>

                <div class="table-wrap">
                    <table class="data-table admin-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>標籤</th>
                                <th>標題</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 保留第一個tr, 其餘刪除 -->
                            @foreach($list as $data)
                            <tr data-row>
                                <td class="num text-muted">{{ $data->id }}</td>
                                <td><span class="badge badge-{{ $data->label }}" data-mark>{{ $data->title }}</span></td>
                                <td data-mark>{{ $data->title }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="/admin/milestone/types/edit/{{ $data->id }}" class="btn btn-outline btn-xs"><i class="fa fa-edit"></i> 修改</a>
                                        <button type="button" class="btn btn-danger-outline btn-xs" onclick="doDelete('{{ $data->id }}')"><i class="fa fa-trash"></i> 刪除</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="admin-table-info">
                    <span>共 <b data-total>8</b> 筆</span>
                    <nav class="pagination">
                        <span class="disabled"><i class="fa fa-chevron-left"></i></span>
                        <span class="active">1</span>
                        <span class="disabled"><i class="fa fa-chevron-right"></i></span>
                    </nav>
                </div>
            </div>
        </main>
        <footer class="admin-footer">&copy; 2026 品牌名稱 管理系統</footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/main.js"></script>
    <script src="/js/admin.js"></script>
</body>

</html>