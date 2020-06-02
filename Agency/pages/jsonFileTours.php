<?php

$id= $_GET['id'];

class Tour 
{
	public $hotel;
	public $country;
	public $city;
	public $price;
	public $stars;

	function __construct($hotel="", $country="", $city="", $price="", $stars="")
	{
		$this->hotel = $hotel;
		$this->country = $country;
		$this->city = $city;
		$this->price = $price;
		$this->stars = $stars;
	}

	public function __toString()
	{
		$str = "hotel: ".$this->hotel."<br>";
		$str .= "country: ".$this->country."<br>";
		$str .= "city: ".$this->city."<br>";
		$str .= "price: ".$this->price."<br>";
		$str .= "stars: ".$this->stars."<br>";

		return $str;
	}

	public function __set($property, $value)
	{
		if(property_exists($this, $property))
			$this->$property = $value;
	}

	public function __get($property)
	{
		if(property_exists($this, $property))
			return $this->$property;
	}

}

$tours = [];

include_once('functions.php');

$link = connect();

$q3 = mysqli_query($link, 'Select H.id, H.hotel, C.country, Ci.city, H.cost, H.stars from hotels as H
			join countries as C on C.id = H.countryid
                      JOIN cities as Ci on Ci.id = H.cityid where H.cityid = '.$id);

						for ($c=0; $c < mysqli_num_rows($q3); $c++)
						{
							$f3 = mysqli_fetch_array($q3);

							$t = new Tour;
							$t->hotel = $f3[hotel];
							$t->country = $f3[country];
							$t->city = $f3[city];
							$t->price = $f3[cost];
							$t->stars = $f3[stars];

							$tours[] = $t;

						}

						mysqli_free_result($q3);

	$jspoint = json_encode($tours);

	file_put_contents('jsonpoint.txt', $jspoint);



	$jspoint2=file_get_contents('jsonpoint.txt');
    $tours2=json_encode($jspoint2);
    var_dump($tours2);



?>
