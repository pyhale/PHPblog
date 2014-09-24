<?php

include ('functions.php');

session_start();

check_valid_user();

$id = $_GET['id'];

$result = del_post($id);

if ($result) {
	echo "Delete post successfully.";
} else {
	echo "Fail to delete post.";
}
