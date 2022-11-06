<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use DI\Container;


require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$container->set('renderer', function () {
    // Параметром передается базовая директория, в которой будут храниться шаблоны
    return new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');
});
$app = AppFactory::createFromContainer($container);
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    return $this->get("renderer")->render($response, "url/index.phtml");
});

$app->get('/{id}', function (Request $request, Response $response, $args) {
    $id = $args["id"];
    return $this->get("renderer")->render($response, "url/index.phtml", ["id" => $id]);
});

$app->run();
