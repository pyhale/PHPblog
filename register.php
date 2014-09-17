<?php

include ('functions.php');

session_start();

do_html_header('Register');

if (($_POST['name']) && ($_POST['passwd'])) {
	$name = $_POST['name'];
	$passwd = $_POST['passwd'];
	$result = register($name, $passwd);
	if ($result) {
		echo "register successfully.";
		$_SESSION['author'] = $name;
		header('Location:http://127.0.0.1/blog');
	} else {
		echo "Can't register now, please try again later.";
		do_html_url('blog/register.php', 'Back to register');
	}
}

?>

<form action="register.php" method="post">
Username:<input type="text" name="name" /><br>
Password:<input type="password" name="passwd" /><br>
<input type="submit" value="submit" />
</form>

<?php

do_html_footer();
