<?php

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use LotteryFront\Http;
use GuzzleHttp\Exception\BadResponseException;

class EntryController
{
    private $app;
    private $http;
    private $base;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->http = new Http();
        $this->base="https://ymtk.xyz";
        //$this->base="http://localhost:8080";
    }

    public function qrcode(Request $request, Response $response)
    {
        $postParams = $request->getParsedBody() ?? [];
        try {
            $obj = $this->http->post('/users', $postParams);
            $array = $this->http->toArray($obj);
        } catch (BadResponseException $e) {
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $body = $e->getResponse()->getBody();
                $this->app->get('logger')->error("API Response error [code: $statusCode, body: $body]");
            }
            return $response->withRedirect('/error?code=LT0004');
        }
        $codeimg = [];
        foreach ($array['codes'] as $c) {
            array_push($codeimg,
            ['key' => $c['unique_key'],
            'img' => $this->base."/lottery/img/qr_code/".$c['path']]
        );
        }
        $array['code_img'] = $codeimg;
        return $this->app->view->render($response, 'entry_qr', $array);
    }

    public function info(Request $request, Response $response)
    {
        $place = $request->getAttribute('place');
        $array = [
            'place' => $place,
        ];
        return $this->app->view->render($response, 'entry_info', $array);
    }

    public function confirm(Request $request, Response $response)
    {
        $postParams = $request->getParsedBody() ?? [];
        $array = [
            'mail' => $postParams['mail'],
            'name' => $postParams['name'],
            'circleName' =>$postParams['circleName'], 
            'place' => $postParams['place'],
            'type' => 'creator'
        ];
        return $this->app->view->render($response, 'entry_confirm', $array);
    }

    public function index(Request $request, Response $response)
    {
        return $this->app->view->render($response, 'entry');
    }
}

