<?php

namespace rfc\ws;

class Router
{

    const TEMPLATE_ROOT = __DIR__ . '/template/';

    public static function run(array $routes, array $_server)
    {
        $template_path = self::template_path( $routes, $_server['REQUEST_URI'] ?? '');

        if (!file_exists($template_path)) {

            self::load(
                self::template_path( $routes, '/404'),
                400
            );
            exit();
        }
        self::load($template_path);
    }

    public static function sanitize_request_uri(string $str): string
    {
        $uri = strtolower(rtrim($str, '/'));
        return empty($uri) ? '/' : $uri;
    }

    private static function template_path(array $routes, string $request_uri): string
    {
        $request_uri   = self::sanitize_request_uri($request_uri);

        $template_file = '';

        if ( isset( $routes[$request_uri] ) ) {
            $template_file = $routes[$request_uri];
        }

        if ( empty( $template_file )) {
            foreach( $routes as $regex => $route_template_file) {
                $regex = str_replace('/', '\/', $regex);

                if ( preg_match( '/'.$regex.'$/', $request_uri ) ) {
                    $template_file = $route_template_file;
                    break;
                }
            }
        }

        if( empty( $template_file ) ) {
            return '';
        }

        return Template::ROOT . $template_file;

    }

    private static function load( string $file_path, int $response_code = 200 ) {
        if ( !file_exists($file_path) ) {
            die();
        }
        http_response_code($response_code);
        require_once $file_path;
        exit();
    }

}