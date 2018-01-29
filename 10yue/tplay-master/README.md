Tplay 1.1
===============

更新说明：

1.新增部分索引

2.新增便签功能

3.新增置顶和审核文章的功能

4.优化部分按钮和表格的表现

5.调整部分页面的打开方式为iframe弹窗

6.重做了新增和修改管理员角色时分配权限的页面部分

7.部分表单页面增加了相应的注释

8.实装了登录后台时记住账号的功能

9.layui版本提升到2.2.5

10.thinkphp版本提升到5.0.14

下次更新：

1.增加第三方登录

2.增加支付

3.增加微信公众号管理

Tplay 1.0
===============


Tplay是一款基于ThinkPHP5.0.13 + layui2.2.45 + Mysql开发的后台管理框架，PHP版本要求提升到5.5。Tplay集成了一般应用所必须的基础性功能，为开发者减少重复性的工作，提升开发速度，规范团队开发模式。

> Tplay的运行环境要求PHP >= 5.5，其余要求参考thinkPHP5的配置要求。

二次开发请参考 [ThinkPHP5完全开发手册](http://www.kancloud.cn/manual/thinkphp5)

## 目录结构

初始的目录结构如下：

~~~
www  WEB部署目录（或者子目录）
├─app           		应用目录
│  ├─admin              Tplay核心目录
│  │  ├─config.php      模块配置文件
│  │  ├─common.php      模块函数文件
│  │  ├─controller      控制器目录
│  │  ├─model           模型目录
│  │  ├─view            视图模板目录
│  │
│  ├─command.php        命令行工具配置文件
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─database.php       数据库配置文件
│
├─public                WEB目录（对外访问目录）
│  ├─static          	css、js等资源目录
│  │   ├─admin          	Tplay后台css、js文件
│  │   ├─public         	公共css、js文件
│  ├─uploads          图片等资源文件
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─thinkphp              框架系统目录
│  ├─lang               语言文件目录
│  ├─library            框架类库目录
│  │  ├─think           Think类库包目录
│  │  └─traits          系统Trait目录
│  │
│  ├─tpl                系统模板目录
│  ├─base.php           基础定义文件
│  ├─console.php        控制台入口文件
│  ├─convention.php     框架惯例配置文件
│  ├─helper.php         助手函数文件
│  ├─phpunit.xml        phpunit配置文件
│  └─start.php          框架入口文件
│
├─extend                扩展类库目录
├─runtime               应用的运行时目录（可写，可定制）
├─vendor                第三方类库目录（Composer依赖库）
├─build.php             自动生成定义文件（参考）
├─composer.json         composer 定义文件
├─LICENSE.txt           授权说明文件
├─README.md             README 文件
├─think                 命令行入口文件
├─tplay.sql             Tplay框架sql文件
~~~

## 安装使用

Tplay的安装非常简单：
					
1.将你下载的程序包放在服务器环境的根目录下

2.将根目录下的tlay.sql文件导入mysql数据库

3.修改/app/database.php文件中的数据库配置信息

4.将你的域名指向根目录下的public目录（重要）

5.浏览器访问：你的域名/admin   默认管理员账户：admin 密码：tplay

6.如果你用到了短信配置，请前往阿里大鱼官网申请下载自己的sdk文件，替换/extend/dayu下的文件，在后台配置自己的appkey即可

如遇问题可在QQ群221470096交流。


## 版权信息

Tplay同ThinkPHP一样，遵循Apache2开源协议发布，并提供免费使用。

本项目包含的第三方源码和二进制文件之版权信息另行标注。

版权所有Copyright © 2017 by Tplay (http://tplay.pengyichen.cn/public/admin)

All rights reserved。
