<?php
$options = 'libs,jquery.browser.addEnvClass,jquery.color,jquery.initInput,jquery.addFileInfo,jquery.incrementalFilter,jquery.fancybox-1.3.1,init';
ob_start('ob_gzhandler');
header('Content-Type: text/javascript');
$files = $options? explode(',',$options): explode(",",$_GET['files']);
foreach($files as $key=>$val){
	if(file_exists($val.'.js')){
		echo "\n\n/*** File \"$val.js\" starts here. ***/\n\n";
		include_once($val.'.js');
	}else{
		echo "\n\n/*** File \"$val.js\" does not exist. ***/\n\n";
	}
}
?>
