<?php declare(strict_types=1);

namespace App;

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

$container->add('service', Service::class);
$container->add('client', Client::class)->addArgument($container->get('service'));

$client1 = $container->get('client');
$client2 = $container->get('client');

var_dump($client1 instanceof Client); // true
var_dump($client1->service instanceof Service); // true
var_dump($client1 === $client2); //false
