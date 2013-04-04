<?php

	require_once('_include.php');

	// Search
	$add = file_get_contents($host.'/api/'.$api.'/movie.add/?identifier=' . $parts[0]);
	$results = json_decode($add);

	echo $results->movie ? 'Movie added!' : 'Something went wrong, check CouchPotato logs';
