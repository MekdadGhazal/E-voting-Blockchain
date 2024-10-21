<?php

namespace App\Http\Middleware;

/**
 * Middleware
 * @package Middleware
 */
class Middleware
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
}
