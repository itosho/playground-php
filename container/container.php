<?php declare(strict_types=1);

use Playground\Client;
use Playground\Service;

require 'vendor/autoload.php';

$container = new League\Container\Container;

$container->add('client', Client::class)->addArgument(Service::class);
$container->add('service', Service::class);

$client = $container->get('client');

var_dump($client->service);
