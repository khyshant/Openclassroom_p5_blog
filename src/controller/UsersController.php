<?php


 /* To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\controller;
use \App\classes\db\Manager ;

/**
 * Description of PostsController
 *
 * @author khysh
 */
class UsersController {
    //put your code here
    /**
     * @param $login
     * @param $password
     * @return bool
     */
    public static function controlAccess($login, $password){

        $db = Manager::getinstance();

        $query = $db->prepare('SELECT `id_user`, `firstname`, `lastname`, `uniqId`, `email`, `password`, `role_id`, `comment_auth` FROM user WHERE email = :login');
        $query->bindParam(':login', $login, \PDO::PARAM_STR,255);
        $query->execute();
        $result = $query->fetch(\PDO::FETCH_OBJ);

        if($result) {
            $return = false;
            if (password_verify($password,$result->password)) {
                $_SESSION['username'] = $result->firstname .' '.  $result->lastname;
                $_SESSION['comment_auth']=$result->comment_auth;
                $_SESSION['adminId']= $result->id_user;
                $_SESSION['roleType']= $result->role_id;
                if ($result->role_id==1) {
                    $_SESSION['adminUser']='authentificate';
                }
                $return = true;
            }
        }
        return $return ;
    }

}
