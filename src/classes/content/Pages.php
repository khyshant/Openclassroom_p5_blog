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
	
	/**
     * @param $id_page
     * @return mixed
     */
    public function getPageById($id_page)
    {
        $contents = new Content;
            $pages = $contents->listContent(1);
        return $pages[(int)$id_page];
    }
	
	/**
     * @return string
     */
    public function DisplayPageList()
    {
        $contents = new Content;
        $pages = $contents->listContent(1);
        $display = "<ul>";
        foreach($pages as $page){
           $display.="<li><a href='page/".$page['id']."' title='".$page['title']."'>".$page['title']."</a></li>";
        }
        $display .= "</ul>";
        return $display;
    }
}
