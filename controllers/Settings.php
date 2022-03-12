<?php namespace Flynsarmy\ImageOptimizer\Controllers;

use Backend\Behaviors\ImportExportController;
use Lang;
use Flash;
use Winter\Translate\Models\MessageExport;
use Request;
use BackendMenu;
use Backend\Classes\Controller;
use Winter\Translate\Models\Message;
use Winter\Translate\Models\Locale;
use Winter\Translate\Classes\ThemeScanner;
use System\Helpers\Cache as CacheHelper;
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
