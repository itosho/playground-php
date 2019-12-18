<?php declare(strict_types=1);

namespace Playground;

class Client
{
    /**
     * @var Service
     */
    public $service;

    /**
     * Constructor Injection
     *
     * @param Service $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
