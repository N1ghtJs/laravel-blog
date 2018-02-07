# Laravel-blog
基于 Laravel 5.3 的个人博客系统

演示地址：http://dmmylove.cn:8080

如果你喜欢这个开源项目，记得在右上角点个 star 哦，谢谢：）

2018-02-07更新：这个项目停更了，最近重构了一个新版本的博客：[laravel-blog-v2](https://github.com/SadCreeper/laravel-blog-v2)

# 安装方法（开发环境）

## 安装 homestead 虚拟机

[Homestead 安装与配置文档](http://d.laravel-china.org/docs/5.3/homestead)

## 进入 homestead 虚拟机

```
cd ~/Homestead

vagrant up

vagrant ssh

cd Code
```


## 获取代码

```
git clone https://github.com/SadCreeper/laravel-blog.git
```

## 安装依赖

```
//在项目代码根目录执行
composer install
```

除此之外，因为使用了 intervention/image 图片处理扩展包，还需要单独为该扩展包安装所需依赖，[安装方法参考文档](http://sadcreeper.xyz/article/10)

## 数据库迁移

```
//在项目代码根目录执行
php artisan migrate
```

## 安装 npm 包

```
//在项目代码根目录执行
npm install
```

`npm install` 通常比较慢，甚至卡死，解决办法：

1. 翻墙
2. 使用 cnpm
```
//先安装 cnpm
npm install -g cnpm --registry=https://registry.npm.taobao.org
//之后就可以使用 cnpm install 替代 npm install
cnpm install
```

## 编译静态资源

```
//在项目代码根目录执行
gulp
```

# 安装方法（生产环境）

生产环境的安装方法可参考这篇文章

[在阿里云上部署 Laravel 5.3 （LNMP 环境）](http://dmmylove.space/article/9)

# 扩展包介绍
- caouecs/laravel-lang （中文语言包）
- doctrine/dbal （数据库迁移支持包）
- graham-campbell/markdown （Markdown 解析器）
- intervention/image （图片处理扩展）
- mews/captcha （图片验证码）
- barryvdh/laravel-debugbar （DebugBar 调试工具）

# 更新日志

## 08-04

- 【其他】admin可以回复留言
- 【其他】admin增加了博主标签

## 08-02

- 【优化】留言、评论、回复增加了频率限制，每分钟限制5次
- 【优化】匿名留言增加了提示

## 07-15

- 【BUG】修复了搜索文章结果分页的 BUG

## 04-18

- 【功能】+ 邮件提醒（收到评论、回复、留言后发送邮件提醒）

## 03-31

- 【功能】+ 文章隐藏（只能通过 url 访问）
- 【扩展】+ DebugBar
- 【其他】Markdown ajax 解析请求方式由 get 改为 post（解决了文章过长无法解析的问题）
- 【其他】封面图片如果未上传保存一个默认图片
- 【BUG】修复了连续长数字/字符超出不换行的 BUG

## 03-22

- 【其他】 修改了 markdown 样式
- 【BUG】修复了手机版后台JS不生效的BUG

## 03-21

- 【后台】文章编辑增加预览功能（markdown解析）

## 03-14

- 【功能】文章评论增加回复功能
- 【其他】文章评论去掉了匿名回复
- 【其他】回复后更新评论数

## 03-10

- 【模块】+ 广告位 + 最新留言
- 【功能】+ 文章评论 + 评论数量动态显示
- 【优化】优化了留言表结构（将留言名称由静态改为动态关联）
- 【其他】修改了友情链接
- 【其他】将文章的浏览、评论、时间更改为小图标

## 03-08

- 【后台】文章删除增加了弹出框提醒

## 02-25

- 【其他】添加了 markdown 自定义
- 【BUG】修复了作者信息二维码图片小屏幕超出的BUG
- 【BUG】修复了文章详情页中图片超出的BUG

## 02-24

- 【后台】实现手机自适应

## 02-22

- 【功能】+ 忘记密码找回功能（通过邮箱找回）
- 【扩展】+ 图片验证码
- 【其他】修改 header 巨幕 在手机上换成小图
- 【其他】修改 网站标题后缀

## 02-21

- 【模块】+ 友情链接

## 02-17

- 【页面】+ 留言板
- 【功能】+ 留言
- 【后台】点击文章管理直接跳到文章列表页，简化操作
- 【优化】使用视图合成器绑定侧栏动态数据流，替代重复代码

## 02-16

- 【其他】友好格式时间更改为中文 Carbon 本地化

## 02-15

- 【其他】增加 favicon

## 01-22

- 【功能】+ 图片上传功能
- 【扩展】+ 增加图片处理扩展，支持图片压缩，水印等

## 01-19

- 【BUG】修复注册完成后的跳转错误
- 【其他】首页和后台增加项目跳转按钮（管理员可见）
- 【其他】热门文章模块增加更多文章按钮

## 01-17

- 【BUG】修复文章详情页标题不能动态显示

## 01-10

- 【页面】+ 文章列表页
- 【模块】+ 搜索框
- 【功能】+ 搜索（支持搜索文章标题）
- 【扩展】+ Markdown 解析器（支持 Markdown 语法）

## 2017-01-09

- 【网站上线】
- 【页面】+ 首页、文章详情页
- 【模块】+ 轮播图、最新文章、作者信息、最热文章
- 【后台】+ 文章管理
- 【功能】+ 用户注册/登录
- 【扩展】+ 中文语言包（实现中文语言支持）
- 【优化】无
- 【其他】无
- 【BUG】无
