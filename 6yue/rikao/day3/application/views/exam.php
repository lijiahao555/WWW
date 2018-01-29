<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<center>
    <table border="1">
        <tr>
            <td>姓名</td>
            <td><input type="text" id="name"/></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" id="pwd"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" value="提交" id="sub"/></td>
        </tr>
    </table>
    <table  border="1" id="box">
        <?php foreach ($data as $key => $value): ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td del_id="<?php echo  $value['id']?>"><input type='button' class='del' value='删除'></td>
            </tr>
        <?php endforeach ?>
    </table>
</center>
</body>
</html>
<script src="<?php echo base_url('public/jquery.js') ?>"></script>
<script>
    $('#sub').click(function(){
        var name=$('#name').val();
        var pwd=$('#pwd').val();
        // console.log(name,pwd)
        $.ajax({
           type: "POST",
           url: "<?php echo site_url() ?>/Exam/add",
           data: {name:name,pwd:pwd},
           dataType:'json',
           success: function(msg){
            _tr="";
                for(k in msg){
                    _tr+="<tr>"+
                            "<td>"+msg[k]['id']+"</td>"+
                            "<td>"+msg[k]['name']+"</td>"+
                            "<td del_id='"+msg[k]['id']+"'><input type='button' class='del' value='删除'></td>"+
                        "</tr>"
                }
                $('#box').html(_tr);
           }
        });
    })
    $('.del').click(function(){
        var id=$(this).parent().attr('del_id');
        var _this=$(this);
        $.ajax({
               type: "get",
               url: "<?php echo site_url() ?>/Exam/del",
               data: {id:id},
               dataType:'json',
               success: function(msg){
                if (msg=='ok') {
                    _this.parent().parent().remove();
                };
            }
        });
    })
</script>