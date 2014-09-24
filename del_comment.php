<?php

include ('functions.php');

session_start();

check_valid_user();

$id = $_GET['id'];

$result = del_comment($id);

if ($result) {
	echo "Delete comment successfully.";
} else {
	echo "Fail to delete comment.";
}
