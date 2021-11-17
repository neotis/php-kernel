<?php

namespace Neotis\Kernel;


class Hook
{
    private string $name;
    private object $object;

    public function __construct(string $name, object $object)
    {
        $this->object = $object;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getObject(): object
    {
        return $this->object;
    }
}