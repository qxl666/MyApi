<table border="1">
    <tr>
        <td>编号</td>
        <td>申请类型</td>
        <td>申请时间</td>
        <td>内容</td>
        <td>起始时间</td>
        <td>结束时间</td>
        <td>审核状态</td>
    </tr>
    <?php foreach($res as $val){?>
    <tr>
        <td><?php echo $val['id']?></td>
        <td> <?php echo $val['uname']?></td>
        <td><?php echo $val['time']?></td>
        <td><?php echo $val['reason']?></td>
        <td><?php echo $val['start']?></td>
        <td><?php echo $val['end']?></td>
        <td>
            <a href="{{URL('yes')}}?id={{$val['id']}}">通过</a>
            <a href="{{URL('no')}}?id={{$val['id']}}">不通过</a>
        </td>

    </tr>
    <?php }?>
</table>
