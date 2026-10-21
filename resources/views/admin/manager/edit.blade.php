<form action="/manager/update" method="post">
    <input type="hidden" name="id" value="{{ $manager->id }}">
    @csrf
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="userId" value="{{ $manager->userId }}"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="text" name="pwd" value="{{ $manager->pwd }}"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit">確定</button>
            </td>
        </tr>
    </table>
</form>