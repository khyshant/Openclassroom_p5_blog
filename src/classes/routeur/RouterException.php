<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classes\routeur;

use \App\classes\Template;
use App\classes\Tools;

/**
 * Description of RouterException
 *
 * @author khysh
 */
class RouterException extends \Exception{
    //put your code here
    /**
     * @return array
     */
    public static function getErrorMenu(){
        $menu = array(
            'page1' => 'Retour a l\'accueil',
            'lien1' => $_SESSION['basedir'],
        );
        if(Tools::getSessionIsset('adminUser'))
        {
            $menu = array(
                'page1' => 'Retour a l\'accueil',
                'lien1' => $_SESSION['basedir'],
                'page2' => 'Retour a l\'admin',
                'lien2' => $_SESSION['basedir'].'admin/home',
            );

        }
        return $menu;
    }

    public static function requestMethod(){
        $tpl = new Template( 'src/view/frontend/' );
        header('HTTP/1.1 404 Not Found',true,404);
        print $tpl->render( 'errorView', array(
                'basedir' => $_SESSION['basedir'],
                'menu' => self::getErrorMenu(),
                'title' => 'erreur : La methode d\'accès à la page n\'est pas conforme aux attentes',
                'gif' => 'https://media.giphy.com/media/mTVEqOSAp6m1a/giphy.gif',
                'gif_alt' => 'erreur',
                'debug' =>$_SERVER,
            )
        );
    }

     public static function routeMatches(){
         $tpl = new Template( 'src/view/frontend/' );
         header('HTTP/1.1 404 Not Found',true,404);
         print $tpl->render( 'errorView', array(
                 'basedir' => $_SESSION['basedir'],
                 'menu' => self::getErrorMenu(),
                 'title' => 'erreur',
                'content' => 'Aucun chemin ne correspond',
                'gif' => 'https://media.giphy.com/media/mTVEqOSAp6m1a/giphy.gif',
                'gif_alt' => 'erreur',
                 'debug' =>$_SERVER,
            )
        );
    }

    public static function routeMatchesName(){
        $tpl = new Template( 'src/view/frontend/' );
        header('HTTP/1.1 404 Not Found',true,404);
        print $tpl->render( 'errorView', array(
                'basedir' => $_SESSION['basedir'],
                'menu' => self::getErrorMenu(),
                'title' => 'erreur',
                'content' => 'Aucun chemin pour ce nom',
                'gif' => 'https://media.giphy.com/media/mTVEqOSAp6m1a/giphy.gif',
                'gif_alt' => 'erreur',
                'debug' =>$_SERVER,
            )
        );
    }

    /**
     * @param $error
     */
    public static function errorForm($error){
        $tpl = new Template( 'src/view/frontend/' );
        header('HTTP/1.1 404 Not Found',true,404);
        print $tpl->render( 'errorView', array(
                'basedir' => $_SESSION['basedir'],
                'menu' => self::getErrorMenu(),
                'title' => 'erreur',
                'content' => 'Détendez vous, un erreur s\'est produite , nous corrigeons cela au plus vite <br\/> process : '.$error.' . ',
                'gif' => 'https://media.giphy.com/media/mTVEqOSAp6m1a/giphy.gif',
                'gif_alt' => 'erreur',
                'debug' =>$_SERVER,
            )
        );
    }
}
