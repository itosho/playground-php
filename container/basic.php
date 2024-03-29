<?php declare(strict_types=1);

namespace Basic;

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

class Service
{
}

// DI Container
require 'vendor/autoload.php';

use League\Container\Container;

$container = new Container;

$container->add(Service::class);
$container->add('client_alias', Client::class)->addArgument(Service::class);

$client1 = $container->get('client_alias');
$client2 = $container->get('client_alias');

var_dump($client1 instanceof Client); // true
var_dump($client1->service instanceof Service); // true
var_dump($client1 === $client2); //false
