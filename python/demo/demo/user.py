from django.shortcuts import render
from django.http import HttpResponse
from django.shortcuts import render_to_response

from User2Model.models import User2

#登录
def add_post(request):
    return render(request, "User/login.html")

#处理登录
def adddo(request):
    data = {}

    name = request.POST['name']
    pwd = request.POST['pwd']

    user = User2.objects.filter(name = name, pwd = pwd)

if isinstance(user, list)
    print(1)
else:
    print(2)