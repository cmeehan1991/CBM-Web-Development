<?php
define('BLOG_PATH', get_template_directory());
define('BLOG_URI', get_template_directory_uri());
define('BLOG_TEXTDOMAIN','cbmwebdevelopment');

$includeFunctions = glob(BLOG_PATH . "/includes/functions/functions-*.php");
foreach($includeFunctions as $include){
    include($include);
}

include (BLOG_PATH . '/includes/Walkers/NavWalker.php');


// Hide the admin bar
show_admin_bar(false);
