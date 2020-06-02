

<select class="form-control" style="width: 20%" name="selectCity" onchange = "showHotels(this.value)">
	<option selected="0">Select country...</option>
		<?php


		include_once('functions.php');
		$link=connect();

		$q2 = mysqli_query($link, 'select * from cities where countryid="'.$_GET['id'].'"');

		for ($c=0; $c < mysqli_num_rows($q2); $c++)
		{
			$f2 = mysqli_fetch_array($q2);
			echo "<option value = '$f2[0]'>$f2[city]</option>";
		}

		 mysqli_free_result($q2);
	?>
		</select>
