<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}



form p{
    margin-top: 20px;
    width: 100%;
}

form span{
    width: 100px;
    text-align: right;
    display: inline-block;
}

.a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}
</style>


<div class="main">
        <form action="">
        <p>
            <span>手机号：</span>
            <input type="text" name="tel" placeholder="请输入手机号" value="<?=isset($data['tel']) ? $data['tel'] : '';?>">
        </p>
        <p>
            <span>密码：</span>
            <input type="password" name="pwd" placeholder="请输入密码" value="<?=isset($data['pwd']) ? $data['pwd'] : '';?>">
        </p>
        <p>
            <span>确认密码：</span>
            <input type="password" name="pwd2" placeholder="请输入确认密码" value="<?=isset($data['pwd']) ? $data['pwd'] : '';?>">
        </p>
        <p>
              <input type="submit" class="a_button" value="登录">
        </p>
    </form>
</div>