<?php
require 'vendor/autoload.php';

$router = new App\classes\routeur\Router($_GET['url']);
$router->get('/posts/:slug-:id',function($slug, $id) use($router){echo $router->url('post.show',['id'=> 1, 'slug' => 'salut-les-gens']);}, 'post.show')->with('id', '[0-9]+')->with('slug', '([a-z\-0-9])+');

$router->get('/posts/:id',function($id){echo 'afficher l\'article ' .$id;}) ;

    $router->run();

