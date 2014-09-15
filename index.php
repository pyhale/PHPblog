<?php 

include ('functions.php');

//session_start();

//if (!isset($_SESSION['author'])) {
//	header('Location:http://127.0.0.1/blog/login.php');
//	exit;
//}

do_html_header('Blog');

@ $db = db_connect();

$query = "select * from entries where author_id=2";//.$_SESSION['author_id'];

$result = $db->query($query);

for ($i=0; $i<$result->num_rows; $i++) {
	$row = $result->fetch_assoc();
	echo "<h3>".$row['title']."</h3>";
	echo "<p>".$row['body']."</p>";
	echo "<hr />";
}

do_html_footer();
