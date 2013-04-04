<?php

	require_once('Workflow.php');

	$query = trim($argv[1]);
	$parts = explode(' ', $query);

	// Pass a Bundle ID
	$w = new Workflow('couchpotato.workflow');

	// Variables
	$host = $w->get('host', 'settings.plist');
	$api = $w->get('api', 'settings.plist');
