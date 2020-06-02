

<h5>Select tours</h5>

<form method="post" action="index.php?page=1">

<select class="form-control" style="width: 20%" name="selcountry">
	
	<?php

	$link = connect();
	$q = mysqli_query($link, 'select * from countries');

	for ($c=0; $c < mysqli_num_rows($q); $c++)
		{
			$f1 = mysqli_fetch_array($q);
			echo "<option value = '$f1[0]'>$f1[country]</option>";
		}

	?>
</select>

	<input type="submit" name="submitCountry" value="Select country">



<?php

if(isset($_POST['submitCountry']))
{
	?>
	
		<select class="form-control" style="width: 20%" name="selectCity">
		<?php

		$q2 = mysqli_query($link, 'select * from cities where countryid="'.$_POST['selcountry'].'"');

		for ($c=0; $c < mysqli_num_rows($q2); $c++)
		{
			$f2 = mysqli_fetch_array($q2);
			echo "<option value = '$f2[0]'>$f2[city]</option>";
		}
	?>
		</select>

		<input type="submit" name="submitCity" value="Select country">
<?php } ?>

	</form>

			<table class="table table-striped">
				<thead>
				<tr>
				<th scope="col">Hotel</th>
				<th scope="col">Country</th>
				<th scope="col">City</th>
				<th scope="col">Price</th>
				<th scope="col">Stars</th>
				<th scope="col">Link</th>
				</tr>
				</thead>
				<tbody>

					<?php
if(isset($_POST['submitCity']))
{
include_once('functions.php');
$link=connect();


$q3 = mysqli_query($link, 'Select H.id, H.hotel, C.country, Ci.city, H.cost, H.stars from hotels as H
			join countries as C on C.id = H.countryid
                      JOIN cities as Ci on Ci.id = H.cityid WHERE H.cityid='.$_POST['selectCity']);

						for ($c=0; $c < mysqli_num_rows($q3); $c++)
						{
							echo "<tr>";
							$f3 = mysqli_fetch_array($q3);
							echo "<td>$f3[hotel]</td><td>$f3[country]</td><td>$f3[city]</td><td>$f3[cost]</td><td>$f3[stars]</td>";
							echo '<td><a href="pages/hotelinfo.php?hotel='.$f3[0].'"target="_blank">more info</a></td>';
							echo "</tr>";
						}
	mysqli_free_result($q3);					
}



?>