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

## 01-09

- 【网站上线】
- 【新页面】首页，文章详情页
- 【首页】增加轮播图、最新文章
- 【侧栏】增加作者信息、最热文章
- 【管理后台】增加文章管理
- 【功能】增加用户注册/登录
- 【扩展】增加中文语言包，实现中文语言支持


## 01-10

- 【新页面】文章列表页
- 【导航栏】增加搜索框
- 【功能】增加搜索（支持搜索文章标题）
- 【扩展】增加 Markdown 解析器，支持 Markdown 语法

## 01-17

- 【BUG】修复文章详情页标题不能动态显示

## 01-19

- 【导航栏】添加跳转管理后台按钮
- 【管理后台】添加跳转首页按钮
- 【首页】热门文章模块增加更多文章按钮
- 【BUG】修复注册完成后的跳转错误

## 01-22

- 【功能】增加图片上传功能
- 【扩展】增加图片处理扩展，支持图片压缩，水印等

## 02-15

- 【标签】增加 favicon

## 02-16

- 【时间】友好格式时间更改为中文 Carbon 本地化 



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
