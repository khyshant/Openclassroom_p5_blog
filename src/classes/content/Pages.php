<?php

namespace App\classes\content;



/**
 * Description of PostsController
 *
 * @author khysh
 */

class Pages extends Content {

   /**
     * @param $author
     * @param $function
     * @param $title
     * @param $chapo
     * @param $content
     * @param $meta_title
     * @param $meta_description
     * @param $comment_auth
     */
    public function addPage($author, $function, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth)
    {
        Content::addContent(1,$author, $function, $title,$chapo,$content,$meta_title,$meta_description,$comment_auth);
    }
}
