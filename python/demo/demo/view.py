# -*- coding: utf-8 -*-

# from django.http import HttpResponse
from django.shortcuts import render


def hello(request):
    context = {}
    context['hello'] = 'hello'
    return render(request, 'hello.html', context)

def testdb(request):
    context = {}
    context['hello'] = 'testdb'
    return render(request, 'hello.html', context)