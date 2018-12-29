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
 * Class AdminController
 * @package App\Controller
 */

/**
 * Class AdminController
 * @package App\Controller
 */
class AdminController
{

    //put your code here

    /**
     * @param $page
     */
    public function dispatch($page)
    {
        if (!isset($_SESSION['adminUser'])) {
            $this->controlAccess();
        } else {
            switch ($page) {
                case "home":
                    $this->showHome();
                    break;
                case "":
                    $this->showHome();
                    break;
                case "formlogin":
                    $this->controlAccess();
                    break;
                case "pageList":
                    $this->pageList();
                    break;
                case "postList":
                    $this->postList();
                    break;
                case "createPage":
                    $this->createPage();
                    break;
                case "createPost":
                    $this->createPost();
                    break;
                case "addPage":
                    $this->addPage();
                    break;
                case "addPost":
                    $this->addPost();
                    break;
                case "updatePageOrPost":
                    $this->updatePageOrPost();
                    break;
                case "updateUser":
                    $this->updateUser();
                    break;
                case "updateComment":
                    $this->updateComment();
                    break;
                case "userList":
                    $this->userList();
                    break;
                case "commentList":
                    $this->commentList();
                    break;
                case "mediaList":
                    $this->mediaList();
                    break;
                case "formSubmit":
                    $this->formSubmit();
                    break;
                default:
                    RouterException::routeMatches();
            }
        }
    }
  
    /**
     *
     */
    public function showHome(){
        //3_1!2_z1c1
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'indexView', array(
            'menu' => $tpl::$adminMenu,
            'basedir' => $_SESSION['basedir'],
            'title' => 'Bienvenue ',
            'contenu' => 'Cliquez dans la navigation pour choisir ce que vous souhaitez faire',
            )
        );

    }

    /**
     *
     */
    public function controlAccess(){
      $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'indexView', array(
            'menu' => $tpl::$adminMenu,
            'basedir' => $_SESSION['basedir'],
            'title' => 'Bienvenue ',
            'contenu' => 'Cliquez dans la navigation pour choisir ce que vous souhaitez faire',
            )
        );
    }
}
