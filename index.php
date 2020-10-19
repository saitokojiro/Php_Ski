<?php
require_once './vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

try
{
    // Load routes from the yaml file
    $fileLocator = new FileLocator(array(__DIR__));
    $loader = new YamlFileLoader($fileLocator);
    $routes = $loader->load('config/routes.yaml');

    // Init RequestContext object
    $request  = Request::createFromGlobals();
    $context = new RequestContext();
    $context->fromRequest($request);

    // Init UrlMatcher object
    $matcher = new UrlMatcher($routes, $context);



    // Find the current route
    $parameters = $matcher->match($context->getPathInfo());

    // How to generate a SEO URL
    $generator = new UrlGenerator($routes, $context);
    $url = $generator->generate('foo');

    $params = explode('::', $parameters['controller']);
    $response = new Response();
    var_dump($context);

    if ($params[0] !== null) {

        $controller = $params[0];
        $action = $params[1];
        //var_dump($action);
        $controller = new $controller();

        if (method_exists($controller, $action)) {

            call_user_func_array([$controller,$action], [$request, $response]);
        } else {
            // On envoie le code réponse 404
            http_response_code(404);
            //$error = "La page recherchée n'existe pas";
            /*$controller = new HomeController();
            $controller->errorPage($error);*/
        }
    }

    echo '<pre>';
    print_r($parameters);

    echo 'Generated URL: ' . $url;
    exit;
}
catch (ResourceNotFoundException $e)
{
    echo $e->getMessage();
}