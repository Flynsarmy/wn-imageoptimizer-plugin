<?php

namespace Flynsarmy\ImageOptimizer\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

/**
 * Messages Back-end Controller
 */
class Settings extends Controller
{
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Winter.System', 'system', 'settings');
        SettingsManager::setContext('Flynsarmy.ImageOptimizer', 'settings');
    }

    public function index()
    {
        $this->bodyClass = 'slim-container breadcrumb-flush';
        $this->pageTitle = 'Image Optimizer Settings';
    }
}
