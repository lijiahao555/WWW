#json和随机数模块
import json,random,hashlib,urllib.request
from django.shortcuts import render,HttpResponse,redirect

from Models.Auth.models import Auth,Auth_Content
from Models.LoginModel.models import WpMenu

from urllib import request, parse

from urllib.request import urlopen





from django.utils import timezone


#curl类 get post
class curl():
    def get(self):
        response = urlopen(self)
        # access_token = json.loads(response.read())
        access_token = response.read()
        return access_token
    def post(self,data):
        request = urllib.request.Request(self)
        msg = urllib.request.urlopen(self, data).read()
        return msg
    def index(self):
        arr = {}
        arr['nav'] = WpMenu.objects.filter(pid=0, place=1).order_by("sort")
        arr['subnav'] = WpMenu.objects.filter(pid=406).order_by("sort")
        return arr

#微信类
class Wexin(curl):

    # 获取token
    def token_post(self):
        if self.POST:
            post = self.POST
            if post['type']:
                url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx65c96fa613ac4f0e&secret=5a62ea768f0ab48cd9e7a289515ae953"
            else:
                url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" + post[
                    'appid'] + "&secret=" + post['appsecret']

            #调用curl类去获取token
            access_token = curl.get(url)

            # response = urlopen(url)
            # access_token = response.read()
            # access_token = json.loads(response.read())

            return HttpResponse(access_token)
        else:
            arr = {}
            arr = curl.index(self)
            return render(self, 'weixin/token.html', {'nav': arr['nav'], 'subnav': arr['subnav']})

    #微信菜单
    def menu_post(self):
        if  self.POST:
            arr = {}
            for
        else:
            arr = {}
            arr = curl.index(self)
            return render(self, 'weixin/menu.html', {'nav': arr['nav'], 'subnav': arr['subnav']})

    # 微信首页
    def index(self):
        arr = {}
        arr = curl.index(self)
        return render(self, 'weixin/index.html', {'nav': arr['nav'], 'subnav': arr['subnav']})

    # 添加模板
    def add_text_post(self):
        if  self.POST:
            post = self.POST
            content = Auth_Content(content=post['content'])
            content.save()
            if int(content.id):
                return redirect('/Admin/weixin/show_text/')
        else:
            data = Auth_Content.objects.all()
            arr = {}
            arr = curl.index(self)
            return render(self, 'weixin/add_text.html', {'nav': arr['nav'], 'subnav': arr['subnav'], 'data':data})

    # 群发
    def show_text_post(self):
        if  self.POST:
            post = self.POST
            # 群发

            url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=' + post['access_token']
            data = '{"filter":{"is_to_all":true},"msgtype": "text","text": { "content": "' + post['content'] + '"}}'
            data = bytes(data, 'utf8')

            msg = curl.post(url, data)
            return HttpResponse(msg)
        else:
            data = Auth_Content.objects.all()
            arr = {}
            arr = curl.index(self)
            return render(self, 'weixin/show_text.html', {'nav': arr['nav'], 'subnav': arr['subnav'], 'data':data})























        # 群发
        def text_post(request):
            if request.POST:
                post = request.POST
                # data = {'errcode': 420101, 'errmsg': "access_token expired hint: [hEqaCa0407vr31!]"}
                # data = json.dumps(data)
                content = Auth_Content.objects.filter(content=post['content'])
                if content:
                    msg = {'errcode': 'lijiahao', 'errmsg': "模板存在"}
                    return HttpResponse(json.dumps(msg))

                # 群发
                # if post['type']==1:
                url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=' + post['access_token']
                data = '{"filter":{"is_to_all":true},"msgtype": "text","text": { "content": "' + post['content'] + '"}}'
                data = bytes(data, 'utf8')
                msg = curl.post(url, data)
                msg_data = json.loads(msg)

                if msg_data['errcode'] == 0:
                    content = Auth_Content(content=post['content'])
                    content.save()
                    if int(content.id):
                        return HttpResponse(msg)
                else:
                    return HttpResponse(msg)

                #     url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='+ post['access_token']
                #
                #     # open_id = ''
                #     # for v in post:
                #     #     open_id += '"' + v['id'] + '",'
                #     # return HttpResponse(post['id'])
                #
                #
                #     data ='{"touser": {"'+ post['id'].strip('","') +'"} ,"msgtype": "text","text": {"content": '+post['content']+' }}'
                #     # data ={"touser":  post['id'].strip('","') ,"msgtype": "text","text": {"content": post['content'] }}
                #
                #     data = json.dumps(data, ensure_ascii=False)
                #     data = bytes(data, 'utf8')
                #
                #     request = urllib.request.Request(url)
                #     msg = urllib.request.urlopen(url, data).read()
                #     msg_data = json.loads(msg)
                #
                #     if msg_data['errcode'] == 0:
                #         content = Auth_Content(content=post['content'])
                #         content.save()
                #         if int(content.id):
                #             return HttpResponse(msg)
                #     else:
                #         return HttpResponse(msg)


            else:
                data = Auth.objects.all()
                arr = curl.index(request)
                return render(request, 'weixin/text.html', {'nav': arr['nav'], 'subnav': arr['subnav'], 'data': data})
