<?php

function db_connect() {
	$result = new mysqli('localhost', 'root', '','blog');
	if (!$result) {
		return false;
	}
	return $result;
}
