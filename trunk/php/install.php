<?php
/**
* @version SVN:$Id$
*/

/////////////////////////////////////////////////////////////////////////////

/**
* @internal prevent from direct calls
*/
if (!defined('ABSPATH')) {
	exit;
	}

/////////////////////////////////////////////////////////////////////////////

// set the name of the default category
//
$default_category = get_option('default_category');
wp_update_term($default_category, 'category', array('name'=> 'Блог', 'slug' => 'blog'));

// set the options
//
update_option('az_glasuvam_revision', intval($this->version));

