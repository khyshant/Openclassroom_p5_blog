<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\controller;
use \App\classes\Template;
use \App\classes\routeur\RouterException;

/**
 * Class FrontController
 * @package App\Controller
 */
class FrontController{


    /**
     * @param string $page
     */
    public function dispatch($page="")
    {
        if (empty($page)) {
            $this->showHome();
        } else {
            switch ($page) {
                case "home";
                case "" :
                    $this->showHome();
                    break;
                case "Contact" :
                    $this->contactUs();
                    break;
                case "Blog" :
                    $this->seeBlog();
                    break;
                case "Competences" :
                    $this->seeCompetence();
                    break;
                case "Portfolio" :
                    $this->seePortfolio();
                    break;
                case "Presentation" :
                    $this->seeMe();
                    break;
                case "userAccount" :
                    $this->createAccount();
                    break;
                case "validAccount" :
                    $this->validAccount();
                    break;
                case "controlAccess" :
                    $this->controlAccess();
                    break;
                case "createComment" :
                    $this->createComment();
                    break;
                case "formSubmit" :
                    $this->formSubmit();
                    break;
                case "messageUs" :
                    $this->messageUs();
                    break;
                default :
                    RouterException::routeMatches();
            }
        }
    }


    public function showHome(){
        $display = new Pages();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'pageView', array(
            'basedir' => $_SESSION['basedir'],
            'title' => 'Bienvenue sur mon site',
            'menu' => $tpl::$frontMenu,
            'contenu' => '',
            )
        );

    }

    public function createAccount(){
          $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'createAccountView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Créez votre compte',
                'menu' => '',
            )
        );
    }

    public function contactUs(){
        
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'contactUsView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Contactez moi',
                'menu' => $tpl::$frontMenu,
                'contenu' => '',
            )
        );
    }

    public function seeBlog(){
        
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'listView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Consultez les articles',
                'menu' => $tpl::$frontMenu,
                'contenu' => '',
            )
        );
    }

    public function seeCompetence(){
        
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'indexView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Ce que je crois connaitre',
                'menu' => $tpl::$frontMenu,
                'contenu' => '',
            )
        );
    }

    public function seePortfolio(){
        
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'indexView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Ce que je connais',
                'menu' => $tpl::$frontMenu,
                'contenu' => '',
            )
        );
    }

    public function seeMe(){
        
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'indexView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Qui suis je ?',
                'menu' => $tpl::$frontMenu,
                'contenu' => '',
            )
        );
    }
}