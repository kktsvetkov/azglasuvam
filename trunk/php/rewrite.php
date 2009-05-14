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

// rewrite modifications
//
$default_category = get_option('default_category');

$rules = array(
	'blog/feed/(feed|rdf|rss|rss2|atom)/?$'
		=> 'index.php?cat=' . $default_category . '&feed=$matches[1]',
	'blog/(feed|rdf|rss|rss2|atom)/?$'
		=> 'index.php?cat=' . $default_category . '&feed=$matches[1]',
	'blog/page/?([0-9]{1,})/?$'
		=> 'index.php?cat=' . $default_category . '&paged=$matches[1]',
	'blog/?$'
		=> 'index.php?cat=' . $default_category,
	) + $rules;
return $rules;