<?php
/**
*/


/**
*/
Class az_glasuvam {

	/**
	*/
	var $version = '$Rev$';

	/**
	* Constructor
	*/
	Function az_glasuvam() {
		if (is_admin()) {
			$version = get_option('az_glasuvam_revision');
			if (!$version || version_compare($version, intval($this->version), '>') ) {
				$this->install();
				}
			}
		} 

	/**
	* Add the options, and the pages
	*
	*
	*/
	Function install() {
		require(dirname(__FILE__) . '/.php/install.php');
		}
	
	////--end-of-class
	}

/////////////////////////////////////////////////////////////////////////////

/**
*
*/
$az_glasuvam = new az_glasuvam();