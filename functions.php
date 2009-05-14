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
	var $version = '0.5.4';

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
			add_thickbox(); /* ... */
			}
		
		// rewrite overrides
		//
		add_filter('rewrite_rules_array', array($this, 'rewrite'));

		// register shortcodes
		//
		add_shortcode('avtor', array($this, 'shortcode_avtor'));
		add_shortcode('blog', array($this, 'shortcode_blog'));
		add_shortcode('original', array($this, 'shortcode_original'));
		} 

	/**
	* Adds the options, and the initial pages
	*/
	Function install() {
		require(TEMPLATEPATH . '/php/install.php');
		}

	/**
	* Adds the rewrite rule overrides
	*/
	Function rewrite($rules) {
		return require(TEMPLATEPATH . '/php/rewrite.php');
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

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Digg-like style of paginataion
	*
	* @param string $query HTTP-like query string to parse and extract the options
	* @return string
	*/
	Function pagination( $query='' ){
		include(TEMPLATEPATH . '/php/navigation.php');
		}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* UTF8-safe substr()
	* @param string $string
	* @param integer $from
	* @param integer $length
	* @return string
	*/
	Function utf8_substr($string, $from, $length){

		$chunk = 35;
		if ($length > $chunk) {
			$result = '';
			$c = ceil($length/$chunk);
			for ($i = 0; $i < $c; $i++) {
				$result .= $this->utf8_substr(
					$string,
					$from + $i * $chunk,
					($i+1 == $c ) ? $length % $chunk : $chunk
					);
				}
			return $result;
			}		
		
		return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                       '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$length.'}).*#s',
                       '$1',$string);
		}

	/**
	*
	*/
	Function utf8_truncate($str, $length=60) {
		$str_1 = $this->utf8_substr($str, 0, $length);
		$str_2 = $this->utf8_substr($str, 0, strlen($str));
		return $str_1 == $str_2 ? $str : "{$str_1}&hellip;";
		}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	////--end-of-class
	}

/////////////////////////////////////////////////////////////////////////////
