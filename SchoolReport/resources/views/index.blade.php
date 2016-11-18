<script src="jquery-1.9.1.min.js"></script>
<meta charset="utf-8">
<form action="{{URL('/add')}}" method="post" enctype="multipart/form-data">
    <table id="table">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <tr>
            <td>username：</td>
            <td><input type="text" name="name"></td>
            <td>file：</td>
            <td><input type="file" name="myfile"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="submit">
                <input type="button" value="+" id="add">
                <input type="button" value="_" id="del">
            </td>
        </tr>
    </table>
</form>
<script>
    /**
     * 追加一行
     */
    $("#add").click(function(){
        $("#table tr:last").before('<tr><td>username：</td><td><input type="text" name="name"></td> <td>file：</td><td><input type="file" name="myfile"></td></tr>');
    })
    $("#del").click(function(){
        $("#table tr:last").prev().remove();
    })


</script>