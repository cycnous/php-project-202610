<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CYC - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- 全站唯一共用 CSS -->
    <link rel="stylesheet" href="/css/style.css" />
</head>

<body class="page-home">
    <!-- ===== Topbar ===== -->
    <div id="topbar">
        <a href="/member/home"><i class="fa fa-user-circle"></i> 會員中心</a>
        @if (empty(session()->get('userId')))
        <span class="sep">|</span>
        <a href="/memeber/login"><i class="fa fa-sign-in-alt"></i> 登入</a>
        @endif
        <span class="sep">|</span>
        <a href="/memeber/register"><i class="fa fa-user-plus"></i> 加入會員</a>
        @if (empty(session()->get('userId')))
        <span class="sep">|</span>
        <a href="/member/logout" onclick="return confirm('確定要登出？')"><i class="fa fa-sign-out-alt"></i> 登出</a>
        @endif
    </div>

    <!-- ===== Navbar ===== -->
    <nav id="navbar">
        <a href="/" class="nav-logo">
            <div class="logo-box">B</div>
            <span class="logo-text">品牌名稱</span>
        </a>
        <ul class="nav-links">
            <li>
                <a href="/news"><i class="fa fa-newspaper"></i> 最新消息</a>
                <ul class="dropdown">
                    <!-- ?後面是傳遞的參數, 有名稱跟值 -->
                    <li><a href="news-list.html?cat=1">公司公告</a></li>
                    <li><a href="news-list.html?cat=2">活動資訊</a></li>
                    <li><a href="news-list.html?cat=3">產品動態</a></li>
                </ul>
            </li>
            <li>
                <a href="/products"><i class="fa fa-box-open"></i> 產品介紹</a>
                <ul class="dropdown">
                    <li><a href="products-list.html?cat=1">系列一</a></li>
                    <li><a href="products-list.html?cat=2">系列二</a></li>
                    <li><a href="products-list.html?cat=3">系列三</a></li>
                </ul>
            </li>
            <li><a href="milestone.html"><i class="fa fa-history"></i> 大事記</a></li>
            <li><a href="about.html"><i class="fa fa-building"></i> 關於我們</a></li>
            <li><a href="member.html"><i class="fa fa-user"></i> 會員中心</a></li>
        </ul>
        <a href="cart.html" class="nav-cart">
            <i class="fa fa-shopping-cart"></i>
            <span>購物車</span>
            <span class="cart-badge" id="cart-badge">3</span>
        </a>
        <button class="nav-toggle" onclick="toggleNav()" aria-label="選單"><i class="fa fa-bars"></i></button>
    </nav>

    <!-- ===== Main Content ===== -->
    <main id="content-wrap">
        @yield('content')
    </main>

    <!-- ===== Footer ===== -->
    <footer class="site-footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="logo-box">B</div>
                <p>提供優質產品與服務<br>您的信賴之選</p>
                <div class="footer-social">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="LINE"><i class="fab fa-line"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>快速連結</h4>
                <ul>
                    <li><a href="/about">關於我們</a></li>
                    <li><a href="/news">最新消息</a></li>
                    <li><a href="/products">產品介紹</a></li>
                    <li><a href="/milestone">大事記</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>會員服務</h4>
                <ul>
                    <li><a href="/member/login">會員登入</a></li>
                    <li><a href="/member/register">加入會員</a></li>
                    <li><a href="/member/home">會員中心</a></li>
                    <li><a href="/cart">購物車</a></li>
                </ul>
            </div>
            <div class="footer-col contact">
                <h4>聯絡資訊</h4>
                <ul>
                    <li><i class="fa fa-map-marker-alt"></i> 台灣某市某區某路一號</li>
                    <li><i class="fa fa-phone"></i> 02-1234-5678</li>
                    <li><i class="fa fa-envelope"></i> info@example.com</li>
                    <li><i class="fa fa-clock"></i> 週一至週五 09:00–18:00</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; 2025 品牌名稱. All rights reserved.</span>
            <span>隱私權政策 | 服務條款</span>
        </div>
    </footer>

    <button id="back-top" aria-label="回頂端"><i class="fa fa-chevron-up"></i></button>
    <script src="/js/main.js"></script>
    <script>
        /* Hero 輪播 */
        let heroIndex = 0,
            heroTimer = null;
        const totalSlides = document.querySelectorAll('.hero-slide').length;

        function heroGo(n) {
            heroIndex = (n + totalSlides) % totalSlides;
            document.getElementById('heroSlides').style.transform = `translateX(-${heroIndex * 100}%)`;
            document.querySelectorAll('.hero-dot').forEach((d, i) => d.classList.toggle('active', i === heroIndex));
            clearInterval(heroTimer);
            heroTimer = setInterval(() => heroMove(1), 5000);
        }

        function heroMove(dir) {
            heroGo(heroIndex + dir);
        }
        heroGo(0);

        /* 加入購物車（示範） */
        let cartCount = 3;

        function addToCart(btn) {
            updateCartBadge(++cartCount);
            btn.classList.add('done');
            btn.innerHTML = '<i class="fa fa-check"></i> 已加入';
            setTimeout(() => {
                btn.classList.remove('done');
                btn.innerHTML = '<i class="fa fa-cart-plus"></i> 加入購物車';
            }, 1500);
        }
    </script>
</body>

</html>