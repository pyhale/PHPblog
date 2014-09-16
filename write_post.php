<?php

include ('functions.php');

session_start();

check_valid_user();

do_html_header('Write Post');

post_write_form($_SESSION['author_id']);

do_html_footer();
