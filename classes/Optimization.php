<?php

namespace Flynsarmy\ImageOptimizer\Classes;

use Spatie\ImageOptimizer\OptimizerChain;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Symfony\Component\Process\Process;
use Winter\Storm\Support\Traits\Singleton;

class Optimization
{
    use Singleton;

    protected OptimizerChain $optimizerChain;

    public function getOptimizer(): OptimizerChain
    {
        if (!isset($this->optimizerChain)) {
            $this->optimizerChain = OptimizerChainFactory::create();
            $this->optimizerChain->useLogger(app('log'));
        }

        return $this->optimizerChain;
    }

    /**
     * Returns a list of supported optimizers and whether they're installed
     *
     * @return array<bool> [binaryPath => isInstalled, ...]
     */
    public function checkOptimizers(): array
    {
        $optimizerChain = OptimizerChainFactory::create();

        $optimizers = $optimizerChain->getOptimizers();
        $binaries = [];

        foreach ($optimizers as $optimizer) {
            $binaryPath = $optimizer->binaryPath . $optimizer->binaryName;

            $process = Process::fromShellCommandline("which $binaryPath");

            $process->run();

            $binaries[$binaryPath] = $process->isSuccessful();
        }

        return $binaries;
    }
}
