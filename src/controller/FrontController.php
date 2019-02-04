<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\controller;
use \App\classes\Users ;
use \App\classes\Tools ;
use \App\classes\Template;
use App\classes\content\Pages;
use App\classes\content\Posts;
use App\classes\content\Comments;
use \App\classes\content\Content ;
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
                case "Mention" :
                    $this->mention();
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

    /**
     * @param $id
     */
    public function dispatchPost($id){
            $contents = new Content;
            $page = $contents->listContent(2,'front');

            if (isset($page[$id])) {
                $this->post($id);
            } else {
                RouterException::routeMatchesName();
            }
        }

    public function showHome(){
        $display = new Pages();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'pageView', array(
            'basedir' => $_SESSION['basedir'],
            'title' => 'Bienvenue sur mon site',
            'menu' => $tpl::$frontMenu,
            'contenu' => $display->getPageByFn("showHome"),
            )
        );

    }

    public function createAccount(){
          $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'createAccountView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Créez votre compte',
                'menu' => $tpl::$frontMenu,
            )
        );
    }

    public function contactUs(){
        $display = new Pages();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'contactUsView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Contactez moi',
                'menu' => $tpl::$frontMenu,
                //'contenu' => $display->getPageByFn("contactUs"),
            )
        );
    }

    public function seeBlog(){
        $display = new Posts();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'listView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Consultez les articles',
                'menu' => $tpl::$frontMenu,
                'contenu' => $display->displayPostList('front'),
            )
        );
    }

    public function seeCompetence(){
        $display = new Pages();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'pageView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Compétences',
                'menu' => $tpl::$frontMenu,
                'contenu' => $display->getPageByFn("seeCompetence"),
            )
        );
    }

    public function seePortfolio(){
        $display = new Pages();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'pageView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Ce que je connais',
                'menu' => $tpl::$frontMenu,
                'contenu' => $display->getPageByFn("seePortfolio"),
            )
        );
    }

    public function seeMe(){
        $display = new Pages();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'pageView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Qui suis je ?',
                'menu' => $tpl::$frontMenu,
                'contenu' => $display->getPageByFn("seeMe"),
            )
        );
    }
    public function mention(){
        $display = new Pages();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'pageView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Mentions Légales',
                'menu' => $tpl::$frontMenu,
                'contenu' => $display->getPageByFn("mention"),
            )
        );
    }


    public function validAccount(){

        /*$securePwd = Tools::securePwd("BLO_a!b_2704");
               $secureDob = Tools::valideDob('27-04-1977');
               $test = new Users();
               $test->createUser(1,'Blanchard', 'Anthony', 'anth.blanchard@gmail.com', '27-07-1977', $securePwd['pwd'], $securePwd['salt']);
                */
        $secureDob = Tools::valideDob($_POST['dob']);
        $securePwd = Tools::securePwd($_POST['password']);

        if($secureDob != false && $securePwd != false){
            $account = new Users();
            $account->createUser(2,$_POST['firstname'], $_POST['lastname'], $_POST['login'], $secureDob, $securePwd['pwd'], $securePwd['salt']);
        }
        $erreur = "";
        if($secureDob == false){
            $erreur.=" - code erreur D100 - OB - ";
        }
        if($securePwd == false){
            $erreur.="code erreur P100 - WD";
        }
        if($erreur !=""){
            $tpl = new Template( 'src/view/frontend/' );
            print $tpl->render( 'createAccountView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Vous pouvez créer un compte pour commenter les articles',
                'menu' => $tpl::$frontMenu,
                'erreur' => 'erreur durant le transfert du formulaire '.$erreur,
                'contenu' => 'Cliquez dans la navigation pour choisir ce que vous souhaitez faire',
                )
            );
        }
        else{
            echo 'ici';
            // !!! attention au renvoi ==> voir fonction historic =1 de  michel
            header('location:home');
        }

    }

    public function controlAccess(){
        $return = $_POST['idc'];
        if(!empty($_POST)){
            if(Tools::valideEmail($_POST['login']) == true){
                if(UsersController::controlAccess($_POST['login'],$_POST['password'])){
                    header('location: post/'.$return);
                }
                else{
                    RouterException::errorForm("compte invalide");
                }
            }
            else{
                RouterException::errorForm("Mail invalide");
            }
        }
        else{
            RouterException::errorForm("CODE P-100-V");
        }
    }

    /**
     * @param $id
     */
    public function post($id){
        $display = new Content();
        $comments = new Comments();
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'postView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Section blog'  ,
                'menu' => $tpl::$frontMenu,
                'titleSection' => 'Modifier une page',
                'contenu' => $display->getContentById($id,2,'front'),
                'commentaires' => $comments->getCommentByPost($id),
                'return' => 'post/'.$id,
            )
        );
    }

    public function createComment(){
        if(!empty($_POST['comment'])){
            $post_id = Tools::secure($_POST['idc']);
            $author = Tools::secure($_SESSION['adminId']);
            $comment = Tools::secure($_POST['comment']);
            $add = new Comments;
            if($add->addComment($post_id,$author, $comment)){
                header('location:formSubmit');
            }
            else{
                RouterException::errorForm("Echec de soumission");
            }
        }
        else{
            RouterException::errorForm("Echec de soumission");
        }
    }

    public function formSubmit(){
        $tpl = new Template( 'src/view/frontend/' );
        print $tpl->render( 'indexView', array(
                'basedir' => $_SESSION['basedir'],
                'title' => 'Votre formulaire a bien été soumis',
                'menu' => $tpl::$frontMenu,
                'titleSection' => 'Envoi de formulaire',
                'contenu' => 'Votre formulaire a bien été soumis',
            )
        );
    }

    public function messageUs(){
        if(!empty($_POST['Message'])){
            $firstname = Tools::secure($_POST['firstname']);
            $lastname = Tools::secure($_POST['lastname']);
            $email = Tools::secure($_POST['Email']);
            $Message = Tools::secure($_POST['Message']);

            $sujet = 'Un message de votre blog';
            $message = $firstname.' '.$lastname.' à écrit : <br/>'.$Message.' <br/><br/>email : '.$email.' <br/>';

            $destinataire = 'anth.blanchard@gmail.com   ';
            $headers = "From: \"ton blog\"<contact@anthony-blanchard.com>\n";
            $headers .= "Reply-To: contact@anthony-blanchard.com\n";
            $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
            if(mail($destinataire,$sujet,$message,$headers))
            {
                header('location:formSubmit');
            }
            else
            {
                RouterException::errorForm("Echec de soumission");
            }
        }
        else{
            RouterException::errorForm("Echec de soumission");
        }
    }
}