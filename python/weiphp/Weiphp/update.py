
from django.shortcuts import render,HttpResponse,redirect
from Models.LoginModel.models import Login,WpMenu

def index(request):
    nav = WpMenu.objects.filter(pid=0,place=1).order_by("sort")
    subnav = WpMenu.objects.filter(pid=367).order_by("sort")
    return render(request, 'update/index.html',{'nav':nav,'subnav':subnav})

def delcache(request):
    nav = WpMenu.objects.filter(pid=0,place=1).order_by("sort")
    subnav = WpMenu.objects.filter(pid=367).order_by("sort")
    return render(request, 'update/delcache.html',{'nav':nav,'subnav':subnav})