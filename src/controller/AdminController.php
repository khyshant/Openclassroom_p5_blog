<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\controller;
use App\classes\content\Pages;
use App\classes\content\Posts;
use App\classes\content\Comments;
use App\classes\Users;
use \App\classes\content\Content ;
use \App\classes\Tools ;
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
    public function dispatchPage($id)
    {
        if (!isset($_SESSION['adminUser'])) {
            $this->controlAccess();
        } else {
            $contents = new Content;
            $page = $contents->listContent(1);
            if (isset($page[$id])) {
                $this->page($id,1);
            } else {
                RouterException::routeMatchesName();
            }
        }
    }

    /**
     * @param $id
     */
    public function dispatchPost($id)
    {
        if (!isset($_SESSION['adminUser'])) {
            $this->controlAccess();
        } else {
            $contents = new Content;
            $posts = $contents->listContent(2);
            if (isset($posts[$id])) {
                $this->page($id,2);
            } else {
                RouterException::routeMatchesName();
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
     * @param $id
     */
    public function dispatchComment($id){
        if(!isset($_SESSION['adminUser'])){

            $this->controlAccess();
        }
        else {
            $comment = new Comments;
            $comment = $comment->DisplayCommentList();
            if (isset($comment[$id])) {
                $this->comment($id);
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
            'title' => 'Bienvenue '.$_SESSION['username'],
            'contenu' => 'Cliquez dans la navigation pour choisir ce que vous souhaitez faire',
            )
        );

    }

    /**
     *
     */
    public function controlAccess(){
      /*$securePwd = Tools::securePwd("BLO_a!b_2704");
       $secureDob = Tools::valideDob('27-04-1977');
       $test = new Users();
       $test->createUser(1,'Blanchard', 'Anthony', 'anth.blanchard@gmail.com', '27-07-1977', $securePwd['pwd'], $securePwd['salt']);
        */
        if(!empty($_POST)) {
            if (Tools::isRecaptcha()) {
                if (Tools::valideEmail($_POST['login']) == true) {
                    if (UsersController::controlAccess($_POST['login'], $_POST['password'])) {
                        header('location:home');
                    }
                } else {
                    $content = 'Recaptcha non validé par google';
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
    public function page($id,$type_id){
        $display = new Content();
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'updatePageView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Bienvenue '.$_SESSION['username'],
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'Modifier une page',
                'contenu' => $display->getContentById($id,$type_id),
                'add_a_page' => 'createPage',
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
                'add_a_page' => 'createPage',
            )
        );
    }

    /**
     * @param $id
     */
    public function comment($id){
        $display = new Comments();
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'updateCommentView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Bienvenue '.$_SESSION['username'],
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'Modifier une Post',
                'contenu' => $display->getCommentById($id),
                'add_a_page' => 'createPage',
            )
        );
    }

    /**
     *
     */
    public function createPage(){
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'createPageView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Ajout de page',
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'listing des pages',
                'add_a_page' => 'createPage',
            )
        );
    }

    /**
     *
     */
    public function createPost(){
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'createPageView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Ajout de billet',
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'listing des billets',
                'add_a_post' => 'createPost',
            )
        );
    }

    /**
     *
     */
    public function pageList(){
        $display = new Pages();
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'listView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Bienvenue '.$_SESSION['username'],
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'listing des pages',
                'contenu' => $display->DisplayPageList(),
                'add_a_page' => 'createPage',
            )
        );
    }

    /**
     *
     */
    public function postList(){
        $display = new Posts();
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'listView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'listing des billets',
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'création de page',
                'contenu' => $display->displayPostList(),
                'add_a_post' => 'createPost',
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
        $display = new Comments();
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'listView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'liste des commentaires',
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'liste des utilisateur',
                'contenu' => $display->DisplayCommentList(),
            )
        );
    }


    /**
     *
     */
    public function mediaList(){
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'indexView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'liste des média',
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'création de page',
                'contenu' => 'Cliquez dans la navigation pour choisir ce que vous souhaitez faire',
            )
        );

    }

    /**
     *
     */
    public function addPage(){
        if (Tools::isRecaptcha()) {
            if ($_SESSION['adminUser'] == "authentificate") {
                $title = Tools::secure(strip_tags($_POST['title']));
                $author = Tools::secure($_SESSION['adminId']);
                $chapo = Tools::secure(strip_tags($_POST['chapo']));
                $content = Tools::secure($_POST['content']);
                $meta_title = Tools::secure(strip_tags($_POST['meta_title']));
                $meta_description = Tools::secure(strip_tags($_POST['meta_description']));
                $function = Tools::secure($_POST['function']);
                $comment_auth = 0;
                if (isset($_POST['comment_auth'])) {
                    if ($_POST['comment_auth'] == "on") {
                        $comment_auth = 1;
                    }

                }
                $activate = 0;
                if (isset($_POST['comment_auth'])) {

                    if ($_POST['activate'] == "on") {
                        $activate = 1;
                    }
                }

                $page = new Pages;
                $page->addPage($author, $function, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth, $activate);
                header('location:pageList');
            } else {
                RouterException::errorForm("Vous n'êtes pas authentifié");
            }
        }
        else {
            RouterException::errorForm("Recaptcha invalidé par google");
        }

    }

    /**
     *
     */
    public function addPost(){
        if (Tools::isRecaptcha()) {
            if ($_SESSION['adminUser'] == "authentificate") {
                $title = Tools::secure($_POST['title']);
                $author = Tools::secure($_SESSION['adminId']);
                $chapo = Tools::secure($_POST['chapo']);
                $content = Tools::secure($_POST['content']);
                $meta_title = Tools::secure($_POST['meta_title']);
                $meta_description = Tools::secure($_POST['meta_description']);
                $comment_auth = 0;
                if ($_POST['comment_auth'] == "on") {
                    $comment_auth = 1;
                }
                $activate = 0;
                if ($_POST['activate'] == "on") {
                    $activate = 1;
                }
                $post = new Posts;
                $post->addPost($author, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth, $activate);
                header('location:postList');
            } else {
                RouterException::errorForm("Vous n'êtes pas authentifié");
            }
        }
        else {
            RouterException::errorForm("Recaptcha invalidé par google");
        }
    }

    /**
     *
     */
    public function updatePageOrPost(){
        if (Tools::isRecaptcha()) {
            if($_SESSION['adminUser'] == "authentificate"){
                $id = Tools::secure($_POST['idc']);
                $title = Tools::secure($_POST['title']);
                $author = Tools::secure($_SESSION['adminId']);
                $chapo = Tools::secure($_POST['chapo']);
                $pageContent = Tools::secure($_POST['content']);
                $meta_title = Tools::secure($_POST['meta_title']);
                $meta_description = Tools::secure($_POST['meta_description']);
                $function = Tools::secure($_POST['function']);
                $comment_auth = 0;
                if($_POST['comment_auth'] =="on"){
                    $comment_auth = 1;
                }
                $activate = 0;
                if($_POST['activate'] =="on"){
                    $activate = 1;
                }

                $content = new Content;
                $content->updateContent( $id, $author, $title, $chapo,$pageContent,$meta_title,$meta_description,$comment_auth,$activate, $function );
                header('location:formSubmit');
            }
            else{
                RouterException::errorForm("Vous n'êtes pas authentifié");
            }
        }
        else {
            RouterException::errorForm("Recaptcha invalidé par google");
        }
    }

    /**
     *
     */
    public function formSubmit(){
        $tpl = new Template( 'src/view/admin/' );
        print $tpl->render( 'indexView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Votre formulaire a bien été soumis',
                'menu' => $tpl::$adminMenu,
                'titleSection' => 'Envoi de formulaire',
                'contenu' => 'Votre formulaire a bien été soumis',
            )
        );
    }

    /**
     *
     */
    public function updateUser(){
        if (Tools::isRecaptcha()) {
            if($_SESSION['adminUser'] == "authentificate"){
                $id = Tools::secure($_POST['idu']);
                $comment_auth = 0;
                if($_POST['comment_auth'] =="on"){
                    $comment_auth = 1;
                }
                $user = new Users;
                $user->update( $id, $comment_auth);
               header('location:formSubmit');
            }
            else{
                RouterException::errorForm("Vous n'êtes pas authentifié");
            }
        }
        else {
            RouterException::errorForm("Recaptcha invalidé par google");
        }

    }

    /**
     *
     */
    public function updateComment(){
        if (Tools::isRecaptcha()) {

            if($_SESSION['adminUser'] == "authentificate"){
                $id = Tools::secure($_POST['idc']);
                $comment_auth = 0;
                if($_POST['comment_auth'] =="on"){
                    $comment_auth = 1;
                }
                $comment = new Comments;
                $comment->update( $id, $comment_auth);
                header('location:formSubmit');
            }
            else{
                RouterException::errorForm("Vous n'êtes pas authentifié");
            }
        }
        else {
            RouterException::errorForm("Recaptcha invalidé par google");
        }

    }


}