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
		$obj = $result->fetch_object();
		return $obj->id;
	}
}

function check_valid_user(){
	if (!isset($_SESSION['author'])) {
		header('Location:http://127.0.0.1/blog/login.php');
		exit;
	}
}
