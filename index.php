<?php
    namespace SyonixLogViewer;

    session_start();


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

    $app->get('/clients/:client/', function ($client) use ($app) {
        $app->render('index.html.twig');
    });

    $app->get('/clients/:client/logs/:log', function ($client, $log) {
        echo "Client : $client, Log : $log";
    });

    $app->get('/login', function () use ($app) {
        $app->render('login.html.twig');
    });

    $app->get('/install', function () use ($app) {
        $app->render('install.html.twig');
    });

    $app->get('/logout', function () use ($app) {
        $_SESSION['authenticated'] = false;
        session_destroy();
        $app->redirect('/login');
    });

    $app->run();

    die();

    require_once __DIR__ . '/web/password.php';


    date_default_timezone_set('Europe/Paris');
    setlocale(LC_ALL, 'fr_FR.utf8');

    $setupNomatch = false;
    $setupFailed = false;
    $setupSuccessful = false;

    $viewer = new \SyonixLogViewer\LogViewer(APP_PATH . 'config/config.json');


    /* Setup login */
    if(isset($_POST['setup'])) {
        if($_POST['password'] == $_POST['password-repeat']) {
            if(is_dir('./secure/pwd')) rmdir('./secure/pwd');
            if(mkdir('./secure/pwd', 0700)) {
                file_put_contents('./secure/pwd/'.uniqid(), password_hash($_POST['password'], PASSWORD_DEFAULT));
                $setupSuccessful = true;
            } else {
                $setupFailed = true;
            }
        } else {
            $setupNomatch = true;
        }
    }

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

    /* Load Logfiles */
    if($_SESSION['authenticated'] === true && $viewer->hasLogs()) {
        $redirect = false;
        if(isset($_GET['c']) && $viewer->clientExists($_GET['c'])) $_SESSION['client'] = $_GET['c'];
        if(isset($_GET['l']) && $viewer->logExists($_GET['c'], $_GET['l'])) $_SESSION['log'] = $_GET['l'];
        if(!isset($_GET['c'])) {
            $_SESSION['client'] = $viewer->getFirstClient();
            $redirect = true;
        }
        if(!isset($_GET['l'])) {
            $_SESSION['log'] = $viewer->getFirstLog($_SESSION['client']);
            $redirect = true;
        }
        if($redirect === true) {
            header("Location: " . BASE_URL . $_SESSION['client'] . "/" . $_SESSION['log']);
        }
    }