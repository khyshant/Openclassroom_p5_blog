<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classes;

/**
 * Description of newPHPClass
 *
 * @author khysh
 */
class Session
{
    /**
     * Session constructor.
     */
    function __construct(){
    // la Session
    if(session_status() == PHP_SESSION_NONE || session_id() != 'SESSIONBLANCHARD'){
        //ini_set('session.use_trans_sid', 0);
        //ini_set('session.cookie_httponly', 1);
        //ini_set('session.cookie_secure', 1);
        //ini_set('session.use_only_cookies',1);
        //ini_set('session.entropy_length',32);
        //ini_set('session.hash_function','sha256');
        //ini_set('session.hash_bits_per_character',5);
        //ini_set('session.cache_limiter','public');
        session_cache_limiter(false);
        session_name('SESSIONBLANCHARD');
        session_start();
    }
    

    }

}
