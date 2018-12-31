<?php
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\classes\content;

use \App\classes\db\Manager ;
use \App\classes\routeur\RouterException;
use \App\classes\Users ;
/**
 * Description of Comments
 *
 * @author khysh
 */
class Comments {
    //put your code here
    /**
     * @var
     */
    private $_idComment;
    /**
     * @var
     */
    private $_postId;
    /**
     * @var
     */
    private $_author;
    /**
     * @var
     */
    private $_comment;
    /**
     * @var
     */
    private $_dateAdd;
    /**
     * @var
     */
    private $_verified;
    /**
     * @var
     */
    private $_authorized;

    /*Getters*/
    /**
     * @return mixed
     */
    public function idComment()
    {
        return $this->_idComment;
    }

    /**
     * @return mixed
     */
    public function postId()
    {
        return $this->_postId;
    }

    /**
     * @return mixed
     */
    public function author()
    {
        return $this->_author;
    }

    /**
     * @return mixed
     */
    public function comment()
    {
        return $this->_comment;
    }

    /**
     * @return mixed
     */
    public function dateAdd()
    {
        return $this->_dateAdd;
    }

    /**
     * @return mixed
     */
    public function verified()
    {
        return $this->_verified;
    }

    /**
     * @return mixed
     */
    public function authorized()
    {
        return $this->_authorized;
    }

    /**
     * @param mixed $idComment
     */
    public function setId($idComment)
    {
        $this->_idComment = $idComment;
    }

    /**
     * @param mixed postId
     */
    public function setPostId($postId)
    {
        $this->_postId = $postId;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->_comment = $comment;
    }

    /**
     * @param mixed $dateAdd
     */
    public function setDateAdd($dateAdd)
    {
        $this->_dateAdd = $dateAdd;
    }

    /**
     * @param mixed $verified
     */
    public function setVerified($verified)
    {
        $this->_verified = $verified;
    }

    /**
     * @param mixed $authorized
     */
    public function setAuthorized($authorized)
    {
        $this->_authorized = $authorized;
    }

    /**
     * @param $postId
     * @param $author
     * @param $comment
     * @return bool
     */
    
}
