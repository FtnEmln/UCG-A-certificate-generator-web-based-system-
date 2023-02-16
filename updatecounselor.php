<?php
include "include_db.php";
session_start();
 if(isset($_POST["insert"]))
 {
	  $cid=$_SESSION['caunselor_id'];
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $query = "UPDATE caunselor set sign ='$file' where caunselor_id='".$cid."'";
      if(mysqli_query($connect, $query))
      {
           			echo "<script>
			alert('Updated succesfully !');
			window.location.href='caunselor.php';
			</script>";
      }
 }
 ?>
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
				<h3>Update Counselor</h3>

				<div class="an-form">
					<form method="POST" enctype="multipart/form-data">
						<table id="update">
							<tr>
								<?php 
								session_start();
								$id=$_GET['id'];
								$_SESSION['caunselor_id']=$id;
								include "include_db.php";
								
								$sql="select *from caunselor where caunselor_id='".$id."'";
								$result=mysqli_query($connect,$sql);
								$row = mysqli_fetch_assoc($result);
								
								echo '<tr>';
									echo '<td>ID</td>';
									echo '<td><input type="text" placeholder="'.$id.'" disabled></td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td>Name</td>';
									echo '<td colspan="3"><input type="text" value="'.$row['name'].'" class="long" name="name"></td>';
								echo '</tr>';
								echo '<tr rowspan="2">';
									echo '<tr>';
										echo '<td></td>';
										echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['sign'] ).'" style="width:100px" alt="sign" class="sign"/></td>';
									echo '</tr>';
									echo '<td> <label for="image">Select image </label></td>';
									echo '<td> <input type="file" id="image" name="image"></td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td>Position</td>';
									echo '<td colspan="3"><input type="text" value="'.$row['position'].'" class="long" name="position"></td>';
								echo '</tr>';
								?>
						</table>
					
				</div>
					<div class="an-btn-box">
						<input type="submit" value="UPDATE !" name="insert" id="insert">
					</div>
				</form>
			</div>
		</div>
	</div>
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
</body>
</html>

