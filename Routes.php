<?php
$config = [
    'settings' => [
        'displayErrorDetails' => true, 
        'renderer'            => [
            'blade_template_path' => __DIR__ . '/views',
            'blade_cache_path'    => __DIR__ . '/cache', 
        ],
        'logger' => [
            'path' => __DIR__ .'/logs/app.log',
            'name' => 'LOTTERY',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];

$app = new \Slim\App($config);

$container = $app->getContainer();

$container['view'] = function ($container) {
    return new \Slim\Views\Blade(
        $container['settings']['renderer']['blade_template_path'],
        $container['settings']['renderer']['blade_cache_path']
    );
};
$container['logger'] = function ($container) {
    $settings = $container['settings']['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//sample
$app->get('/', TopController::class . ':index');

// error
$app->get('/error', TopController::class . ':error');

//entry
$app->post('/entry/qr-code', EntryController::class . ':qrcode');
$app->get('/entry/info/{place}', EntryController::class . ':info');
$app->post('/entry/confirm', EntryController::class . ':confirm');
$app->get('/entry', EntryController::class . ':index');

//store
$app->get('/store/complete', StoreController::class . ':complete');
$app->post('/store/check', StoreController::class . ':check');
$app->get('/store/duplicate', StoreController::class . ':duplicate');
$app->get('/store', StoreController::class . ':index');

//draw
$app->get('/draw/info/{place}/shorted', DrawController::class . ':shorted');
$app->post('/draw/evt/confirm', DrawEvtController::class . ':confirm');
$app->post('/draw/evt/elected', DrawEvtController::class . ':elected');
$app->post('/draw/onl/confirm', DrawOnlController::class . ':confirm');
// NOTE: WebView遷移でtarget="_blank"の際POSTパラメータが消えるためGET遷移
$app->get('/draw/onl/elected', DrawOnlController::class . ':elected');
$app->get('/draw', DrawController::class . ':index');
$app->run();

