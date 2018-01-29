"""hello URL Configuration

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

from . import user

urlpatterns = [


    #展示登录模板
    url(r'^add$', user.add_post),

    #处理登录
    url(r'^add-do$', user.adddo),

    #展示添加留言
    url(r'^show$', user.show_post),

    #处理添加留言
    url(r'^show-add$', user.show),

    #展示添加留言
    url(r'^list$', user.list),

    # 删除留言
    url(r'^del$', user.delete),

    # 展示修改留言
    url(r'^up$', user.update),

    #处理修改留言
    url(r'^list-up$', user.updateone),
]
