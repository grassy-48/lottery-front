<?php

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use LotteryFront\Http;
use GuzzleHttp\Exception\BadResponseException;

class StoreController
{
    private $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->http = new Http();
    }

    public function complete(Request $request, Response $response)
    {
        $queryParams = $request->getQueryParams() ?? [];
        $array = [];
        if (!empty($queryParams['user_id']) && !empty($queryParams['code'])) {
            try {
                $pobj = $this->http->post("/users/".$queryParams['user_id']."/points", ['code' => $queryParams['code']]);
                if (empty($pobj)) {
                    $this->app->get('logger')->error("User - Point Object is empty."); 
                    return $response->withRedirect('/error?code=LT0002');
                }
                $parr = $this->http->toArray($pobj);
                $array = [
                    'mail' => $parr['mail'],
                    'point' => $parr['point'],
                ];
            } catch (BadResponseException $e) {
                if ($e->hasResponse()) {
                    $statusCode = $e->getResponse()->getStatusCode();
                    $body = $e->getResponse()->getBody();
                    $this->app->get('logger')->error("API Response error [code: $statusCode, body: $body]");
                }
                return $response->withRedirect('/error?code=LT0002');
            }
        } 
        return $this->app->view->render($response, 'store_complete', $array);
    }

    public function index(Request $request, Response $response)
    {
        $queryParams = $request->getQueryParams() ?? [];
        $array['code'] = '';
        if (!empty($queryParams['code'])) {
            try {
                $obj = $this->http->get('/codes', ['code' => $queryParams['code']]);
                if (empty($obj)) {
                    $this->app->get('logger')->error("Code Object is empty."); 
                    return $response->withRedirect('/error?code=LT0005');
                }
                $array['code'] = $queryParams['code'];
            } catch (BadResponseException $e) {
                if ($e->hasResponse()) {
                    $statusCode = $e->getResponse()->getStatusCode();
                    $body = $e->getResponse()->getBody();
                    $this->app->get('logger')->error("API Response error [code: $statusCode, body: $body]");
                }
                return $response->withRedirect('/error?code=LT0001');
            }
        } 

        return $this->app->view->render($response, 'store', $array);
    }

    public function check(Request $request, Response $response)
    {
        $postParams = $request->getParsedBody() ?? [];
        if (!empty($postParams['code']) && !empty($postParams['mail'])) {
            try {
                $uobj = $this->http->post('/users', [
                    'mail' => $postParams['mail'],
                    'type' => 'participant',
                ]);
                $uarr = $this->http->toArray($uobj);
                $uid = $uarr['user']['id'];
                if (empty($uobj) || (!$uid)) {
                    $this->app->get('logger')->error("User Object is empty."); 
                    return $response->withRedirect('/error?code=LT0006');
                }
                $chobj = $this->http->get("/users/".$uid."/points", ['code' => $postParams['code']]);
                $charr = $this->http->toArray($chobj);
                if (!$charr['canStore']) {
                    return $response->withRedirect('/store/duplicate');
                }
                return $response->withRedirect('/store/complete?user_id='.$uid.'&code='.$postParams['code']);
            }  catch (BadResponseException $e) {
                if ($e->hasResponse()) {
                    $statusCode = $e->getResponse()->getStatusCode();
                    $body = $e->getResponse()->getBody();
                    $this->app->get('logger')->error("API Response error [code: $statusCode, body: $body]");
                }
                return $response->withRedirect('/error?code=LT0006');
            }
        } 
        return $response->withRedirect('/error?code=LT0000');
    }

    public function duplicate(Request $request, Response $response)
    {
        return $this->app->view->render($response, 'store_duplicate');
    }
}

