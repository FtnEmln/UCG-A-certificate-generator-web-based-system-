<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Information</title>
<link href="css/main2.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/actor:n4:default;lato:n1:default;abel:n4:default.js" type="text/javascript"></script>

</head>

<body>
	<div class="sidenav">
		<h3 class="bar-item">E-SIJIL</h3>
	  	<a href="index.html">Home<img src="images/home-white.png" style="width:19px;float:right" alt="home"></a>
	  	<a href="addnew.php" class="active">Add New<img src="images/add-user.png" style="width:17px;float:right" alt="add"></a>
	  	<a href="history.php">History<img src="images/history.png" style="width:17px;float:right" alt="history"></a>
	  	<a href="caunselor.php">Counselor<img src="images/user.png" style="width:17px;float:right" alt="history"></a>
		<a href="logout.php">Logout<img src="images/log-out.png" style="width:17px;float:right" alt="log out"></a>
	</div>
	<div class="main">
		<div class="an-box b">
			<div class="an-box-in c">
				<h3>Update</h3>

				<div class="an-form">
					<form method="POST" action="update.php">
						<table id="update">
							<?php
								session_start();
								
								$id=$_GET['id'];
								$_SESSION['sijil_id']=$id;
								include "include_db.php";
								$sql="select *from sijil where sijil_id='".$id."'";
								$result = mysqli_query($connect,$sql);
								$row = mysqli_fetch_assoc($result);
							
								echo '<tr>';
									echo '<td>ID</td>';
									echo '<td><input type="text" placeholder="'.$id.'" disabled></td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td>Name</td>';
									echo '<td colspan="3"><input type="text" value="'.$row['name'].'" class="long" name="name"></td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td>Class</td>';
									echo '<td><input type="text" value="'.$row['class'].'" name="class"></td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td>Event</td>';
									echo '<td colspan="3"><input type="text" value="HARI ICT KPKK" class="long" name="event"></td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td>Date</td>';
									echo '<td><input type="date" value="'.$row['date'].'" name="date"></td>';
								echo '</tr>';
							?>

						</table>
						<table id="update2">
						   <tr>
								<td><label for="type">Type of Certificate</label></td>
								<td>
								<?php 
									echo '<input type="checkbox" id="participation" name="participation" value="participation">';
									echo '<label for="participation">Participation</label>';
									echo '<input type="checkbox" id="appreciation" name="appreciation" value="appreciation">';
									echo '<label for="appreciation">Appreciation</label>';
								?>
								</td>
							</tr>
							<tr>
								<td><label for="sign">Caunselor's Sign</label></td>
								<td>
								  <select id="sign" name="sign">
										<option value="1">Dr Mohd Sabri Yakob</option>
										<option value="2">Dr Hamsah Fansurri Ahmad</option>
								  </select>
								</td>
							</tr>
						</table>

					
				</div>
					<div class="an-btn-box">
						<?php echo '<input type="submit" value="UPDATE !" name="submit" >'?>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
