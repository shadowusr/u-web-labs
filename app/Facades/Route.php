<?php

namespace App\Facades;

use App\Exceptions\InternalServerErrorException;
use App\Exceptions\PageNotFoundException;
use App\Routing\Request;

class Route
{
    /**
     * An array of handlers for certain routes. Example structure: $handlers['get']['/']()
     * @var array $handlers
     */
    private static $handlers;

    /**
     * Dynamically binding routes to their handlers.
     *
     * @param string $httpRequestName
     * @param array $args
     */
    public static function __callStatic($httpRequestName, $args)
    {
        list($route, $handler) = $args;
        self::$handlers[mb_strtolower($httpRequestName)][self::formatRoute($route)] = $handler;
    }

    private static function formatRoute($route) {
        $result = rtrim($route, '/');
        if (empty($result)) {
            $result = '/';
        }
        return $result;
    }

    public static function resolve(Request $request) {
        if (!isset(self::$handlers[$request->method()][$request->path()])) {
            throw new PageNotFoundException();
        }

        if (is_callable(self::$handlers[$request->method()][$request->path()])) {
            return (self::$handlers[$request->method()][$request->path()])();
        } elseif (is_string(self::$handlers[$request->method()][$request->path()])) {
            return self::$handlers[$request->method()][$request->path()];
        }

        throw new InternalServerErrorException();
    }
}