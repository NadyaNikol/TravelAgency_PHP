<?php

include_once('functions.php');
		$link=connect();

		$text = $_POST['text'];
		$text = strtolower($text);

		$q2 = mysqli_query($link, 'select login from users where login="'.$text.'"');

		if ($q2 && mysqli_num_rows($q2)>0)
		{
			/*$f2 = mysqli_fetch_array($q2);
			echo "<option value = '$f2[0]'>$f2[1]</option>";*/
			echo "true";
		}

		 mysqli_free_result($q2);

?>