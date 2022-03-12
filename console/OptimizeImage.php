<?php

namespace Flynsarmy\ImageOptimizer\Console;

use File;
use Flynsarmy\ImageOptimizer\Classes\Optimization;
use Illuminate\Console\Command;

class OptimizeImage extends Command
{
    protected $name = 'imageoptimizer:optimize';
    protected $signature =
        'imageoptimizer:optimize {filepath : Image to be optimized}';
    protected $description = 'Optimize an image';

    public function handle()
    {
        $filepath = $this->argument('filepath');

        if (!File::exists($filepath)) {
            return $this->error("File does not exist.");
        }

        $beforeSize = File::size($filepath);
        Optimization::instance()->getOptimizer()->optimize($filepath);
        $afterSize = File::size($filepath);

        if ($beforeSize === $afterSize) {
            return $this->error("File could not be minified any further.");
        } else {
            $percent = number_format((1 - ($afterSize / $beforeSize)) * 100, 2);
            return $this->info("Filesize reduced by {$percent}%.");
        }
    }
}
