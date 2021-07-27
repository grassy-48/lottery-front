<?php

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use LotteryFront\Http;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;

class DrawController
{
    private $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->http = new Http();
    }

    public function index(Request $request, Response $response)
    {
        $array = [];
            try {
                $rcobj = $this->http->get('/gifts');
                $rcarr = $this->http->toArray($rcobj);
                if (empty($rcarr) || !$rcarr['canDraw']) {
                    $this->app->get('logger')->info("Valid Gifts is lack!");  
                    return $this->app->view->render($response, 'close', $array);  
                }
            } catch (BadResponseException $e) {
                if ($e->hasResponse()) {
                    $statusCode = $e->getResponse()->getStatusCode();
                    $body = $e->getResponse()->getBody();
                    $this->app->get('logger')->error("API Response error [code: $statusCode, body: $body]");
                }
                return $response->withRedirect('/error?code=LT9999');
            } catch (ConnectException $e) {
                $this->app->get('logger')->error("API Response error [Unexpected Response]");
                return $response->withRedirect('/error?code=LT9999');
            }
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

