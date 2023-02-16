<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Counselor</title>
<link href="css/main2.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/actor:n4:default;lato:n1:default;abel:n4:default.js" type="text/javascript"></script>

</head>
<?php
include "include_db.php";
 if(isset($_POST["insert"]))
 {
	  $name=$_POST['name'];
	  $position=$_POST['position'];
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $query = "INSERT INTO caunselor(name,sign,position) VALUES ('$name','$file','$position')";
      if(mysqli_query($connect, $query))
      {
           	echo "<script>
			alert('User Added!');
			window.location.href='caunselor.php';
			</script>";
      }
	 else
		 echo "nope";
 }
 ?>
 <!DOCTYPE html>
<body>
	<div class="sidenav">
		<h3 class="bar-item">E-SIJIL</h3>
	  	<a href="index.html">Home<img src="images/home-white.png" style="width:19px;float:right" alt="home"></a>
	  	<a href="addnew.php" >Add New<img src="images/add-user.png" style="width:17px;float:right" alt="add"></a>
	  	<a href="history.php">History<img src="images/history.png" style="width:17px;float:right" alt="history"></a>
	  	<a href="caunselor.php" class="active">Counselor<img src="images/user.png" style="width:17px;float:right" alt="history"></a>
		<a href="logout.php">Logout<img src="images/log-out.png" style="width:17px;float:right" alt="log out"></a>
	</div>
	<div class="main">
		<div class="an-box b">
			<div class="an-box-in c">
				<h3>Add New Counselor</h3>

				<div class="an-form">
					<form method="POST" enctype="multipart/form-data">
						<table id="update">
							<tr>
								<td>ID</td>
								<td><input type="text" placeholder="4" disabled></td>
							</tr>
							<tr>
								<td>Name</td>
								<td colspan="3"><input type="text" placeholder="Name..." class="long" name="name" required></td>
							</tr>
							<tr>
								<td> <label for="image">Select image </label></td>
								<td> <input type="file" id="image" name="image" required></td>
							</tr>
							<tr>
								<td>Position</td>
								<td colspan="3"><input type="text" placeholder="Position" class="long" name="position" required></td>
							</tr>							
						</table>
					
				</div>
					<div class="an-btn-box">
						<input type="submit" value="Add !" name="insert" id="insert" >
					</div>
					</form>
			</div>
		</div>
	</div>

</body>
</html>
 <script>
 $(document).ready(function(){
      $('#insert').click(function(){
           var image_name = $('#image').val();
           if(image_name == '')
           {
                alert("Please Select Image");
                return false;
           }
           else
           {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                     alert('Invalid Image File');
                     $('#image').val('');
                     return false;
                }
           }
      });
 });
 </script>
