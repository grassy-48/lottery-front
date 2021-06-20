<?php

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class TopController
{
    private $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function index(Request $request, Response $response)
    {
        // $this->app->get('logger')->info("info log"); // - level 3
        // $this->app->get('logger')->warn("warn log"); // - level 2
        // $this->app->get('logger')->error("error log"); // - level 1
        // $this->app->get('logger')->fatal("fatal log"); // - level 0
        return $this->app->view->render($response, 'top');
    }

    public function error(Request $request, Response $response)
    {
        $queryParams = $request->getQueryParams() ?? [];
        $code = $queryParams['code'] ?? 'LT9999';
        $st = 500;
        switch ($code) {
            case 'LT0000':
                $mess = '必要な情報が不足しています。';
                $st = 400;
                break;
            case 'LT0001':
                $mess = '不正なQRコードです。';
                $st = 400;
                break;
            case 'LT0002':
                $mess = 'ポイント付与に失敗しました。';
                break;
            case 'LT0003':
                $mess = '抽選処理に失敗しました。ポイントが減少してる場合はお問い合わせください。';
                break;
            case 'LT0004':
                $mess = 'ユーザー作成に失敗しました。';
                break;   
            case 'LT0005':
                $mess = 'コード取得に失敗しました。';
                break;
            case 'LT0006':
                $mess = 'ユーザー情報の取得に失敗しました。';
                break; 
            default:
                $this->app->get('logger')->fatal("Unexpectedex Error!"); 
                $mess = '予期せぬエラーが発生しました。';
                break;
        }
        return $this->app->view->render($response->withStatus($st), 'error', [
            'code' => $code,
            'message' => $mess,
        ]);
    }
}

