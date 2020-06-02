<?php

include_once('functions.php');

#createDB('TravelAgencyDB');

$link = connect();

/*$ct1='create table countries(
id int not null auto_increment primary key,
country varchar(64) unique not null
)default charset="utf8"';

mysqli_query($link, $ct1);
$err=mysqli_errno($link);

if ($err)
{
	echo 'Error code 1:'.$err.'<br>';
	exit();
}*/


/*$ct2='create table cities(
id int not null auto_increment primary key,
city varchar(64) not null,
countryid int,
foreign key(countryid) references countries(id)
on delete cascade,
ucity varchar(100),
unique key ucity(city, countryid)
)default charset="utf8"';





mysqli_query($link, $ct2);


$err=mysqli_errno($link);

if ($err)
{
	echo 'Error code 2:'.$err.'<br>';
	exit();
}*/

/*$ct22= 'CREATE UNIQUE INDEX ucity
ON cities(city, countryid);';
mysqli_query($link, $ct22);*/



$ct3='create table hotels(
id int not null auto_increment primary key,
hotel varchar(64),
cityid int,
foreign key(cityid) references cities(id)
on delete cascade, 
countryid int,
foreign key(countryid) references countries(id)
on delete cascade, 
stars int not null,
cost double not null,
info varchar(1024)
)default charset="utf8"';

mysqli_query($link, $ct3);
$err=mysqli_errno($link);

if ($err)
{
	echo 'Error code 3:'.$err.'<br>';
	exit();
}


$ct4='create table images(
id int not null auto_increment primary key,
hotelid int,
foreign key(hotelid) references hotels(id)
on delete cascade, 
imagepath varchar(128)
)default charset="utf8"';

mysqli_query($link, $ct4);
$err=mysqli_errno($link);

if ($err)
{
	echo 'Error code 4:'.$err.'<br>';
	exit();
}


/*$ct5='create table roles(
id int not null auto_increment primary key,
role varchar(128) unique not null
)default charset="utf8"';


mysqli_query($link, $ct5);
$err=mysqli_errno($link);

if ($err)
{
	echo 'Error code 5:'.$err.'<br>';
	exit();
}
*/

/*$ct6='create table users(
id int not null auto_increment primary key,
login varchar(128) unique not null,
pass varchar(128) not null,
email varchar(128) unique not null,
roleid int,
foreign key(roleid) references roles(id)
on delete cascade,
discount double,
avatar varchar(128)
)default charset="utf8"';


mysqli_query($link, $ct6);
$err=mysqli_errno($link);

if ($err)
{
	echo 'Error code 6:'.$err.'<br>';
	exit();
}*/




/*mysqli_query($link, 'INSERT INTO `Roles` (`Id`, `Role`) VALUES 
      (NULL, "Admin")');

mysqli_query($link, 'INSERT INTO `Roles` (`Id`, `Role`) VALUES 
      (NULL, "Customer")');*/


   # echo '<script>window.location="index.php";</script>';



?>