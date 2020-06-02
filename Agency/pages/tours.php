

<h5>Select tours</h5>

<select class="form-control" style="width: 20%" name="selcountry" onchange = "showCities(this.value)">
	<option selected="0">Select city...</option>
	
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


<div id="cityid"></div>

<div id="hotels"></div>


<script type="text/javascript">
	
function showCities(value)
{
	if(value=='0')
	{
		document.getElementById("cityid").innerHTML = "";
	}

	if(window.XMLHttpRequest)
	{
		 ao = new XMLHttpRequest(); 
	}

	else
	{
		ao =new ActiveXObject('Microsoft.XMLHTTP');
	}

		
	ao.onreadystatechange = function(){

	if(ao.readyState == 4 && ao.status == 200)
	{				
		resp = ao.responseText;
		document.getElementById("cityid").innerHTML = resp;
	} }


	ao.open("GET", "pages/ajaxCities.php?id=" + value, true);
	ao.send(null);
		
}


function showHotels(value)
{
	if(value=='0')
	{
		document.getElementById("hotels").innerHTML = "";
	}

	if(window.XMLHttpRequest)
	{
		 ao = new XMLHttpRequest(); 
	}

	else
	{
		ao =new ActiveXObject('Microsoft.XMLHTTP');
	}

		
	ao.onreadystatechange = function(){

	if(ao.readyState == 4 && ao.status == 200)
	{				
		resp = ao.responseText;
		document.getElementById("hotels").innerHTML = resp;
	} }


	ao.open("GET", "pages/jsonFileTours.php?id=" + value, true);
	ao.send(null);

	/*ao.open("POST", "pages/ajaxHotels.php", true);
	ao.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	ao.send("id=" +value);*/
		
}



</script>