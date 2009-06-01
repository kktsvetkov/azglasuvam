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
	var $version = '0.5.6';

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
			}
		
		// add plugin hooks
		//
		add_filter('sanitize_title', array($this, 'convert'), 0);
		
		// rewrite overrides
		//
		add_filter('rewrite_rules_array', array($this, 'rewrite'));

		// register shortcodes
		//
		add_shortcode('avtor', array($this, 'shortcode_avtor'));
		add_shortcode('blog', array($this, 'shortcode_blog'));
		add_shortcode('original', array($this, 'shortcode_original'));
		add_shortcode('baneri', array($this, 'shortcode_baneri'));
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
	*/
	Function shortcode_baneri() {
		return require(TEMPLATEPATH . '/php/baneri.php');
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

	/**
	* Transliteration map
	* @var array
	*/
	var $transliteration = array(
		192 => 'a',
		193 => 'b',
		194 => 'v',
		195 => 'g',
		196 => 'd',
		197 => 'e',
		198 => 'zh',
		199 => 'z',
		200 => 'i',
		201 => 'y',
		202 => 'k',
		203 => 'l',
		204 => 'm',
		205 => 'n',
		206 => 'o',
		207 => 'p',
		208 => 'r',
		209 => 's',
		210 => 't',
		211 => 'u',
		212 => 'f',
		213 => 'h',
		214 => 'ts',
		215 => 'tch',
		216 => 'sh',
		217 => 'sht',
		218 => 'a',
		220 => 'y',
		222 => 'yu',
		223 => 'ya',
		224 => 'a',
		225 => 'b',
		226 => 'v',
		227 => 'g',
		228 => 'd',
		229 => 'e',
		230 => 'zh',
		231 => 'z',
		232 => 'i',
		233 => 'y',
		234 => 'k',
		235 => 'l',
		236 => 'm',
		237 => 'n',
		238 => 'o',
		239 => 'p',
		240 => 'r',
		241 => 's',
		242 => 't',
		243 => 'u',
		244 => 'f',
		245 => 'h',
		246 => 'ts',
		247 => 'tch',
		248 => 'sh',
		249 => 'sht',
		250 => 'a',
		252 => 'y',
		254 => 'yu',
		255 => 'ya'
		);
	
	/**
	* Converts the Cyrillic chars to their latin equivalent.
	*
	* @param string $value
	* @return string
	*/
	Function convert($value) {

		$string = $this->utf2win1251($value);
	
	  	$result = '';
		for($i = 0; $i < strlen($string); $i++) {
			if (ord($string[$i]) > 128) {
				$result .= $this->transliteration[ord($string[$i])];
				} else {
	      			$result .= $string[$i];
	      			}
	      		}
	
		return $result;
		}

	/**
	* Converts a UTF-encoded string into a Win1251-encoded one
	*
	* @param string $string
	* @return string
	*/
	Function utf2win1251($string) {
		
		$out = '';
		
		for ($i=0; $i<strlen($string); $i++) {
			$c1 = substr ($string, $i, 1);
			$byte1 = ord ($c1);
			
			if ($byte1>>5 == 6) { /* 110x xxxx, 110 prefix for 2 bytes unicode */
				$i++;
				$c2 = substr ($string, $i, 1);
				$byte2 = ord ($c2);

				$byte1 &= 31; /* remove the 3 bit two bytes prefix */
				$byte2 &= 63; /* remove the 2 bit trailing byte prefix */
				$byte2 |= (($byte1 & 3) << 6); /* last 2 bits of c1 become first 2 of c2 */
				$byte1 >>= 2; /* c1 shifts 2 to the right */
		
				$word = ($byte1<<8) + $byte2;
				if ($word==1025) $out .= chr(168);                    // ?
					elseif ($word==1105) $out .= chr(184);                // ?
					elseif ($word>=0x0410 && $word<=0x044F) $out .= chr($word-848); // ?-? ?-?
					else { 
						$a = dechex($byte1);
						$a = str_pad($a, 2, '0', STR_PAD_LEFT);
						$b = dechex($byte2);
						$b = str_pad($b, 2, '0', STR_PAD_LEFT);
						$out .= "&#x".$a.$b.";";
						}
				} else {
				$out .= $c1;
				}
			}
		
		return $out;
		}

	// -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- 

	/**
	* Get a shuffled list of the IDs of the "poslaniya" pages
	*/
	Function poslania() {

		global $wpdb;

		// where's the root ?
		//
		$sql = "SELECT `post_parent` FROM `{$wpdb->posts}`
			INNER JOIN `{$wpdb->postmeta}`
				ON `{$wpdb->postmeta}`.`post_id` = `{$wpdb->posts}`.`ID`
			WHERE `meta_key` = '_wp_page_template'
				AND `meta_value` = 'page.poslanie.php'
			LIMIT 0, 1 ";
		$_root = $wpdb->get_var($sql);
	
		// find all the messages
		//
		$sql = "SELECT `ID` FROM `{$wpdb->posts}`
			WHERE `post_parent` = $_root
				AND `post_type` = 'page'; ";
		$_p = $wpdb->get_col($sql);
		shuffle($_p);

		return $_p;
		}

	////--end-of-class
	}

/////////////////////////////////////////////////////////////////////////////
