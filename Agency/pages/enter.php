<?php
if($_SESSION['ruser'] || $_SESSION['radmin'])
{

	$user = ($_SESSION['ruser'])? $_SESSION['ruser'] : $_SESSION['radmin'];

	echo '<form action="index.php';

	if(isset($_GET['page'])) echo '?page='.$_GET['page'].'" ';

	echo 'class="form-inline float-right" method="post">';
	echo '<h4>Hello, <span>'.$user.'</span>&nbsp;';
	echo '<input type="submit" value="Logout" id="ex" name="ex" class="btn btn-default btn-xs"></h4>';
	echo '</form>';

	if($_POST['ex'])
	{
		unset($_SESSION['ruser']);
		unset($_SESSION['radmin']);
		echo '<script>window.location.reload()</script>';
	}
}

else
{

	if(!isset($_POST['submit']))
	{
		echo '<form action="index.php';

		if(isset($_GET['page'])) echo '?page='.$_GET['page'].'" ';

		echo 'class="form-inline float-right" method="post">';
		echo ' <div class="form-group mx-sm-3 mb-2">
	    <label for="staticEmail2" class="sr-only">Email</label>
	    <input name ="log" type="text" class="form-control" placeholder="Login">
	  </div>
	  <div class="form-group mx-sm-3 mb-2">
	    <label for="inputPassword2" class="sr-only">Password</label>
	    <input name ="pass" type="text" class="form-control" placeholder="Password">
	  </div>
	  <input type="submit" name="submit" class="btn btn-primary mb-2">
	</form>';

	
	/*

	<form action='index.php' class="form-inline float-right ">
	 <div class="form-group mx-sm-3 mb-2">
	    <label for="staticEmail2" class="sr-only">Email</label>
	    <input name = "log" type="Login" class="form-control" placeholder="Login">
	  </div>
	  <div class="form-group mx-sm-3 mb-2">
	    <label for="inputPassword2" class="sr-only">Password</label>
	    <input name = "pass" type="password" class="form-control" placeholder="Password">
	  </div>
	  <input type="submit" class="btn btn-primary mb-2">
	</form>*/
	}

	else
	{
		include_once('functions.php');
		if(login($_POST['log'], $_POST['pass']))
			echo '<script>window.location.reload()</script>';

	}
}



?>