# Image Optimizer for Winter CMS

Automatically optimizes images on upload/resize.

## Description

This plugin uses [spatie/image-optimizer](https://github.com/spatie/image-optimizer) to optimize images on upload and resize. It requires various binaries to be installed on your system to handle the optimizations. At the time of writing it supports the following image types:

* JPG - [JpegOptim](http://freecode.com/projects/jpegoptim)
* PNG - [Pngquant 2](https://pngquant.org/), [Optipng](http://optipng.sourceforge.net/)
* SVG - [SVGo 1](https://github.com/svg/svgo)
* GIF - [Gifsicle](http://www.lcdf.org/gifsicle/)
* WebP - [Cwebp](https://developers.google.com/speed/webp/docs/cwebp)

For full details, see [spatie/image-optimizer](https://github.com/spatie/image-optimizer)

A settings page has been provided at *Backend - Settings - Image Optimizer* which lists supported binaries and whether or not they're installed on the system.