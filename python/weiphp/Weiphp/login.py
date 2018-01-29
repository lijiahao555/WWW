#json和随机数模块
import json,random,hashlib
from django.shortcuts import render,HttpResponse,redirect,render_to_response

#引入绘图模块
from PIL import Image, ImageDraw, ImageFont

from Models.LoginModel.models import Login,Member

#注册
def register_post(request):
    if request.POST:
        post = request.POST

        #获取session
        captcha = request.session.get('captcha')

        if captcha != post['captcha']:

            content = {}
            content['content'] = "验证码不正确"
            content['username'] = post['username']
            content['tel'] = post['tel']
            content['name'] = post['name']
            content['email'] = post['email']
            return render(request, 'register/register.html',content)

        else:
            md5 = hashlib.md5()
            md5.update(post['password'].encode("utf8"))
            password = md5.hexdigest()
            #添加到用户表
            res = Login(username=post['username'], password=password)
            res.save()
            id = res.id

            #添加到用户详情表
            result = Member(login_id=id, tel=post['tel'], name=post['name'], email=post['email'])
            result.save()
            member_id = int(result.id)

            if member_id:
                request.session['login_id'] = id
                return redirect('/Admin/weixin/')
            else:
                return render(request, 'register/register.html',{'content': '注册失败'})
    else:

        return render(request, 'register/register.html')

#登录
def login_post(request):
    if request.POST:
        post = request.POST
        md5 = hashlib.md5()
        md5.update(post['password'].encode("utf8"))
        password = md5.hexdigest()

        # 获取session
        captcha = request.session.get('captcha')

        if captcha != post['captcha']:
            content = {}
            content['content'] = "验证码不正确"
            content['username'] = post['username']
            return render(request, 'login/login.html', content)
        else:

            try:
                res = Login.objects.get(username=post['username'], password=password)
                request.session['login_id'] = res.id
                return redirect('/Admin/weixin/')
            except:
                return render(request, 'login/login.html', {'content2':'账号或密码错误'})

    else:
        return render(request, 'login/login.html')

#验证码
def verifycode(request):
    # 定义变量，用于画面的背景色、宽、高
    bgcolor = (random.randrange(20, 100), random.randrange(
               20, 100), 255)
    width = 142
    height = 36
      # 创建画面对象
    im = Image.new('RGB', (width, height), bgcolor)
      # 创建画笔对象
    draw = ImageDraw.Draw(im)
      # 调用画笔的point()函数绘制噪点
    for i in range(0, 100):
        xy = (random.randrange(0, width), random.randrange(0, height))
    fill = (random.randrange(0, 255), 255, random.randrange(0, 255))
    draw.point(xy, fill=fill)
      # 定义验证码的备选值
    str1 = '123456789'
      # 随机选取4个值作为验证码
    rand_str = ''
    for i in range(0, 4):
        rand_str += str1[random.randrange(0, len(str1))]
      # 构造字体对象
    font = ImageFont.truetype('ARLRDBD.TTF', 23)
      # 构造字体颜色
    fontcolor = (255, random.randrange(0, 255), random.randrange(0, 255))
      # 绘制4个字
    draw.text((5, 2), rand_str[0], font=font, fill=fontcolor)
    draw.text((25, 2), rand_str[1], font=font, fill=fontcolor)
    draw.text((50, 2), rand_str[2], font=font, fill=fontcolor)
    draw.text((75, 2), rand_str[3], font=font, fill=fontcolor)
      # 释放画笔
    del draw
      # 存入session，用于做进一步验证
    request.session['captcha'] = rand_str
      # 内存文件操作
    import io
    buf = io.BytesIO()
      # 将图片保存在内存中，文件类型为png
    im.save(buf, 'png')
      # 将内存中的图片数据返回给客户端，MIME类型为图片png
    return HttpResponse(buf.getvalue(), 'image/png')
