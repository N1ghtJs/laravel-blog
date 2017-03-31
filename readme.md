# Myweb 3
基于 Laravel 5.3 的最新版个人技术博客

[线上地址](http://59.110.137.214/)

# 扩展包
- caouecs/laravel-lang 中文语言包
- doctrine/dbal 数据库迁移支持包
- graham-campbell/markdown Markdown解析器
- intervention/image 图片处理扩展（依赖：Imagick/GD）

# 安装方法（稍后推出更详细的安装方法）
- 安装 homestead 虚拟机
- 克隆代码
- 代码根目录执行 composer install（如果有依赖安装依赖）

# 更新日志

## 03-31

- 【网站上线】
- 【页面】+ 首页、文章详情页
- 【模块】+ 轮播图、最新文章、作者信息、最热文章
- 【后台】
- 【功能】+ 用户注册/登录
- 【扩展】+ DebugBar 
- 【优化】无
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

## 01-09

- 【网站上线】
- 【页面】+ 首页、文章详情页
- 【模块】+ 轮播图、最新文章、作者信息、最热文章
- 【后台】+ 文章管理
- 【功能】+ 用户注册/登录
- 【扩展】+ 中文语言包（实现中文语言支持）
- 【优化】无
- 【其他】无
- 【BUG】无



# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
