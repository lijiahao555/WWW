
from django.shortcuts import render,HttpResponse
from Models.LoginModel.models import Login,WpMenu

#展示登录
def login_post(request):
    return render(request, 'login/login.html')

#处理登录
def login_do(request):
    data = request.POST
    res = Login(username=data['username'], password=data['password'])
    res.save()
    return HttpResponse(data['username'])