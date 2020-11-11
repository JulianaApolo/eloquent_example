<?php
require_once(realpath(sprintf("%s/../../vendor/autoload.php", __DIR__)));

//Dotenv
$dotenv = new Dotenv\Dotenv(realpath(sprintf("%s/../../", __DIR__)));
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'eloquent_db_server',
    'database'  => 'dev_eloquent',
    'username'  => 'root',
    'password'  => 'eloquent',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
// use Illuminate\Events\Dispatcher;
// use Illuminate\Container\Container;
// $capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
