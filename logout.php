<?php

include "include_db.php";


if(isset($_POST['logout'])){
	session_destroy();
			echo "<script>
			alert('Logged out succesfully !');
			window.location.href='login.html';
			</script>";
}

