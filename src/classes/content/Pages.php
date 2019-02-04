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
    public function addPage($author, $function, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth,$active)
    {
        Content::addContent(1,$author, $function, $title,$chapo,$content,$meta_title,$meta_description,$comment_auth,$active);
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
    public function updatePage($id, $author, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth, $function)
    {
        Content::updateContent($id, $author, $title, $chapo, $content, $meta_title, $meta_description, $comment_auth,$function);
    }

    /**
     * @param $id_page
     * @return mixed
     */
    public function getPageById($id_page)
    {
        $contents = new Content;
            $pages = $contents->listContent(1,'admin');
        return $pages[(int)$id_page];
    }

    /**
     * @param $param
     * @return mixed
     */
    public function getPageByFn($param)
    {
        $contents = new Content;
        $pages = $contents->listContent(1,'front');
        foreach ($pages as $page) {
            if ($page['function'] == $param) {
                return $page;
            }
        }
    }

    /**
     * @return string
     */
    public function DisplayPageList()
    {
        $contents = new Content;
        $pages = $contents->listContent(1,'admin');
        $display = "<ul>";
        foreach($pages as $page){
           $display.="<li><a href='page/".$page['id']."' title='".$page['title']."'>".$page['title']."</a></li>";
        }
        $display .= "</ul>";
        return $display;
    }
}
