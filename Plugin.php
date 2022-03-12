<?php

namespace Flynsarmy\ImageOptimizer;

use Backend;
use Event;
use Flynsarmy\ImageOptimizer\Classes\Optimization;
use Flynsarmy\ImageOptimizer\Console\OptimizeImage;
use Flynsarmy\ImageOptimizer\Console\Optimizers;
use System\Classes\MediaLibrary;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    // Make this plugin run on updates page
    public $elevated = true;

    public $require = ['Winter.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Image Optimizer',
            'description' => 'Optimizes images automatically on upload/resize',
            'author'      => 'Flynsarmy',
            'icon'        => 'icon-file-image-o'
        ];
    }

    public function registerPermissions()
    {
        return [
            'flynsarmy.imageOptimizer.access_settings' => [
                'tab'   => 'Flynsarmy',
                'label' => 'Image Optimizer - Manage Settings'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Image Optimizer',
                'description' => 'Manage image optimization settings.',
                'icon'        => 'icon-file-image-o',
                'url'         => Backend::url('flynsarmy/imageoptimizer/settings'),
                'order'       => 600,
                'permissions' => ['flynsarmy.imageOptimizer.access_settings'],
            ]
        ];
    }

    public function boot()
    {
        // Register CLI comamnds
        $this->registerConsoleCommand('flynsarmy.imageoptimizer.optimize-image', OptimizeImage::class);
        $this->registerConsoleCommand('flynsarmy.imageoptimizer.optimizers', Optimizers::class);

        // Automatically optimize images on upload
        Event::listen('media.file.upload', function (
            \Backend\Widgets\MediaManager $mediaWidget,
            string $path,
            \Symfony\Component\HttpFoundation\File\UploadedFile $uploadedFile
        ) {
            $fullpath =
                base_path(rtrim(\Config::get('cms.storage.media.path', '/storage/app/media'), '/')) .
                $path;
            Optimization::instance()->getOptimizer()->optimize($fullpath);
        });

        Event::listen('system.resizer.afterResize', function (
            \System\Classes\ImageResizer $resizer,
            string $localTempPath
        ) {
            Optimization::instance()->getOptimizer()->optimize($localTempPath);
        });
    }
}
