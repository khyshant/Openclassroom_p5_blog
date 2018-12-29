<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classes;

/**
 * Description of template
 *
 * @author khysh
 */
class Template {
    /**
	 * location of file
	 *
	 * @var string
	 */
	private $folder;

	static $frontMenu = array(
	    'page1' => 'Contact',
        'lien1' => 'Contact',
        'page2' => 'Blog',
        'lien2' => 'Blog',
        'page3' => 'Competences',
        'lien3' => 'Competences',
        'page4' => 'Portfolio',
        'lien4' => 'Portfolio',
        'page5' => 'Presentation',
        'lien5' => 'Presentation'
    );

    static $adminMenu = array(
        'page1' => 'Pages',
        'lien1' => 'pageList',
        'page2' => 'Articles',
        'lien2' => 'postList',
        'page3' => 'Commentaires',
        'lien3' => 'commentList',
        'page4' => 'Utilisateurs',
        'lien4' => 'userList',
        'page5' => 'A voir',
        'lien5' => ''
    );

        /**
	 * builder expect folder.
	 *
	 * @param $folder
	 */

    function __construct( $folder = null ){
		if ( $folder ) {
			$this->set_folder( $folder );
		}
	}

     /**
	 * Simple method for updating the base folder where templates are located.
	 *
	 * @param $folder
	 */
	function set_folder( $folder ){
		// normalize the internal folder value by removing any final slashes
		$this->folder = rtrim( $folder, '/' );
	}
        
        /**
	 * Find and attempt to render template
	 *
	 * @param $suggestions
	 * @param $variables
	 *
	 * @return string
	 */
	function render( $suggestions, $variables = array() ){
		$template = $this->find_template( $suggestions );
		//echo $template;
                $output = '';
		if ( $template ){
			$output = $this->render_template( $template, $variables );
		}
		return $output;
	}
        
        /**
	 * Look for the first template suggestion
	 *
	 * @param $suggestions
	 *
	 * @return bool|string
	 */
	function find_template( $suggestions ){
		if ( !is_array( $suggestions ) ) {
			$suggestions = array( $suggestions );
		}
		$suggestions = array_reverse( $suggestions );
		$found = false;
		foreach( $suggestions as $suggestion ){
			$file = "{$this->folder}/{$suggestion}.php";
                        //echo $this->folder;
			if ( file_exists( $file ) ){
				$found = $file;
				break;
			}
		}
		return $found;
	}
        
        /**
	 * Execute the template extract the variable, and including
	 * the template file. internal variable used by func_gets_arg
	 *
	 * @internal param $template
	 * @internal param $variables
	 *
	 * @return string
	 */
	function render_template( /*$template, $variables*/ ){
		ob_start();
		foreach ( func_get_args()[1] as $key => $value) {
			${$key} = $value;
		}
        if(func_get_args()[0]=="src/view/frontend/errorView.php"){
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        }
		include func_get_args()[0];
		return ob_get_clean();
	}
        
}
