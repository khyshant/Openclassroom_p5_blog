<?php


namespace App\classes;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class Tools
 * @package App\classes
 */
class Tools {

    /**
     * @param $key
     * @return bool
     */
    public static function getIsset($key)
    {
        if (!isset($key) || empty($key) || !is_string($key)) {
            return false;
        }
        return isset($_POST[$key]) ? true : (isset($_GET[$key]) ? true : false);
    }

    /**
     * @param $key
     * @return bool
     */
    public static function getSessionIsset($key)
    {
        if (!isset($key) || empty($key) || !is_string($key)) {
            return false;
        }
        return isset($_SESSION[$key]) ? true : false;
    }
    /**
     * @param $key
     * @param bool $default_value
     * @return bool|string
     */
    public static function getValue($key, $default_value = false)
    {
        if (!isset($key) || empty($key) || !is_string($key)) {
            return false;
        }

        $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default_value));

        if (is_string($ret)) {
            return stripslashes(urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret))));
        }

        return $ret;
    }

       /**
     * @param $string
     * @return int|string
     */
    public static function secure($string)
    {
        // On regarde si le type de string est un nombre entier (int)

        if(ctype_digit($string))
        {
            $string = intval($string);
        }
        // Pour tous les autres types
        else
        {
            $string = addcslashes($string, '%_');
        }
        return $string;
    }

    // Données sortantes

    /**
     * @param $string
     * @return string
     */
    public static function html($string)
    {
        return htmlentities($string);
    }

   /*
    Vérifie la validité d'une adresse email
    bool valideEmail( string $email )
    Analyse la syntaxe de l'$email et vérifie l'existence d'un serveur MX sur le nom de domaine extrait de l'adresse email
    */
    /**
     * @param $email
     * @return bool
     */
    public static function valideEmail($email){
        $return = FALSE;
        $nom = '[-\._a-zA-Z0-9]+';
        $car_domaine = '[-a-zA-Z0-9]';
        $domaine = "($car_domaine{1,63}\.)+$car_domaine{2,10}";
        $motif = "/^$nom@($domaine)$/";

        if(preg_match($motif,$email,$t)){
            // Si la fonction checkdnsrr existe (sauf windows)
            if(function_exists('checkdnsrr')){
                if(checkdnsrr($t[1],'MX')){
                    $return = TRUE;
                }
            }
            // sinon on se contente de la seule vérification de la syntaxe
            else{
                $return = TRUE;
            }
        }
        return $return;
    }

    /**
     * @param $nom
     * @return bool
     */
    public static function valideNom($nom){
    $return=FALSE;
    $efface = array( "==", "\"","1", "%", ".", );
    $nom= str_replace($efface, "", $nom);

    $motif ='#^[éèàça-zA-Z]+([ \'-][éèàçaa-zA-Z]+)*$#'; // sans limite de nombre particules
    if(preg_match($motif,$nom)){
        $return = TRUE;
    }
    echo $return;
    return $return;
}

    /**
     * @param $valider
     * @return bool
     */
    public static function valideSoumission($valider){
    $efface = array("CREATE", "ERASE", "UPDATE", "FROM", "WHERE", "SELECT", "\'", "==", "null","\"","1", "AND", "OR", "%", ".", "");
    $CLEAN['soumission'] = str_replace($efface, "", $valider);
    $motif ='#^Envoyer$#'; // sans limite de nombre particules
        if(preg_match($motif,$CLEAN['soumission'])){
            $return = TRUE;
        }
        else{
            $return = FALSE;
        }
            return $return;
    }

    /**
     * @param $img
     * @return bool
     */
    public static function valideImage($img){
        $return=FALSE;
        $extensions_autorisees = array('jpg','jpeg','png','gif');
        // Extraire l'extention du nom d'origine du fichier reçu et passage en minuscule
        $extension = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));

        // Si l'extention fait partie de la liste des extensions autorisées
         if(in_array($extension,$extensions_autorisees)){
            if(getimagesize($img['tmp_name'])){
                    $return= TRUE;
            }
        }
        return $return;
    }

    /**
     * @param $numero
     * @return bool
     */
    public static function valideNumero($numero){
        $return=FALSE;
        $numero=intval($numero);
        if($numero!=0){
            $return=TRUE;
        }
        return $return;
    }

    /**
     * @param $clean
     * @return string
     */
    public static function  SecureClean($clean){
        $secure = htmlspecialchars($clean);
        $secure = trim($secure);
    return $secure;
    }

    /**
     * @param $password
     * @return array
     */
    public static function securePwd($password){
        $pass = array();
        $salt = uniqId().uniqId();
        $pass['salt'] = $salt;
        $options = [
            'cost' => 12,
            'salt' => $salt
        ];

        $pass['pwd'] = password_hash($password, PASSWORD_BCRYPT, $options);
        if(password_verify($password,$pass['pwd'])){
            return $pass;
        }
        return false;

    }

    /**
     * @param $dob
     * @return array|bool
     */
    public static function valideDob($dob){
        $birth = explode("-",$dob);
        if(checkdate($birth[1],$birth[2],$birth[0]))
        {
           return $birth;
        }
        return false;
    }

    public static function isRecaptcha(){
        $data = array(
            'secret' => "6Lc5a40UAAAAAEUtCgF_OyxMpKcu16bIjvbdSmC3",
            'response' => $_POST['g-recaptcha-response']
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $response = json_decode($response, true);
        if(isset($response) && $response['success'] ==true){
            return true;
        }
        else{
            return false;
        }
    }
}
