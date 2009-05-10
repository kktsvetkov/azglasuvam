<?php
/**
* Az-Glasuvam.com
*
* This is the WordPress theme behind Az-Glasuvam.com
*
* @author Kaloyan K. Tsvetkov <kaloyan@kaloyan.info>
* @link http://az-glasuvam.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/

/////////////////////////////////////////////////////////////////////////////

/**
* @internal prevent from second inclusion
*/
if (!isset($az_glasuvam)) {

	/**
	* Initiating the theme...
	* @see az_glasuvam
	*/
	$az_glasuvam = new az_glasuvam;
	}

/////////////////////////////////////////////////////////////////////////////

/**
*/
Class az_glasuvam {

	/**
	* The current version of the theme (it
	* is used for triggering the upgrades)
	*/
	var $version = '0.4';

	/**
	* Constructor
	*
	* Sets the plugin hooks and runs the install/upgrade
	*/
	Function az_glasuvam() {
		
		// if this is the admin, then compare the versions,
		// and if required, start the install/upgrade
		//
		if (is_admin()) {
			$version = get_option('az_glasuvam_revision');
			if (!$version || version_compare($version, intval($this->version), '>') ) {
				$this->install();
				}
			} else {
			add_thickbox();
			}

		// register shortcodes
		//
		add_shortcode('avtor', array($this, 'shortcode_avtor'));
		add_shortcode('blog', array($this, 'shortcode_blog'));
		add_shortcode('original', array($this, 'shortcode_original'));
		} 

	/**
	* Adda the options, and the initial pages
	*/
	Function install() {
		require(dirname(__FILE__) . '/php/install.php');
		}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 
	
	/**
	*/
	Function shortcode_avtor($args, $content) {
		$args = $args + array(
			'snimka' => null,
			'poveche' => null,
			);
		global $post;
		$post->avtor = trim($content);
		$post->snimka = $args['snimka'];
		$post->poveche = $args['poveche'];
		}
	/**
	*/
	Function shortcode_blog($args, $content) {
		global $post;
		$post->blog_title = trim($content);
		$post->blog_url = $args['url'];
		}

	/**
	*/
	Function shortcode_original($args, $content) {
		global $post;
		$post->original_title = trim($content);
		$post->original_url = $args['url'];
		}
	
	////--end-of-class
	}

/////////////////////////////////////////////////////////////////////////////
