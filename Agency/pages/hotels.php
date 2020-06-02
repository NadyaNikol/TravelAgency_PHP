<div class="col-sm-6 col-md-6 col-lg-6 left">
	<!-- section A: for form Countries -->

		<form action="index.php?page=3" method="post">
			<table class="table table-striped">
			 <thead>
			   <tr>
			     <th scope="col">ID</th>
			     <th scope="col">City-Country</th>
			     <th scope="col">Name of hotel</th>
			     <th scope="col">Stars</th>
			     <th scope="col">Choose</th>
			   </tr>
			 </thead>
			  <tbody>

				<?php

					$link = connect();


					$sel = mysqli_query($link, 'Select H.id, Ci.city, C.country, H.hotel, H.stars from hotels H
					join countries as C on C.id = H.countryid
                    JOIN cities as Ci on Ci.id = H.cityid');

					for ($c=0; $c < mysqli_num_rows($sel); $c++)
					{
						echo "<tr>";
						$f = mysqli_fetch_array($sel);
						echo "<td>$f[id]</td><td>$f[city]-$f[country]</td><td>$f[hotel]</td><td>$f[stars]</td>";
						echo "<td><input type='checkbox' name= 'cb".$f[0]."''></td>";
						echo "</tr>";
					}


					/*заполнение select*/
					$select = '<select class="form-control" style="width: 50%" name="selhotel">';


					$sel2 = mysqli_query($link, 'Select Ci.id, C.id, Ci.city, C.country from cities as Ci
					join countries as C on C.Id = Ci.countryid');

					for ($c=0; $c < mysqli_num_rows($sel2); $c++)
					{
						$f = mysqli_fetch_array($sel2);
						$select .= "<option value=$f[0]|$f[1]>$f[city] : $f[country]</option>";
					}


					$select .='</select>';
					mysqli_free_result($sel);

				?>

			  </tbody>
			</table>

			<?php echo $select;
		

			 ?>

			<input type="text" name="newhotel" placeholder="hotel" class="form-control" style="width: 50%">
			<input type="text" name="cost" placeholder="cost" class="form-control" style="width: 50%">
			<input type="text" name="stars" placeholder="stars" class="form-control" style="width: 50%">
			<input type="text" name="info" placeholder="info" class="form-control" style="width: 50%">
			<input type="submit" name="addhotel" type="button" class="btn btn-warning" value="ADD">
			<input type="submit" name="delhotel" class="btn btn-danger" value="DELETE">

		</form>

	</div>


<?php
/*
	mysqli_mysql_free_result($link, $sel);
			mysqli_mysql_free_result($link, $sel2);*/

if(isset($_POST['addhotel']))
{

	$w = explode('|', $_POST['selhotel']);


$q = mysqli_query($link, 'INSERT INTO `hotels` (`id`, `hotel`, `cityid`, `countryid`, `stars`, `cost`, `info`) VALUES (NULL, "'.$_POST['newhotel'].'", "'.$w[0].'", "'.$w[1].'", "'.$_POST['stars'].'", "'.$_POST['cost'].'", "'.$_POST['info'].'");');

	if($q)
		echo '<script>window.location="index.php?page=3";</script>';	


}

 if(isset($_POST['delhotel']))
{
	include_once('functions.php');
	deleteInTable('hotels');

}


?>