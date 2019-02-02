<?php
require 'vendor/autoload.php';
$dir='http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['PHP_SELF'];
$dir=str_replace('index.php','',$dir);

new \App\classes\Session();
$_SESSION['basedir']=$dir;
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
//ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
//ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements

$router = new App\classes\routeur\Router($_GET['url']);
$router->get('/','Front#dispatch');
$router->get('/admin/','Admin#dispatch');
$router->post('/admin/:page','Admin#dispatch');
$router->get('/admin/:page','Admin#dispatch');
$router->post('/admin/page/:id','Admin#dispatchPage');
$router->get('/admin/page/:id','Admin#dispatchPage');
$router->post('/admin/post/:id','Admin#dispatchPost');
$router->get('/admin/post/:id','Admin#dispatchPost');
$router->post('/admin/user/:id','Admin#dispatchUser');
$router->get('/admin/user/:id','Admin#dispatchUser');
$router->post('/admin/comment/:id','Admin#dispatchComment');
$router->get('/admin/comment/:id','Admin#dispatchComment');
$router->post('/:page','Front#dispatch');
$router->get('/:page','Front#dispatch');
$router->post('/post/:id','Front#dispatchPost');
$router->get('/post/:id','Front#dispatchPost');

/*$router->get('/posts/:slug-:id',function($slug, $id) use($router){echo $router->url('post.show',['id'=> 1, 'slug' => 'salut-les-gens']);}, 'post.show')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9])+');
$router->get('/posts/:id','Posts#show');
$router->get('/posts/:id',function($id){echo 'afficher l\'article ' .$id ;*/
try{
    $router->run();
}catch( \PDOException $Exception ) {
    // Note The Typecast To An Integer!
    $error = new App\classes\routeur\RouterException;
    $error->routeMatches();
}

