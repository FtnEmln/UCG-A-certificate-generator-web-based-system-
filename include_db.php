<?php

$servername="localhost";
$username="root";
$password="";
$dbname="e-sijil";

$connect=new mysqli($servername,$username,$password,$dbname);

if($connect->connect_error)
{
	echo "failed to connect to mySQL".mysqli_connect_error();
}


?>