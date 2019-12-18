<?php declare(strict_types=1);

namespace Advance;

class Client
{
    /**
     * @var ServiceInterface
     */
    public $service;

    /**
     * Constructor Injection
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }
}

interface ServiceInterface
{
}

class CakeService implements ServiceInterface
{
}

class LaravelService implements ServiceInterface
{
}

// DI Container
require 'vendor/autoload.php';

use League\Container\Container;

$container = new Container;

$container->add(ServiceInterface::class, CakeService::class);
$container->add(Client::class)->addArgument(ServiceInterface::class);

$client = $container->get(Client::class);

var_dump($client instanceof Client); // true
var_dump($client->service instanceof ServiceInterface); // true
var_dump($client->service instanceof CakeService); // true
var_dump($client->service instanceof LaravelService); // false
