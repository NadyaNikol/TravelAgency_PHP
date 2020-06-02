<div class="col-sm-6 col-md-6 col-lg-6 left">
	<!-- section A: for form Countries -->

		<form action="index.php?page=3" method="post">
			<table class="table table-striped">
			 <thead>
			   <tr>
			     <th scope="col">ID</th>
			     <th scope="col">City</th>
			     <th scope="col">Country</th>
			      <th scope="col">Choose</th>
			   </tr>
			 </thead>
			  <tbody>

				<?php

					$link = connect();


					$sel = mysqli_query($link, 'Select Ci.id, Ci.city, C.country from cities as Ci
					join countries as C on C.id = Ci.countryid');

					for ($c=0; $c < mysqli_num_rows($sel); $c++)
					{
						echo "<tr>";
						$f = mysqli_fetch_array($sel);
						echo "<td>$f[id]</td><td>$f[city]</td><td>$f[country]</td>";
						echo "<td><input type='checkbox' name= 'cb".$f[0]."''></td>";
						echo "</tr>";

					}


					/*заполнение select*/
					$select = '<select class="form-control" style="width: 50%" name="selcountry">';


					$sel2 = mysqli_query($link, 'select * from countries');

					for ($c=0; $c < mysqli_num_rows($sel2); $c++)
					{
						$f = mysqli_fetch_array($sel2);
						$select .= "<option value = '$f[id]'>$f[country]</option>";
					}


					$select .='</select>';
					mysqli_free_result($sel);

				?>

			  </tbody>
			</table>

			<?php echo $select;

			 ?>

			<input type="text" name="newcity" placeholder="city" class="form-control" style="width: 50%">
			<input type="submit" name="addcity" type="button" class="btn btn-warning" value="ADD">
			<input type="submit" name="delcity" class="btn btn-danger" value="DELETE">

		</form>

	</div>


<?php


if(isset($_POST['addcity']))
{

$q = mysqli_query($link, 'INSERT INTO `cities` (`id`, `city`, `countryid`) VALUES (NULL, "'.$_POST['newcity'].'", "'.$_POST['selcountry'].'");');

	if($q)
		echo '<script>window.location="index.php?page=3";</script>';

}

 if(isset($_POST['delcity']))
{
	include_once('functions.php');
	deleteInTable('cities');

}


?>