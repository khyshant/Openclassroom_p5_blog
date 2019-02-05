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
    public function addComment($postId, $author, $comment)
    {
        $db = Manager::getinstance();
        $add=new Comments();
        $add->setPostId($postId);
        $add->setAuthor($author);
        $add->setComment($comment);
        $add->setDateAdd(date("Y-m-d H:i:s"));
        $add->setAuthorized(0);


        try {
            $sql = "INSERT INTO `comments`(`post_id`, `author`, `comment`, `date_add`, `authorized`) VALUES (:post_id, :author, :comment, :date_add,:authorized)";
            //$sql = 'UPDATE `comments` SET  `post_id`=:post_id ,  `author`=:author, `comment`=:comment, `date_add`=:date_add, `verified`=:verified, `meta_title`=:meta_title, `meta_description`=:meta_description, `comment_auth`=:comment_auth, `date_upd`=:date_update WHERE `id` = :id';
            $query = $db->prepare($sql);
            $query->bindValue(":post_id", $add->postId(), \PDO::PARAM_INT);
            $query->bindValue(":author", $add->author(), \PDO::PARAM_INT);
            $query->bindValue(":comment", $add->comment(), \PDO::PARAM_STR);
            $query->bindValue(":date_add", $add->dateAdd(), \PDO::PARAM_STR);
            $query->bindValue(":authorized", $add->authorized(), \PDO::PARAM_STR);
            $query->execute();
            return true ;
        } catch (RouterException $Exception) {
            // Note The Typecast To An Integer!
            RouterException::errorForm("création de commentaire");
        }
        RouterException::errorForm("création de commentaire V2");
    }


    /**
     * @param $id_post
     * @return array
     */
    public function getCommentByPost($id_post)
    {
        $db = Manager::getinstance();
        $add=new Comments();
        $add->setPostId($id_post);
        $commentList = array();
        $comments = $db->prepare('SELECT * FROM `comments` WHERE `post_id` = :post_id  AND `authorized` = 1;') ;
        $comments->bindValue(":post_id", $add->postId(), \PDO::PARAM_INT);
        $comments->fetch(\PDO::FETCH_OBJ);
        $comments->execute();

        foreach($comments as $comment){
            $author = new Users;
            $commentList[$comment['id']]['id'] = $comment['id'];
            $commentList[$comment['id']]['post_id'] = $comment['post_id'];
            $commentList[$comment['id']]['author'] = $author->getAuthor($comment['author']);
            $commentList[$comment['id']]['comment'] = $comment['comment'];
            $commentList[$comment['id']]['date_add'] = $comment['date_add'];
            $commentList[$comment['id']]['verified'] = $comment['verified'];
        }
        return $commentList;

    }


    /**
     * @param $type_id
     * @return array
     */
    public function listComment()
    {
        $db = Manager::getinstance();
        $commentList = array();
        $comments = $db->prepare('SELECT * FROM `comments`;') ;
        $comments->fetch(\PDO::FETCH_OBJ);
        $comments->execute();

        foreach($comments as $comment){
            $author = new Users;
            $commentList[$comment['id']]['id'] = $comment['id'];
            $commentList[$comment['id']]['post_id'] = $comment['post_id'];
            $commentList[$comment['id']]['author'] = $author->getAuthor($comment['author']);
            $commentList[$comment['id']]['comment'] = $comment['comment'];
            $commentList[$comment['id']]['date_add'] = $comment['date_add'];
            $commentList[$comment['id']]['authorized'] = $comment['authorized'];
        }
        return $commentList;
    }

    /**
     * @return string
     */
    public function DisplayCommentList()
    {
        $Comments = new Comments;
        $Comments = $Comments->listComment(1);
        $display = "<ul>";
        foreach($Comments as $comment){
            $display.="<li><a href='comment/".$comment['id']."' title='".$comment['post_id']."'>".$comment['date_add']." - Article N°".$comment['post_id']." - Commentaire N°".$comment['id']."</a></li>";
        }
        $display .= "</ul>";
        return $display;
    }

    /**
     * @param $id_comment
     * @return mixed
     */
    public function getCommentById($id_comment)
    {
        $comments = new Comments;
        $comments = $comments->listComment(1);
        return $comments[(int)$id_comment];
    }

    /**
     * @param $id
     * @param $authorized
     */
    public function update($id, $authorized)
    {
        $db = Manager::getinstance();
        $add=new Comments();
        $add->setAuthorized($authorized);

        try {
            $sql = 'UPDATE `comments` SET  `authorized`=:authorized WHERE `id` = :id';
            $query = $db->prepare($sql);
            $query->bindValue(":id", $id, \PDO::PARAM_INT);
            $query->bindValue(":authorized", $add->authorized(), \PDO::PARAM_INT);
            $query->execute();
        }
        catch(RouterException $Exception ) {
            // Note The Typecast To An Integer!
            RouterException::errorForm("mise a jour de\'auteur");
        }
    }
}
