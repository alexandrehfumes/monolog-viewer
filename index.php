<?php
    namespace SyonixLogViewer;

    define('APP_PATH', __DIR__ . '/app/');
    define('VENDOR_PATH', __DIR__ . '/vendor/');
    define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
    define('WEB_URL', BASE_URL . 'web/');

    require_once VENDOR_PATH . "autoload.php";

    $app = new \Slim\Slim(array(
        'view' => new \Slim\Views\Twig()
    ));

    $view = $app->view();
    $view->parserOptions = array(
        'debug' => true,
        'cache' => APP_PATH . 'cache'
    );

    $view->parserExtensions = array(
        new \Slim\Views\TwigExtension(),
    );

    $app->get('/', function () use ($app) {
        $viewer = new \SyonixLogViewer\LogViewer(APP_PATH . 'config/config.json');

        $clientSlug = $viewer->getFirstClient();
        $logSlug  = $viewer->getFirstLog($clientSlug);

        $log = $viewer->getLog($clientSlug, $logSlug);

        $lines = array();

        if ($log->getLines()) {
          foreach($log->getLines() as $id => $line) {
               $lines[] = $line;
          }
        }

        $app->render('index.html.twig', array(
            'viewer'     => $viewer,
            'lines'      => $lines,
            'clientSlug' => $clientSlug,
            'logSlug'    => $logSlug
        ));
    })->name('home');

    $app->get('/clients/:clientSlug/:logSlug', function ($clientSlug, $logSlug) use ($app) {
        $viewer = new \SyonixLogViewer\LogViewer(APP_PATH . 'config/config.json');

        $log = $viewer->getLog($clientSlug, $logSlug);

        $lines = array();

        if ($log->getLines()) {
          foreach($log->getLines() as $id => $line) {
               $lines[] = $line;
          }
        }

        $app->render('index.html.twig', array(
            'viewer'     => $viewer,
            'lines'      => $lines,
            'clientSlug' => $clientSlug,
            'logSlug'    => $logSlug
        ));
    })->name('log');

    $app->run();