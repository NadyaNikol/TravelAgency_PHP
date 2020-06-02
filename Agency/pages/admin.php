<?php
/*$_GET['page'] = 4;*/

if($_SESSION['radmin'])
{
	?>

	<div class="row">
	
	<?php include_once('country.php'); 
		include_once('cities.php');?>

	</div>

<hr/>

	<div class="row">

		<?php include_once('hotels.php'); 
			include_once('images.php'); ?>

	</div>

	<?php
}

else
{
	echo "<h3><span style='color:red'>YOU MUST BE ADMIN!</span></h3>";
}


?>