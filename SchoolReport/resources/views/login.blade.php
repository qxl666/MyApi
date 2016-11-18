<form method="post" action="{{URL('login')}}">
    <table border="1">
        <input type="hidden" value="{{csrf_token()}}" name="_token">
        <tr>
            <td>username：</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>password：</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="submit"></td>
        </tr>
    </table>
</form>