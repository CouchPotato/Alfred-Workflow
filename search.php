<?php

	require_once('_include.php');

	$query = trim($query);
	if(strlen($query) < 3) return;

	// Search
	$search = file_get_contents($host.'/api/'.$api.'/movie.search/?q=' . urlencode($query));
	$results = json_decode($search);

	foreach($results->movies as $result){
		$in_wanted = null;
		$in_library = null;

		if($result->in_wanted)
			$in_wanted = 'In wanted: ' . $result->in_wanted->profile->label;

		if($result->in_library){
			$in_library = '';
			if($in_wanted) $in_library = ', ';
			$in_library .= 'In library: ';
			$in_library .= $result->in_library->releases[0]->quality->label;
		}

		$w->result(array(
			'uid'          => $result->imdb,
			'arg'          => $result->imdb,
			'title'        => $result->original_title . ($result->year ? ' ('.$result->year.')' : ''),
			'subtitle'     => $in_wanted . ' ' . $in_library,
			'icon'         => $result->images->poster[0],
			'valid'        => 'yes',
			'autocomplete' => 'autocomplete'
		));

	}

	header('Content-type: text/xml; charset=utf-8');
	echo $w->toXML();
