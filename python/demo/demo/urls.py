from django.conf.urls import *
from . import view,user

urlpatterns = [
    url(r'^hello$', view.hello),
    url(r'^testdb$', view.testdb),

    #展示登录模板
    url(r'^add$', user.add_post),

    #处理登录
    url(r'^add-do$', user.adddo),

]