<form action="{{URL('/edit_to')}}" method="post" enctype="multipart/form-data">
    <table>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="<?php echo $res[0]['uid']?>">
        <tr>
            <td>username：</td>
            <td><input type="text" name="name" value="<?php echo $res[0]['uname']?>"></td>
        </tr>
        <tr>
            <td>file：</td>
            <td><input type="file" name="myfile"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="submit"></td>
        </tr>
    </table>
</form>