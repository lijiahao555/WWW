
# 网站设置/配置管理app
# @author lian

from django.shortcuts import render,HttpResponse,redirect
from Models.LoginModel.models import Login,WpMenu

# 配置管理
def index(request):
    nav = WpMenu.objects.filter(pid=0,place=1).order_by("sort")
    subnav = WpMenu.objects.filter(pid=367).order_by("sort")

    # nav = na
    # for v in nav:
    #     nav['v']['class'] = 'active current'

    return render(request, 'config/index.html',{'nav':nav,'subnav':subnav})

# 配置管理
def group(request):
    nav = WpMenu.objects.filter(pid=0,place=1).order_by("sort")
    subnav = WpMenu.objects.filter(pid=367).order_by("sort")
    return render(request, 'config/group.html',{'nav':nav,'subnav':subnav})

# def get(request):
#     menus = _get_menu(request)
#     return render(request, 'config/group.html', {'menus':menus})
#
# # 取后台管理对当前用户配置的菜单
# def _get_menu(request):
#     mod_map = {}
#     mod_map['place'] = 1
#     mod_map['is_hide'] = 0
#
#     menus = {}
#     menus = WpMenu.objects.filter(place=mod_map['place'],is_hide=mod_map['is_hide']).order_by("sort")
#     return menus





# # 测试
# def demo(request):
#     # 获取、设置、删除Session中数据
#     # request.session['k1']
#     # request.session.get('k1', None)
#     # request.session['k1'] = '123'
#     # request.session.setdefault('k2', '456')  # 存在则不设置
#     del request.session['k1']
#     return HttpResponse("我是测试:"+request.session['k1'])
