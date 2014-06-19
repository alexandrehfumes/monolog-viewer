<?php
    namespace SyonixLogViewer;

    session_start();

    define('APP_PATH', __DIR__ . '/app/');
    define('VENDOR_PATH', __DIR__ . '/vendor/');
    define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
    define('WEB_URL', BASE_URL . 'web/');

    require_once VENDOR_PATH . "autoload.php";
    require_once __DIR__ . '/web/password.php';

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
        echo('home');
    })->name('home');

    $app->get('/clients/:clientSlug/:logSlug', function ($clientSlug, $logSlug) use ($app) {
        $viewer = new \SyonixLogViewer\LogViewer(APP_PATH . 'config/config.json');

        print_r($viewer);

        //TODO get log
        $log = null;


        // $data = new \stdClass();

        // /* Load Logfiles */
        // //if($_SESSION['authenticated'] === true && $viewer->hasLogs()) {
        // if($viewer->hasLogs()) {
        //     if(isset($client) && $viewer->clientExists($client)) $data->client = $client;

        //     if(isset($log) && $viewer->logExists($client, $log)) $data->log = $log;

        //     if(!isset($client)) {
        //         $data->client = $viewer->getFirstClient();
        //     }

        //     if(!isset($log)) {
        //         $data->log = $viewer->getFirstLog($data->client);
        //     }
        // } else {
        //   //TODO there are no logs
        // }

        $app->render('index.html.twig', array(
            'viewer'     => $viewer,
            'log'        => $log,
            'clientSlug' => $clientSlug,
            'logSlug'    => $logSlug
        ));
    })->name('log');

    $app->get('/login', function () use ($app) {
        $app->render('login.html.twig');
    })->name("login");

    $app->post('/login', function () use ($app) {
        //TODO if logged in
        $app->redirect(
            $app->urlFor('home')
        );
    });

    $app->get('/logout', function () use ($app) {
        session_destroy();
        $app->redirect('login');
    })->name("logout");

    $app->get('/install', function () use ($app) {
        if(!is_dir('./secure/pwd')) {
          $app->render('install.html.twig');
        }
        else {
          $app->redirect(
            $app->urlFor('login')
          );
        }
    });

    $app->post('/install', function () use ($app) {
        if($app->request()->post('password') == $app->request()->post('password-repeat')) {
            if(mkdir('./secure/pwd', 0700)) {
                file_put_contents('./secure/pwd/'.uniqid(), password_hash($_POST['password'], PASSWORD_DEFAULT));
            } else {
                //TODO this never happens
                $app->flash('error', 'Could not save the password. Please make sure that the directory <code>/secure</code> is writable.');
            }
        } else {
            $app->flash('error', 'The provided Passwords do not match.');
        }

        $app->render('install.html.twig');
    });

    $app->run();

    die();



    date_default_timezone_set('Europe/Paris');
    setlocale(LC_ALL, 'fr_FR.utf8');




    /* Check Passwd File */
    $checkPasswdFile = false;
    $files = glob("secure/pwd/*");
    if(count($files) == 1) {
        $checkPasswdFile = true;
        $passwordFile = $files[0];
    } else if(count($files) > 1) {
        rmdir('./secure/pwd');
    }

    /* Login */

    if(isset($_POST['login']) && $checkPasswdFile === true) {
        $password = file_get_contents($passwordFile);
        if(password_verify($_POST['password'], $password)) {
            session_regenerate_id(true);
            $_SESSION['authenticated'] = true;
        } else {
            $_SESSION['authenticated'] = false;
        }
    }
