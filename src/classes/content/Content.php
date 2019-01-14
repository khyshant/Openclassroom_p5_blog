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
    /**
     * @var
     */
    private $_active;


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

    /**
     * @return mixed
     */
    public function getActive()
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
    /**
     * @param mixed
     */
    public function setActive()
    {
        return $this->_active;
    }

    /**/
    /**
     * @param $type
     * @param $author
     * @param $title
     * @param $chapo
     * @param $content
     * @param $meta_title
     * @param $meta_description
     * @param $comment_auth
     * @param $function
     */
    public function addContent($type, $author, $function, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth, $active)
    {

        $db = Manager::getinstance();
        $add=new Content();
        $add->setType($type);
        $add->setAuthor($author);
        $add->setFunction($function);
        $add->setTitle($title);
        $add->setChapo($chapo);
        $add->setContent($content);
        $add->setMetaTitle($meta_title);
        $add->setMetaDescription($meta_description);
        $add->setCommentAuth($comment_auth);
        $add->setActive($active);
        $add->setDateAdd(date('y-m-d H:i:s'));
        $add->setDateUpd(date('y-m-d H:i:s'));

        try {
            $sql = "INSERT INTO `posts`(`type_id`, `author`, `function` , `title`, `chapo`, `content`, `meta_title`, `meta_description`, `comment_auth`, `active`, `DATE_ADD`, `date_upd`) VALUES (:type_id, :author, :function, :title, :chapo, :content, :meta_title, :meta_description,:comment_auth, :active, :date_add,:date_update)";
            $query = $db->prepare($sql);

            $query->bindValue(":type_id", $add->_type, \PDO::PARAM_INT);
            $query->bindValue(":author", $add->_author, \PDO::PARAM_INT);
            $query->bindValue(":function", $add->_function, \PDO::PARAM_STR);
            $query->bindValue(":title", $add->_title, \PDO::PARAM_STR);
            $query->bindValue(":chapo", $add->_chapo, \PDO::PARAM_STR);
            $query->bindValue(":content", $add->_content, \PDO::PARAM_STR);
            $query->bindValue(":meta_title", $add->_meta_title, \PDO::PARAM_STR);
            $query->bindValue(":meta_description", $add->_meta_description, \PDO::PARAM_STR);
            $query->bindValue(":comment_auth", $add->_comment_auth, \PDO::PARAM_INT);
            $query->bindValue(":active", $add->_active, \PDO::PARAM_INT);
            $query->bindValue(":date_add", $add->_dateAdd);
            $query->bindValue(":date_update", $add->_date_upd);
            $query->execute();
        }
        catch( RouterException $Exception ) {
            RouterException::errorForm("creation de contenu");
        }


    }

    /**
     * @param $id
     * @param $author
     * @param $title
     * @param $chapo
     * @param $content
     * @param $meta_title
     * @param $meta_description
     * @param $comment_auth
     * @param $function
     */
    public function updateContent($id, $author, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth,$active, $function)
    {
        $db = Manager::getinstance();
        $add=new Content();
        $add->setId($id);
        $add->setAuthor($author);
        $add->setFunction($function);
        $add->setTitle($title);
        $add->setChapo($chapo);
        $add->setContent($content);
        $add->setMetaTitle($meta_title);
        $add->setMetaDescription($meta_description);
        $add->setCommentAuth($comment_auth);
        $add->setActive($active);
        $add->setDateUpd(date('Y-m-d H:i:s'));

        try {
            $sql = 'UPDATE `posts` SET  `author`=:author, `function`=:function, `title`=:title, `chapo`=:chapo, `content`=:content, `meta_title`=:meta_title, `meta_description`=:meta_description, `comment_auth`=:comment_auth,  `date_upd`=:date_update,`active`=:active WHERE `id` = :id';
            $query = $db->prepare($sql);

            $query->bindValue(":id", $add->_id, \PDO::PARAM_INT);
            $query->bindValue(":author", $add->_author, \PDO::PARAM_INT);
            $query->bindValue(":function", $add->_function, \PDO::PARAM_STR);
            $query->bindValue(":title", $add->_title, \PDO::PARAM_STR);
            $query->bindValue(":chapo", $add->_chapo, \PDO::PARAM_STR);
            $query->bindValue(":content", $add->_content, \PDO::PARAM_STR);
            $query->bindValue(":meta_title", $add->_meta_title, \PDO::PARAM_STR);
            $query->bindValue(":meta_description", $add->_meta_description, \PDO::PARAM_STR);
            $query->bindValue(":comment_auth", $add->_comment_auth, \PDO::PARAM_INT);
            $query->bindValue(":active", $add->_active, \PDO::PARAM_INT);
            $query->bindValue(":date_update", date('Y-m-d H:i:s'));
            $query->execute();
        }
        catch( RouterException $Exception) {
            // Note The Typecast To An Integer!

            RouterException::errorForm("mise a jour de contenu");
        }
    }

    /**
     * @param $type_id
     * @return array
     */
    public function listContent($type_id)
    {
        $db = Manager::getinstance();
        $contentList = array();
        $contents = $db->prepare('SELECT * FROM `posts`;') ;
        $contents->fetch(\PDO::FETCH_OBJ);
        $contents->execute();


        foreach($contents as $content){
            if($type_id){
                if($content['type_id']==$type_id){
                    $author = new Users;
                    $contentList[$content['id']]['id'] = $content['id'];
                    $contentList[$content['id']]['function'] = $content['function'];
                    $contentList[$content['id']]['type_id'] = $content['type_id'];
                    $contentList[$content['id']]['author'] = $author->getAuthor($content['author']);
                    $contentList[$content['id']]['title'] = $content['title'];
                    $contentList[$content['id']]['chapo'] = $content['chapo'];
                    $contentList[$content['id']]['content'] = $content['content'];
                    $contentList[$content['id']]['meta_title'] = $content['meta_title'];
                    $contentList[$content['id']]['meta_description'] = $content['meta_description'];
                    $contentList[$content['id']]['comment_auth'] = $content['comment_auth'];
                    $contentList[$content['id']]['active'] = $content['active'];
                    $contentList[$content['id']]['date_upd'] = $content['date_upd'];
                    $contentList[$content['id']]['media'] = '';
                }
            }
            else{
                $author = new Users;
                $contentList[$content['id']]['id'] = $content['id'];
                $contentList[$content['id']]['function'] = $content['function'];
                $contentList[$content['id']]['type_id'] = $content['type_id'];
                $contentList[$content['id']]['author'] = $author->getAuthor($content['author']);
                $contentList[$content['id']]['title'] = $content['title'];
                $contentList[$content['id']]['chapo'] = $content['chapo'];
                $contentList[$content['id']]['content'] = $content['content'];
                $contentList[$content['id']]['meta_title'] = $content['meta_title'];
                $contentList[$content['id']]['meta_description'] = $content['meta_description'];
                $contentList[$content['id']]['comment_auth'] = $content['comment_auth'];
                $contentList[$content['id']]['active'] = $content['active'];
                $contentList[$content['id']]['date_upd'] = $content['date_upd'];
                $contentList[$content['id']]['media'] = '';

            }

        }

        return $contentList;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getContentById($id)
    {
        $contents = new Content;
        $contents = $contents->listContent(false);
        return $contents[(int)$id];
    }
}
