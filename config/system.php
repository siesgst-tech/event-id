<?php
// Database
require_once dirname(__FILE__).'/database.php';
// Messages
require_once dirname(__FILE__).'/messages.php';
// Timezone
date_default_timezone_set('Asia/Kolkata');
// Classes to load
function ClassAutoloader($class)
{
	require_once dirname(__FILE__).'/../controller/'.$class.'.php';
}

spl_autoload_register('ClassAutoloader');

// WARNING: Do not delete this file
// Author: Omkar Prabhu (nerdyninja)
?>
