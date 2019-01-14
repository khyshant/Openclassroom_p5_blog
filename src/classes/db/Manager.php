<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classes\db;

use \App\classes\routeur\RouterException;

/**
 * Description of Manager
 *
 * @author khysh
 */

class Manager
{

    /**
     * @return \PDO
     */

    public static function getinstance() {
        if ((!isset($db)) || $db == null) {
            try{
                $db = new \PDO('mysql:host=localhost; dbname=blog', 'root', 'root');

            }
            catch(RouterException $e){
                echo $e->getMessage();
            }
        }
        return $db;
    }
}
