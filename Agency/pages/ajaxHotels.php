
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
	include_once('functions.php');
	$link=connect();


	$q3 = mysqli_query($link, 'Select H.id, H.hotel, C.country, Ci.city, H.cost, H.stars from hotels as H
			join countries as C on C.id = H.countryid
                      JOIN cities as Ci on Ci.id = H.cityid WHERE H.cityid='.$_POST['id']);

						for ($c=0; $c < mysqli_num_rows($q3); $c++)
						{
							echo "<tr>";
							$f3 = mysqli_fetch_array($q3);
							echo "<td>$f3[hotel]</td><td>$f3[country]</td><td>$f3[city]</td><td>$f3[cost]</td><td>$f3[stars]</td>";
							echo '<td><a href="pages/hotelinfo.php?hotel='.$f3[0].'"target="_blank">more info</a></td>';
							echo "</tr>";
						}

						mysqli_free_result($q3);
								

	?>	