<?php

include ('functions.php');

session_start();
$old_author = $_SESSION['author'];

unset($_SESSION['author']);
unset($_SESSION['author_id']);
$result_dest = session_destroy();

do_html_header('Logging out');

if (!empty($old_author)) {
	if ($result_dest) {
		echo 'Logged out.<br />';
		do_html_url('blog/login.php', 'Login');
	} else {
		echo 'Could log you out.<br />';
	}
} else {
	echo 'You were not logged in, and so have not been logged out.<br />';
	do_html_url('blog/login.php', 'Login');
}

do_html_footer();
