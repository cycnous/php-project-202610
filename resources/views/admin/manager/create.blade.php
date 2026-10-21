<!--
action:送到哪個路徑
表單一般的方法(method)都是用post
csrf: _token 權杖(權限)

1.在路由中新增Route::post("/manager/store", [ManagerController::class, "store"]);
2.在ManagerController中新增public function store(Request $req)
-->
<form action="store" method="post">
@csrf
<table>
    <tr>
        <td>帳號</td>
        <td><input type="text" name="userId" id="userId"></td>
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="text" name="pwd"></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <button type="submit">確定</button>
        </td>
    </tr>
</table>
</form>