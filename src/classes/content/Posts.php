<?php

namespace App\classes\content;



/**
 * Description of PostsController
 *
 * @author khysh
 */

class Posts extends Content {


    /**/
    /**
     * @param $author
     * @param $title
     * @param $chapo
     * @param $content
     * @param $meta_title
     * @param $meta_description
     * @param $comment_auth
     */
    public function addPost($author, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth)
    {
        Content::addContent(2,$author,"",$title,$chapo,$content,$meta_title,$meta_description,$comment_auth);
    }

    
}
