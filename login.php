<?php
session_start();
include "include_db.php";

if(isset($_POST["login"])){
	
	$id=mysqli_real_escape_string($connect,$_POST["username"]);
	$pass=mysqli_real_escape_string($connect,$_POST["password"]);


	if($id!=""&&$pass!=""){
		 $sql_query = "select count(*) as cntUser from admin where admin_id='".$id."' and password='".$pass."'";
		 $result = mysqli_query($connect,$sql_query);
		 $row = mysqli_fetch_array($result);

		 $count = $row['cntUser'];

		  if($count > 0){
			 $_SESSION['id'] = $id;
			  echo "login succesfully";
			// header('Location: ../Student/stud_main.html'); was
			 header('Location: index.php');//current that works
		  }
		  else{
				echo "Invalid username and password";
		  }
	}
}

?>
