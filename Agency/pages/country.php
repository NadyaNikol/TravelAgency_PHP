<div class="col-sm-6 col-md-6 col-lg-6 left">
	<!-- section A: for form Countries -->

		<form action="index.php?page=3" method="post">
			<table class="table table-striped">
			 <thead>
			   <tr>
			     <th scope="col">ID</th>
			     <th scope="col">Country</th>
			     <th scope="col">Choose</th>
			   </tr>
			 </thead>
			  <tbody>

				<?php

					$link = connect();

					$sel = mysqli_query($link, 'select * from countries');

					for ($c=0; $c < mysqli_num_rows($sel); $c++)
					{
						echo "<tr>";
						$f = mysqli_fetch_array($sel);
						echo "<td>$f[id]</td><td>$f[country]</td>";
						echo "<td><input type='checkbox' name= 'cb".$f[0]."''></td>";
						echo "</tr>";
					}

					mysqli_free_result($sel);

				?>

			  </tbody>
			</table>

			<input type="text" name="newcountry" placeholder="country" class="form-control" style="width: 50%">
			<input type="submit" name="addcountry" type="button" class="btn btn-warning" value="ADD">
			<input type="submit" name="delcountry" class="btn btn-danger" value="DELETE">

		</form>

	</div>


<?php


if(isset($_POST['addcountry']))
{

$q = mysqli_query($link, 'INSERT INTO `countries` (`id`, `country`) VALUES (NULL, "'.$_POST['newcountry'].'")');

	if($q)
		echo '<script>window.location="index.php?page=3";</script>';

			mysqli_mysql_free_result($link, $q);

}

 if(isset($_POST['delcountry']))
{

include_once('functions.php');
	deleteInTable('countries');
	
}


?>