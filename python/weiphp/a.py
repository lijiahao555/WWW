class a():
    def a1(self,url):
        return (url)


class b(a):
    # print(type(a.a1('aaaa','123')))
    # print(type([1,5]))
    # print(type({1:6,5:5}))

    # a = 'a'
    # b = a if a else 654
    # print(b)
    msg = {'a':1,'b':2, d:{'c':1,'d':2}}
    print(type(msg))
    for v in msg:
        print(v)
        if v=='dict':
            for k in v:
                print(k)



