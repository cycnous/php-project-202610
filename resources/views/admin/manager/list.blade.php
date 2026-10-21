{{--
帳號列表
新增帳號
1.在ManagerController中新增public function create()
2.在路中routes/web.php中新增/manager/create
3.在resources/views/admin/manager中新增create.blade.php
4.在ManagerController新增public function delete(Request $req)

修改帳號
1.新增<td>修改</td>
2.在foreach中新增<td><a href="/manager/edit/{{ $data->id }}">修改</a></td>
3.在路由新增Route::get("/manager/edit/{id}", [ManagerController::class, "edit"]);
4.在ManagerController新增public function edit(Request $req)
5.在resources/views/admin/manager中新增edit.blade.php
--}}
<div><a href="create">新增</a></div>
<table width="100">
    <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>修改</td>
    </tr>
    {{--
        foreach:對所有的資料
        $list: 由ManagerController的list function 中傳過來的所有帳號資料
        $list as $data: 對於帳號的每一筆資料均由$data來表示
        $data->userId: userId為manager資料表中的userId欄位名稱
        $data->pwd: pwd為manager資料表中的pwd欄位名稱
        在php中->表示[的]意思, 如同在java中用.
        foreach開始, 要有endforeach結束
    --}}
    @foreach($list as $data)
    <tr>
        <td>{{ $data->userId }}</td>
        <td>{{ $data->pwd }}</td>
        <td><a href="/manager/edit/{{ $data->id }}">修改</a></td>
        <td><a href="/manager/edit/{{ $data->id }}">刪除</a></td>
    </tr>
    @endforeach
</table>