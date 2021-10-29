<?php /** @noinspection ALL */

namespace Neotis\Kernel;

use Neotis\Filesystem\File;
use Neotis\Exception\Exception;

class Kernel
{
    use bootstrap;

    private File $fileSystem;
    private static Kernel $instance;
    private array $positions;
    private string $bootstrapDirectory;

    private function __construct(string $bootstrapDirectory)
    {
        $this->bootstrapDirectory = $bootstrapDirectory;
        $this->fileSystem = new File();
    }

    public static function getInstance(string $bootstrapDirectory = ''): Kernel
    {
        if (!isset(self::$instance)) {
            self::$instance = new Kernel($bootstrapDirectory);
        }
        return self::$instance;
    }

    public function hook(string $name, Object $object, $replace = false)
    {
        $this->positions[] = (new Hook($name, $object));
    }

    public function fire(): void
    {
        $this->requireBootstrapFiles();

        try {
            foreach ($this->positions as $object) {
                //(new $object)->start();
            }
        } catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}