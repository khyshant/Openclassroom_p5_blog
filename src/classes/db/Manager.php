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
                $db = new \PDO('mysql:host=db761389328.hosting-data.io;dbname=db761389328;charset=utf8', 'dbo761389328', 'BLO_a!b_2704');

            }
            catch(RouterException $e){
                echo $e->getMessage();
            }
        }
        return $db;
    }
}
