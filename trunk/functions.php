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
*/
Class az_glasuvam {

	/**
	* The current version of the theme (it
	* is used for triggering the upgrades)
	*/
	var $version = '$Rev$';

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

		//
		//
		} 

	/**
	* Adda the options, and the initial pages
	*/
	Function install() {
		require(dirname(__FILE__) . '/php/install.php');
		}
	
	////--end-of-class
	}

/////////////////////////////////////////////////////////////////////////////

/**
*
*/
$az_glasuvam = new az_glasuvam();