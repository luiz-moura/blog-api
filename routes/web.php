<?php

$routes->group('teste', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->resource('address');
});
