from django.shortcuts import render,HttpResponse,redirect


#展示添加
def add_post(request):
    return render(request, 'login/login.html')

#处理添加
def add_do(request) :
    data = request.POST
    data['appid'] = 'lijiahao'
    #data['appsecret'] = base64.encodestring()
    return HttpResponse(data['j2'])
