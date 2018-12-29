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
}