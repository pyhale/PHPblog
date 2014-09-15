<?php

function do_html_header($title='') {

?>

<html>
<head>
<title> <?php echo $title;?></title>
</head>
<body>

<?php

}

function do_html_footer() {

?>

</body>
</html>

<?php

}

function display_entries($result) {
	for ($i=0; $i<$result->num_rows; $i++) {
		$row = $result->fetch_assoc();
		echo "<h3>".$row['title']."</h3>";
		echo "<p>".$row['body']."</p>";
		echo "<hr />";
	}
}
