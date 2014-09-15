<?php

function login($name, $passwd) {
	$db = db_connect();
	$query = "select * from members where name='".$name."' and passwd='".$passwd."'";
	$result = $db->query($query);
	if ($result->num_rows>0) {
		return $result;
	} else {
		return false;
	}
}
