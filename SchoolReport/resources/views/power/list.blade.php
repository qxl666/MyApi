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
    <?php foreach($list as $val){?>
    <tr>
        <td><?php echo $val['id']?></td>
        <td> <?php if($val['type']==1){echo "请假";}else{echo "调课";} ?></td>
        <td><?php echo $val['time']?></td>
        <td><?php echo $val['reason']?></td>
        <td><?php echo $val['start']?></td>
        <td><?php echo $val['end']?></td>
<td><?php if($val['status']==0){echo "未审核";} if($val['status']==3){echo "审核未通过";} if($val['status']==1){echo "审核中";}if($val['status']==2){echo "通过";} ?></td>

    </tr>
    <?php }?>
</table>
