<?php

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use LotteryFront\Http;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class DrawEvtController
{
    private $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->http = new Http();
    }

    public function confirm(Request $request, Response $response)
    {
        $postParams = $request->getParsedBody() ?? [];
        $array = [];
        if (empty($postParams['mail'])) {
            $this->app->get('logger')->error("mail is empty."); 
            return $response->withRedirect('/error?code=LT0000'); 
        }
            try {
                $uobj = $this->http->get('/users', [
                    'mail' => $postParams['mail'],
                ]);
                $uarr = $this->http->toArray($uobj);
                $uid = $uarr['user']['id'];
                if (empty($uobj) || (!$uid)) {
                    $this->app->get('logger')->error("User Object is empty."); 
                    return $response->withRedirect('/error?code=LT0006');
                }
                $rcobj = $this->http->get('/users/'.$uid.'/draw');
                $rcarr = $this->http->toArray($rcobj);
                if (empty($rcarr) || !$rcarr['canDraw']) {
                    $this->app->get('logger')->info("User point is lacked. [Uid: $uid]");  
                    return $response->withRedirect('/draw/info/evt/shorted');   
                }

                $array = [
                    'user' => $rcarr['user']
                ];
            } catch (BadResponseException $e) {
                if ($e->hasResponse()) {
                    $statusCode = $e->getResponse()->getStatusCode();
                    $body = $e->getResponse()->getBody();
                    $this->app->get('logger')->error("API Response error [code: $statusCode, body: $body]");
                }
                return $response->withRedirect('/error?code=LT0006');
            }
        return $this->app->view->render($response, 'draw_evt_confirm', $array);
    }

    public function elected(Request $request, Response $response)
    {
        $postParams = $request->getParsedBody() ?? [];
        $array = [];
        if (empty($postParams['user_id']) || $postParams['user_id'] === 0) {
            $this->app->get('logger')->error("user_id is empty."); 
            return $response->withRedirect('/error?code=LT0000');          
        } 
            try {
                $uid =$postParams['user_id'];
                $rcobj = $this->http->get('/users/'.$uid.'/draw');
                $rcarr = $this->http->toArray($rcobj);
                if (empty($rcarr) || !$rcarr['canDraw']) {
                    $this->app->get('logger')->info("User point is lacked. [Uid: $uid]");  
                    return $response->withRedirect('/draw/info/evt/shorted');   
                }
                $uobj = $this->http->patch('/users/'.$uid.'/draw/evt');
                $uarr = $this->http->toArray($uobj);
                if (empty($uarr)) {
                    $this->app->get('logger')->error("User Object is empty."); 
                    return $response->withRedirect('/error?code=LT0003');
                }
                $array = [
                    'user' => $uarr
                ];
            } catch (BadResponseException $e) {
                if ($e->hasResponse()) {
                    $statusCode = $e->getResponse()->getStatusCode();
                    $body = $e->getResponse()->getBody();
                    $this->app->get('logger')->error("API Response error [code: $statusCode, body: $body]");
                }
                return $response->withRedirect('/error?code=LT0003');
            }
        return $this->app->view->render($response, 'draw_evt_elected', $array);
   }
}

