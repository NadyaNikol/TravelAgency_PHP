<?php
include_once('functions.php');
/*$_GET['page'] = 5;*/

$link = connect();

if ($_FILES && $_FILES['file']['error']== UPLOAD_ERR_OK)
{
    $fn=$_FILES['file']['tmp_name'];
	$file=fopen($fn,'rb');
	$img=fread($file, filesize($fn));
	fclose($file);

	$img=mysqli_real_escape_string($link, $img);


	$upd='update users set avatar="'.$img.'", roleid=1 where id='.$_POST['selUser'];
	mysqli_query($link, $upd);

}


?>

<form action="index.php?page=4" method="post" enctype='multipart/form-data'>
<select class="form-control" style="width: 20%" name="selUser">

<?php

	$q = mysqli_query($link, 'select * from users where roleid=2');

	for ($c=0; $c < mysqli_num_rows($q); $c++)
		{
			$f1 = mysqli_fetch_array($q);
			echo "<option value = '$f1[0]'>$f1[login]</option>";
		}
?>

</select>
	<div class="form-group">
	<input type='file' name='file' size='10' class="form-control-file" /><br /><br />
	<input type='submit' value='Загрузить' />
	</div>

</form>

<?php

$sel='select * from users where roleid=1 order by login';
$res=mysqli_query($link,$sel);

?>

<table class="table table-striped">

	<?php
	while($row=mysqli_fetch_array($res))
	{
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[3].'</td>';
		$img=base64_encode($row[6]);
		echo '<td><img height="100px"
		src="data:image/jpeg; base64,'.$img.'"/></td>';
	}

	mysqli_free_result($res);
?>
</table>;


