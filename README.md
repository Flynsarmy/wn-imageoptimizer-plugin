# Image Optimizer for Winter CMS

Automatically optimizes images on upload/resize.

## Installation

* `git clone` to */plugins/flynsarmy/imageoptimizer*
* `composer update`
* `php artisan plugin:refresh Flynsarmy.ImageOptimizer`

## Description

This plugin uses [spatie/image-optimizer](https://github.com/spatie/image-optimizer) to optimize images on upload and resize. It requires various binaries to be installed on your system to handle the optimizations. At the time of writing this plugin supports the following image types:

* JPG - [JpegOptim](http://freecode.com/projects/jpegoptim)
* PNG - [Pngquant 2](https://pngquant.org/), [Optipng](http://optipng.sourceforge.net/)
* SVG - [SVGo 1](https://github.com/svg/svgo)
* GIF - [Gifsicle](http://www.lcdf.org/gifsicle/)
* WebP - [Cwebp](https://developers.google.com/speed/webp/docs/cwebp)

For full details, see [spatie/image-optimizer](https://github.com/spatie/image-optimizer)

A settings page has been provided at *Backend - Settings - Image Optimizer* which lists supported binaries and whether or not they're installed on the system.

## Command Line

Two artisan commands have been added:

1. `php artisan imageoptimizer:optimizers` lists installed optimizers.
1. `php artisan imageoptimizer:optimizer <filepath>` optimizes an image at a given path.