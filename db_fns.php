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

function del_comment($id) {
	$db = db_connect();
	$query = "delete from comments where id=".$id;
	$result = $db->query($query);
	return $result;
}

function insert_post($author_id, $title, $body, $category) {
	$db = db_connect();
	$query = "insert into entries(title, body, author_id, category) values('".$title."', '".$body."', '".$author_id."', '".$category."')";
	$result = $db->query($query);
	return $result;
}

function del_post($id) {
	$db = db_connect();
	$query = "delete from entries where id=".$id;
	$result = $db->query($query);
	return $result;
}

function update_post($id, $title, $body, $category) {
	$db = db_connect();
	$query = "update entries set title='".$title."', body='".$body."', category='".$category."' where id=".$id;
	$result = $db->query($query);
	return $result;
}

function get_cate_post($id) {
	$db = db_connect();
	$query = "select * from entries where category=".$id;

	$result = $db->query($query);

	return $result;
}
