<?php

namespace Neotis\Kernel;

trait bootstrap
{
    private function requireBootstrapFiles(): void
    {
        $main = $this->bootstrapDirectory . DIRECTORY_SEPARATOR . 'main.php';

        if($this->fileSystem->missing($main))
            throw new \Exception('Main file of bootstrap directory is not exist!');
        require_once $main;

        foreach ($this->bootstrapDirectory as $key => $value) {
            require_once $value;
        }
    }

    protected function requireBootstraps(): void
    {
        $this->requireBootstrapFiles();
    }
}