<?php
define('CBM_PATH', get_template_directory());
define('CBM_URI', get_template_directory_uri());
define('CBM_TEXTDOMAIN','cbmwebdevelopment');
define('CBM_VERSION', '2.0.0');

$includeFunctions = glob(CBM_PATH . "/includes/functions/functions-*.php");
foreach($includeFunctions as $include){
    include($include);
}

include (CBM_PATH . '/includes/Walkers/NavWalker.php');

foreach(glob(CBM_PATH . '/includes/acf/groups/*_active.php') as $acf_file){
	include($acf_file);
}

// Custom post types
foreach(glob(CBM_PATH . '/includes/cpt/*_active.php') as $cpt){
	include($cpt);
}

// Custom native blocks
foreach(glob(CBM_PATH . '/blocks/native/**/*_active.php') as $native_block){
	include($native_block);
}

// Widgets
include CBM_PATH . '/includes/widgets/social-media.php';

// Hide the admin bar
show_admin_bar(false);
