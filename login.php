<?php

include ('functions.php');

session_start();

if (($_POST['name']) && ($_POST['passwd'])) {
	$name = $_POST['name'];
	$passwd = $_POST['passwd'];
	$result = login($name, $passwd);
	if ($result) {
		$_SESSION['author'] = $name;
		header('Location:http://127.0.0.1/blog');
	} else{
		echo "Cann't log you in! Please try again.";
	}
}

do_html_header('Login To Your Account');

echo "<p>You havn't logged in yet.</p>";

?>

<form action="login.php" method="post">
Username:<input type="text" name="name" /><br>
Password:<input type="password" name="passwd" /><br>
<input type="submit" value="submit" />
</form>

<?php

echo "Don't have an account?";

do_html_url('blog/register.php', 'register');

do_html_footer();
