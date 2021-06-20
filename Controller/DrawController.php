<?php

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class DrawController
{
    private $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function index(Request $request, Response $response)
    {
        $array =[];
        return $this->app->view->render($response, 'draw', $array);
    }
    
    public function shorted(Request $request, Response $response)
    {
        $place = $request->getAttribute('place');
        $array = [
            'place' => $place,
        ];
        return $this->app->view->render($response, 'draw_shorted', $array);;
    }
}

