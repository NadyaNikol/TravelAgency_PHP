<?php

function createDB($dbname, $host = "localhost", $user = "root", $password = "")
{

	$link = mysqli_connect($host,$user,$pass) or die('connection error');

	$sql = 'CREATE DATABASE '.$dbname.'';

	if (mysqli_query($link, $sql)) {
	    echo "База успешно создана";
	} 

	else 
	{
	    echo 'Ошибка при создании базы данных: '.mysql_error();
	}
}



function connect($host = "localhost", $user = "root", $password = "", $dbname = "travelagencydb")
{

	$link = mysqli_connect($host,$user,$pass) or die('connection error');

	mysqli_select_db($link, $dbname) or die('DB open error');
	mysqli_query($link, "set names 'utf8'");


	return $link;
}


function register($login, $password, $email)
{

	$isGood = true;

	$ll= strlen($login);
	$lp= strlen($password);

	if($ll < 3 || $ll > 30 || $lp < 3 || $lp > 30)
	{
		echo "<h3><span style='color:red'>VALUES LENGTH MUST BE BETWEEN 3 AND 30</span></h3>";
		$isGood = false;
	}

	if($isGood)
	{
		$link = connect();

		$sel = mysqli_query($link, 'select * from users where login="'.$login.'"');

		#если такого логина нет
		if(mysqli_num_rows($sel)===0)
		{
			$q = mysqli_query($link, 'insert into `users` (`id`, `login`, `pass`, `email`, `roleid`, `discount`, `avatar`) VALUES (NULL, "'.$login.'", "'.$password.'", "'.$email.'", "2", NULL, NULL)');

			if($q)
				echo "<h3><span style='color:green'>NEW USER ADDED!</span></h3>";
		}
		/*else
			echo "<h3><span style='color:red'>CHANGE LOGINE!</span></h3>";*/

		mysqli_mysql_free_result($link, $sel);
	}

}


function login($login, $password)
{

	$link = connect();

	$q = mysqli_query($link, 'select * from users where login="'.$login.'"');

	if($q && mysqli_num_rows($q)>0)
	{
		$f = mysqli_fetch_array($q);

		if($f[roleid]==1)
		$_SESSION['radmin'] = $login;

		else
		$_SESSION['ruser'] = $login;

		#mysqli_mysql_free_result($link, $q);
		return true;
	}
	
	mysqli_free_result($q);
	echo ' <script>window.location = "index.php?page=3";</script>';
	return false;
}


function deleteInTable($name)
{
	$link = connect();

	foreach ($_POST as $key => $value) {
		if(substr($key, 0,2)=='cb')
		{
			$id=substr($key,2);

			$q = mysqli_query($link, 'DELETE FROM '.$name.' where id='.$id.'');

			if($q)
				echo '<script>window.location="index.php?page=3";</script>';
		}	
	}
}



?>