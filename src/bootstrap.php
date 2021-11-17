<?php

namespace Neotis\Kernel;

trait bootstrap
{
    protected function requireBootstrapFiles(): void
    {
        $main = $this->bootstrapDirectory . DIRECTORY_SEPARATOR . 'main.php';

        if($this->fileSystem->missing($main))
            throw new \Exception('Main file of bootstrap directory is not exist!');
        require_once $main;

        $files = $this->fileSystem->files($this->bootstrapDirectory);

        foreach ($files as $file) {
            if($file->getBasename() !== 'main.php')
                require_once $file;
        }
    }
}