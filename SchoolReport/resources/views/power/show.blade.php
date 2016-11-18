<form method="post" action="{{URL('apply')}}">
    <h2>欢迎<?php echo Session::get('name')?>登陆</h2>
<table border="1">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <tr>
        <td>申请标题</td>
        <td><input type="text" name="title"> </td>
    </tr>
    <tr>
        <td>申请类型</td>
        <td>
            <input type="radio" name="type" value="1">请假
            <input type="radio" name="type" value="2">调休
        </td>
    </tr>
    <tr>
        <td>开始时间</td>
        <td><input type="text" name="start"> </td>
    </tr>
    <tr>
        <td>结束时间</td>
        <td><input type="text" name="end"> </td>
    </tr>
    <tr>
        <td>申请原因</td>
        <td><textarea cols="16" rows="3" name="reason"></textarea></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="提交"> </td>
    </tr>

</table>
</form>