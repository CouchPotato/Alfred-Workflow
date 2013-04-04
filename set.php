<?php

	require_once('_include.php');

	$w->set('host', rtrim($parts[0], '/'), 'settings.plist');
	$w->set('api', trim($parts[1]), 'settings.plist');
	
	echo 'Set CouchPotato options: ' . $w->get($parts[0], 'settings.plist') . ' and ' .  $w->get($parts[1], 'settings.plist');
