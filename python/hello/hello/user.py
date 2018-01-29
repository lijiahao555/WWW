from django.shortcuts import render,HttpResponse,redirect
from AdminModel.models import Admin
from ContentModel.models import Content


#登录
def add_post(request):
    return render(request, "user/login.html")


def adddo(request):
    name = request.POST['name']
    pwd = request.POST['pwd']

    res = Admin(name=name, pwd=pwd)
    res.save()
    request.session['name'] = name
    return redirect('/show')


def show_post(request):
    name = request.session.get('name')
    return render(request, 'user/show.html', {'name':name})

def show(request):
    content = request.POST['content'];
    name = request.POST['name'];
    res = Content(name=name, content=content)
    res.save()
    return redirect('/list')

def list(request):
    list = Content.objects.all()
    return render(request, 'user/list.html', {'list':list})

def delete(request) :
    id = request.GET['id']
    Content.objects.filter(id=1).delete()
    return redirect('/list')

def update(request):
    id = request.GET['id']
    list = Content.objects.filter(id=id)
    return render(request, 'user/up.html', {'list':list})

def updateone(request):
    id = request.POST['id']
    name = request.POST['name']
    content = request.POST['content']
    test1 = Content.objects.get(id=id)
    test1.name = name
    test1.content = content
    test1.save()
    return redirect('/list')