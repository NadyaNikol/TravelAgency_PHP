<div class="col-sm-6 col-md-6 col-lg-6 left">

		<form action="index.php?page=3" method="post" enctype='multipart/form-data'>
			<select class="form-control" style="width: 50%" name="selhotel">
			
				<?php

					$link = connect();

					$sel2 = mysqli_query($link, 'Select H.id, Ci.city, C.country, H.hotel  from hotels as H
					join countries as C on C.Id = H.countryid
                    JOIN cities as Ci on Ci.id = H.cityid');

					for ($c=0; $c < mysqli_num_rows($sel2); $c++)
					{
						$f = mysqli_fetch_array($sel2);
						echo "<option value=$f[id]>$f[city] $f[country] $f[hotel]</option>";
					}

					mysqli_free_result($sel2);

				?>


				</select>

		<div class="form-group">
<!-- 			<label for="file">Select file for upload:</label>
<input type="hidden" name="MAX_FILE_SIZE" value="1024*1024*3" />
<input type="file" name="file[]" multiple accept="image/*">
<input type="file" name="file[]" multiple accept="image/*"> -->

	<input upload_max_filesize = "50M" type='file' name='uploads[]' /><br />
	<input type='file' name='uploads[]' /><br />
	<input type='file' name='uploads[]' /><br />
		</div>
		<input type='submit' name="addimage" value='Загрузить' />

		</form>

	</div>


<?php
if($_FILES)
{
	echo '<script>alert("files uploaded successfully")</script>';

    foreach ($_FILES["uploads"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["uploads"]["tmp_name"][$key];
            $name = $_FILES["uploads"]["name"][$key];
            move_uploaded_file($tmp_name, 'images/'.$name);

            $q = mysqli_query($link, 'INSERT INTO `images` (`id`, `hotelid`, `imagepath`) VALUES (NULL, "'.$_POST['selhotel'].'", "'.$name.'");');

		#mysqli_mysql_free_result($link, $q);	
        }

    }
}

/*if(isset($_POST['addimage']))
{
	foreach($_FILES['file']['name'] as $k => $v)
	{
		if($_FILES['file']['error'][$k] !=0)
		{
			echo '<script>alert("Upload file error:'.$v.'")</script>';
			continue;
		}
	}
		if(move_uploaded_file($_FILES['file']['tmp_name'][$k], 'images/'.$v))
		{
			$ins='insert into images(hotelid, imagepath) values('.$_POST['hotelid'].',"images/'.$v.'")';
			mysqli_query($link,$ins);
		}
}*/

?>