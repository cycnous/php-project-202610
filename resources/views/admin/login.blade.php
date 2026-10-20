<!-- 
 1. 將範例網頁的admin/login.html複製貼上
 2. 修改css,js的路徑全部改成從根目錄(/)開始
-->

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>後台登入 — 品牌名稱 管理系統</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- 前台與後台共用同一份 CSS -->
  <link rel="stylesheet" href="/css/style.css" />
</head>
<body class="admin-login">
  <div class="auth-card">
    <div class="auth-logo"><div class="logo-box">B</div><span>品牌名稱</span></div>
    <div class="auth-title">
      <h2>後台管理系統</h2>
      <p>請使用管理員帳號登入（示範：admin / admin1234）</p>
      @if($errors->has('msg'))
        <div class="text-danger">{{ $errors->first('msg') }}</div>
      @endif
    </div>

    <!-- 1. 欄位說明
         form: 處理表單, 所有要送出的資料欄位都要在<form>與</form>之間
         action: 資料輸入後送到哪個網址 ->該網址在路由也要設定
         method: 送出的方法, 通常只會有get和post, 
                 Laravel 還另有put, patch, delete
                 表單一般用post, 可回傳大筆資料, 且不會出現網址列, 較安全
         @csrf:  權杖(token), 在Laravel中, 所有表單都要加上@csrf
                 表示是由自己網站所送出的, 不是由他人在遠端送出, 保障網頁的安全
                 @csrf 會自動轉換成: <input type="hidden" name="_token" value="xxxxxxxxxxxxxxxx" autocomplete="off"> 
          
         2. 要在路由設定 Route::post('/admin/login', [AdminController::class, 'login']);
            為何要用Route::post? 因為form method='post'
         3. 要在Admincontroller中新增 public function login()
    -->
    <form action="/admin/login" method="post">
        @csrf
      <div class="form-group">
        <label class="form-label" for="userId">帳號</label>
        <div class="input-icon-wrap">
          <i class="fa fa-user-shield icon"></i>
          <!-- id: 是給瀏覽器或javascript控制用的
               name: 後端接收資料用的名稱
               class="form-control: bootstrap中輸入框的css
               required: 使用jquery的必填
               autofocus: 自動取得焦點, 游標會自動停佇在這裡
               value: 預設值, 取得變數-上一筆輸入的userId 
          -->
          <input type="text" id="userId" name="userId" class="form-control" required autofocus
          value="{{ old('userId') }}" />
        </div>
      </div>
      <div class="form-group">
        <label class="form-label" for="pwd">密碼</label>
        <div class="input-icon-wrap">
          <i class="fa fa-lock icon"></i>
          <input type="password" id="pwd" name="pwd" class="form-control" required />
          <span class="pw-toggle" onclick="togglePw('pwd',this)"><i class="fa fa-eye"></i></span>
        </div>
      </div>
      <div class="form-group">
        <label class="form-check"><input type="checkbox" name="remember" value="1" /> 記住我</label>
      </div>
      <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in-alt"></i> 登入後台</button>
    </form>
    <div class="auth-footer"><a href="/index.html"><i class="fa fa-arrow-left"></i> 回到前台</a></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/js/main.js"></script>
  <script src="/js/admin.js"></script>
</body>
</html>
