<?php
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\classes;
use \App\classes\db\Manager ;
use \App\classes\routeur\RouterException;
/**
 * Description of Users
 *
 * @author khysh
 */

/**
 * Class Users
 * @package App\Classes
 */
class Users {
    //put your code here
    /**
     * @var
     */
    private $_id;
    /**
     * @var
     */
    private $_role;
    /**
     * @var
     */
    private $_password;
    /**
     * @var
     */
    private $_firstname;
    /**
     * @var
     */
    private $_lastname;
    /**
     * @var
     */
    private $_dob;
    /**
     * @var
     */
    private $_dateAdd;
    /**
     * @var
     */
    private $_mail_verified;
    /**
     * @var
     */
    private $_date_upd;
    /**
     * @var
     */
    private $_uniqueId;
    /**
     * @var
     */
    private $_comment_auth;

    /**
     * @var
     */
    private $_email;
    /*hydrate*/
    /**
     * @param array $donnees
     */

    /*Getters*/
    /**
     * @return mixed
     */
    public function id()
    {
      return $this->_id;
    }

    /**
     * @return mixed
     */
    public function role()
    {
      return $this->_role;
    }

    /**
     * @return mixed
     */
    public function password()
    {
        return $this->_password;
    }

    /**
     * @return mixed
     */
    public function firstname()
    {
        return $this->_firstname;
    }

    /**
     * @return mixed
     */
    public function lastname()
    {
        return $this->_lastname;
    }

    /**
     * @return mixed
     */
    public function dob()
    {
    return $this->_dob;
    }

    /**
     * @return mixed
     */
    public function dateAdd()
    {
      return $this->_dateAdd;
    }

    public function comment_auth()
    {
        return $this->_comment_auth;
    }
    /**
     * @return mixed
     */
    public function mail_verified()
    {
      return $this->_mail_verified;
    }

    /**
     * @return mixed
     */
    public function date_upd()
    {
      return $this->_date_upd;
    }

    /**
     * @return mixed
     */
    public function uniqId()
    {
      return $this->_uniqueId;
    }
    
    /*Setters*/

    /**
     * @param $lastname
     */
    public function setLastname($lastname)
    {
        $this->_lastname = $lastname;
    }

    /**
     * @param $firstname
     */
    public function setFirstname($firstname)
    {
        // On vérifie qu'il s'agit bien d'une chaîne de caractères.
        if (is_string($firstname))
        {
          $this->_firstname = $firstname;
        }
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @param $password
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @param $dob
     */
    public function setDob($dob)
    {
        $this->_dob = $dob[0].'-'.$dob[1].'-'.$dob[2];
    }

    /**
     * @param $role
     */
    public function setRole($role)
    {
        if($role == 1 || $role == 2){
            $this->_role = $role;
        }
    }

    /**
     * @param $auth
     */
    public function setCommentAuth($auth)
    {
        if($auth == 0 || $auth == 1){
            $this->_comment_auth = $auth;
        }
    }
    /**
     * @param $uniqueId
     */
    public function setUniqueId($uniqueId)
    {
        $this->_uniqueId = $uniqueId;
    }
    /*hydrate*/

    /**
     * @param $role
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $dob
     * @param $password
     * @param $uniqueId
     */
    Public function createUser($role, $firstname, $lastname, $email, $dob, $password, $uniqueId){
        $db = Manager::getinstance();
        self::setLastname($lastname);
        self::setRole($role);
        self::setFirstname($firstname);
        self::setEmail($email);
        self::setDob($dob);
        self::setPassword($password);
        self::setUniqueId($uniqueId);


        try {
            $sql = "INSERT INTO `user`(`role_id`, `email`, `password`, `firstname`, `lastname`, `Dob`, `uniqid`, `date_add` ) "
                . "VALUES (:role_id,:email, :password, :firstname,:lastname,:Dob,:uniqId, :date_add)";
            $query = $db->prepare($sql);

            $query->bindValue(":role_id", $this->_role, \PDO::PARAM_INT);
            $query->bindValue(":email", $this->_email, \PDO::PARAM_STR);
            $query->bindValue(":password", $this->_password, \PDO::PARAM_STR);
            $query->bindValue(":firstname", $this->_firstname, \PDO::PARAM_STR);
            $query->bindValue(":lastname", $this->_lastname, \PDO::PARAM_STR);
            $query->bindValue(":Dob", $this->_dob, \PDO::PARAM_INT);
            $query->bindValue(":uniqId", $this->_uniqueId, \PDO::PARAM_STR);
            $query->bindValue(":date_add", date('Y-m-d h:i:s'));
            $query->execute();
            $query->errorInfo();
        }
        catch( RouterException $Exception ) {
                // Note The Typecast To An Integer!
            RouterException::errorForm($Exception->getMessage( ).'--'. (int)$Exception->getCode( ));
        }
       
    }
	
	/**
     * @param $id
     */
    Public function getCurrentUser($id){
        $db = Manager::getinstance();

        $users = $db->prepare('SELECT * FROM user WHERE uniqid =":uniqid"  limit 1',\PDO::FETCH_ASSOC);
        $users->bindParam(':uniqid', $id, \PDO::PARAM_STR,40);
               $users->execute();
        $users->fetch(\PDO::FETCH_ASSOC);
        foreach($users as $user){
            $_SESSION['username'] = $user['firstname'] .' '.  $user['lastname'];
        }
    }
	
	    /**
     * @param $id
     * @return string
     */
    Public function getAuthor($id){
        $db = Manager::getinstance();

        $users = $db->prepare('SELECT * FROM user WHERE id =:id  limit 1');
        $users->bindParam(':id', $id, \PDO::PARAM_INT);
        $users->execute();
        $users->fetch(\PDO::FETCH_ASSOC);
        $author ="";
        foreach($users as $user){
            $author = $user['firstname'] .' '.  $user['lastname'];
        }
        return $author;
    }
}
