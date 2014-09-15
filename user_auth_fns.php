<?php

function login($name, $passwd) {
	$db = db_connect();
	$query = "select * from members where name='".$name."' and passwd='".$passwd."'";
	$result = $db->query($query);
	if ($result->num_rows>0) {
		return true;
	} else {
		return false;
	}
}

function get_authorid($name) {
	$db = db_connect();
	$query = "select id from members where name='".$name."'";
	$result = $db->query($query);
	if ($result) {
		$row = $result->fetch_object();
		return $row->id;
	}
}
