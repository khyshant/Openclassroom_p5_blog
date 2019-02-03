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
    public function addPost($author, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth,$active)
    {
        Content::addContent(2,$author,"",$title,$chapo,$content,$meta_title,$meta_description,$comment_auth,$active);
    }

    public function updatePost()
    {

    }

    /**
     * @param $id_page
     * @return mixed
     */
    public function getPost($id_page)
    {
        $contents = new Content;
        if(is_int($id_page)){
            $posts = $contents->listContent(2);
        }

        return $posts[$id_page];
    }


    /**
     * @return string
     */
    public function displayPostList($viewer = null)
    {
        $content= "page";
        if($viewer){
            $content= "post";
        }
        $contents = new Content;
        $posts = $contents->listContent(2);
        $display = "<ul>";
        foreach($posts as $post){
            $display.="<li>
                <a href='".$content."/".$post['id']."' title='".$post['title']."'>".$post['title']."</a></li>";
        }
        $display .= "</ul>";
        return $posts;
    }
}
