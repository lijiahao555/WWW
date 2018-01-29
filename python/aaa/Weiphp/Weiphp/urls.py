"""weiphp URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/2.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.conf.urls import *
from . import login,config,article_style,update,scan,public_bind,weixin

urlpatterns = [
    #展示登录
    url(r'^login$', login.login_post),

    #处理登录
    url(r'^login-do$', login.login_do),

    # 系统控制器
    url(r'^Admin/Config/group$', config.group),
    url(r'^Admin/Config/index$', config.index),

    # 图文样式
    url(r'^Admin/ArticleStyle/lists$', article_style.lists),

    # 在线升级
    url(r'^Admin/Update/index$', update.index),
    url(r'^Admin/Update/delcache$', update.delcache),

    # 扫码登陆
    url(r'^Admin/Scan/index$', scan.index),
    # 一键绑定
    url(r'^Admin/PublicBind/index$', public_bind.index),


    # 微信功能
    url(r'^Admin/weixin/createmenu$', weixin.create_menu),

]
