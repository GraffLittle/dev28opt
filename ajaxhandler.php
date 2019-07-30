<?php
header('Cache-Control: no-cache, must-revalidate');
header('Content-Type: text/html; charset=UTF-8;');
header('Pragma: no-cache');
header('Connection: close');

define('DISTRIBUTIVE_FILENAME', './distr/wbs.tgz');
define('DISTRIBUTIVE_FILENAME_ALT', './wbs.tgz');

@ini_set('memory_limit', '64M');
@ini_set('max_execution_time', 3600);
require_once('includes/PEAR.php');
require_once('includes/restartableTar.php');

if(isset($_GET['source']) && $_GET['source'] == 'ajax'){
	if(!defined('WBS_DIR')){
		define('WBS_DIR', realpath(dirname(__FILE__)));
	}
	$action = isset($_GET['action']) ? $_GET['action'] : null;
	switch($action){
		case 'extract':
			$chmod = isset($_GET['chmod']) ? $_GET['chmod'] : null;
			if($chmod){
				$chmod = sscanf($chmod, '%3o');
	 			$chmod = isset($chmod[0]) ? $chmod[0] : null;
			}
			$distributive = file_exists(DISTRIBUTIVE_FILENAME) ? DISTRIBUTIVE_FILENAME : DISTRIBUTIVE_FILENAME_ALT;
			ajaxTar::extract($distributive, WBS_DIR, $chmod);
			break;
		case 'getstate':
		default:
			ajaxTar::getState();
			break;
	}
}
?>
