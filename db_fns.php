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

function get_post_details($postid) {
	$db = db_connect();
	$query = "select * from entries where id=".$postid;
	$result = $db->query($query);
	return $result->fetch_object();
}

function get_comments($postid) {
	$db = db_connect();
	$query = "select * from comments where post_id=".$postid;
	$result = $db->query($query);
	return $result;
}

function insert_comment($post_id, $title, $content){
	$db = db_connect();
	$query = "insert into comments(post_id, title, content) values('".$post_id."', '".$title."', '".$content."')";
	$result = $db->query($query);
	return $result;
}
