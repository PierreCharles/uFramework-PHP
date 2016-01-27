<?php

$cacheMap=[];

spl_autoload_register(function($className) use($cacheMap){	
	
	$fileName = __DIR__ .DIRECTORY_SEPARATOR."cache.php";
	include $fileName;	
	
	if (isset($cacheMap[$className])) {
		require_once($cacheMap[$className]);		
	}
	else{		
		$path = str_replace(["_","\\"], "/", $className) . '.php';
		if (file_exists(__DIR__ .DIRECTORY_SEPARATOR.$path)) {	

			$cacheMap[$className] = $path;
			file_put_contents($fileName, sprintf("<?php\n\$cacheMap = %s ;",var_export($cacheMap,true)));
			require_once(__DIR__ .DIRECTORY_SEPARATOR. $path);
		}
	}
});
