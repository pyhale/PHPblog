<?php

function db_connect() {
	$result = new mysqli('localhost', 'root', '','blog');
	if (!$result) {
		return false;
	}
	return $result;
}

function get_entries($id) {
	$db = db_connect();
	$query = "select * from entries where author_id=".$id;

	$result = $db->query($query);

	return $result;
}
