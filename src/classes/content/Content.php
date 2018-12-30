<?php
namespace App\classes\content;


use \App\classes\Users ;
use \App\classes\db\Manager ;
use \App\classes\routeur\RouterException ;

/**
 * Description of PostsController
 *
 * @author khysh
 */

class Content {
    /**
     * @var
     */
    private $_id;
    /**
     * @var
     */
    private $_type;
    /**
     * @var
     */
    private $_author;
    /**
     * @var
     */
    private $_function;
    /**
     * @var
     */
    private $_chapo;
    /**
     * @var
     */
    private $_content;
    /**
     * @var
     */
    private $_meta_title;
    /**
     * @var
     */
    private $_meta_description;
    /**
     * @var
     */
    private $_comment_auth;
    /**
     * @var
     */
    private $_dateAdd;
    /**
     * @var
     */
    private $_date_upd;

    /**
     * @var
     */
    private $_title;



    /*Getters*/
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @return mixed
     */
    public function getFunction()
    {
        return $this->_function;
    }
    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @return mixed
     */
    public function getChapo()
    {
        return $this->_chapo;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->_meta_title;
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        return $this->_meta_description;
    }

    /**
     * @return mixed
     */
    public function getCommentAuth()
    {
        return $this->_comment_auth;
    }

    /**
     * @return mixed
     */
    public function getDateAdd()
    {
        return $this->_dateAdd;
    }

    /**
     * @return mixed
     */
    public function getDateUpd()
    {
        return $this->_date_upd;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /*Setters*/
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    /**
     * @param mixed $function
     */
    public function setFunction($function)
    {
        $this->_function = $function;
    }
    /**
     * @param mixed $chapo
     */
    public function setChapo($chapo)
    {
        $this->_chapo = $chapo;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->_content = $content;
    }

    /**
     * @param mixed $meta_title
     */
    public function setMetaTitle($meta_title)
    {
        $this->_meta_title = $meta_title;
    }

    /**
     * @param mixed $meta_description
     */
    public function setMetaDescription($meta_description)
    {
        $this->_meta_description = $meta_description;
    }

    /**
     * @param mixed $comment_auth
     */
    public function setCommentAuth($comment_auth)
    {
        $this->_comment_auth = $comment_auth;
    }

    /**
     * @param mixed $dateAdd
     */
    public function setDateAdd($dateAdd)
    {
        $this->_dateAdd = $dateAdd;
    }

    /**
     * @param mixed $date_upd
     */
    public function setDateUpd($date_upd)
    {
        $this->_date_upd = $date_upd;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

}
