<?php

function MyAutoload($className) {

	$extension = spl_autoload_extensions();
	include_once('php/classes/' . $className . $extension);

}

spl_autoload_extensions('.class.php');
spl_autoload_register('MyAutoload');