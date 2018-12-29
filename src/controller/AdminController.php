<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\controller;
use App\classes\Users;
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
     * @param $id
     */
    public function dispatchUser($id)
    {
        if (!isset($_SESSION['adminUser'])) {
            $this->controlAccess();
        } else {
            $user = new Users;
            $user = $user->DisplayUsersList('array');
            if (isset($user[$id])) {
                $this->user($id);
            } else {
                RouterException::routeMatchesName();
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
		$securePwd = Tools::securePwd("BLO_a!b_2704");
		$secureDob = Tools::valideDob('27-04-1977');
		$test = new Users();
		$test->createUser(1,'Blanchard', 'Anthony', 'anth.blanchard@gmail.com', '27-07-1977', $securePwd['pwd'], $securePwd['salt']);
        
        if(!empty($_POST)){
            if(Tools::valideEmail($_POST['login']) == true){
                if(UsersController::controlAccess($_POST['login'],$_POST['password'])){
                    header('location:home');
                }
            }
        }
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'login', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Bienvenue dans l\'espace d\'administration',
                'menu' => $tpl::$adminMenu,
                'contenu' => 'Cliquez dans la navigation pour choisir ce que vous souhaitez faire',
            )
        );
    }

    /**
     * @param $id
     */
    public function page($id){
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
     * @param $id
     */
    public function user($id){
        $display = new Users();
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'updateAccountView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Bienvenue '.$_SESSION['username'],
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'Modifier une Post',
                'contenu' => $display->getUserById($id),
                
            )
        );
    }

    /**
     * @param $id
     */
    public function comment($id){
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
    public function createPage(){
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
    public function createPost(){
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
    public function pageList(){
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
    public function postList(){
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
    public function userList(){
        $display = new Users();
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'listView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'liste des utilisateurs',
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'liste des utilisateur',
                'contenu' => $display->DisplayUsersList("list"),
            )
        );
    }

    /**
     *
     */
    public function commentList(){
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