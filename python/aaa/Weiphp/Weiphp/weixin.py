from django.shortcuts import render,HttpResponse,redirect
from Models.LoginModel.models import Login,WpMenu

def create_menu(request):
    nav = WpMenu.objects.filter(pid=0, place=1).order_by("sort")
    subnav = WpMenu.objects.filter(pid=367).order_by("sort")
    return render(request, 'createmenu/createmenu.html', {'nav': nav, 'subnav': subnav})