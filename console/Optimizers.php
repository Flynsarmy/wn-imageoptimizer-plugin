<?php

namespace Flynsarmy\ImageOptimizer\Console;

use Illuminate\Console\Command;
use Flynsarmy\ImageOptimizer\Classes\Optimization;

class Optimizers extends Command
{
    protected $name = 'imageoptimizer:optimizers';
    protected $signature =
        'imageoptimizer:optimizers';
    protected $description = 'List installed/supported optimizers';

    public function handle()
    {
        $installed = Optimization::instance()->checkOptimizers();

        $rows = [];
        foreach ($installed as $binary => $isInstalled) {
            $rows[] = [$binary, $isInstalled ? 'Yes' : 'No'];
        }

        $this->table(
            ['Binary', 'Installed?'],
            $rows
        );
    }
}
