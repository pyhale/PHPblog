<?php

include ('functions.php');

session_start();

if (isset($_GET)) {
	$name = $_GET['name'];
	$passwd = $_GET['passwd'];
	$result = login($name, $passwd);
	if ($result) {
		$row = $result->fetch_assoc();
		$_SESSION['author_id'] = $row['id'];
		header('Location:http://127.0.0.1/blog');
		exit;
	} else{
		echo "Cann't log you in! Please try again.";
	}
}

do_html_header('Login To Your Account');

echo "<p>You havn't logged in yet.</p>";

?>

<form action="login.php">
Username:<input type="text" name="name" /><br>
Password:<input type="password" name="passwd" /><br>
<input type="submit" value="submit" />
</form>

<?php

do_html_footer();
