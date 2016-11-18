<meta charset="utf-8">
<form action="{{URL('/show')}}" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
    <input type="text" name="name">&nbsp; <input type="submit" value="search">
</form>
<table border="1">
    <tr>
        <td>id</td>
        <td>用户名</td>
        <td>图片</td>
        <td>编辑</td>
    </tr>
    <?php foreach($arr as $val) { ?>
    <tr>
        <td><?php echo $val['uid']?></td>
        <td><?php echo $val['uname']?></td>
        <td><img src="{{$val['myfile']}}" width="100px" height="80px"/></td>
        <td><a href="{{URL('/del')}}?id={{$val['uid']}}">删除</a>
            <a href="{{URL('/edit')}}?id={{$val['uid']}}">修改</a>
        </td>
    </tr>
    <?php }?>
</table>
<?php echo $arr->links()?>