<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New</title>
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
		<form method="POST" action="logout.php">
			<a><input type="submit" value="Logout" name="logout"><img src="images/log-out.png" style="width:17px;float:right" alt="log out"></a>
		</form>
	</div>
	<div class="main">
		<div class="an-box">
			<div class="an-box-in">
				<img src="images/kk.png" style="width:500px;height:200px" alt="pic">
				<a>GENERATE NEW CERTIFICATE</a><br>
				<p class="fill"><b>Simply fill in the form and click generate once ready</b></p>
			</div>
	  </div>
		<div class="an-box b">
			<div class="an-box-in b">
				<h3>Fill in below</h3>
				<p>Create new certificate in under a minute !</p>
				<form method="POST" action="sijil.php">
					<div class="an-form">

							<table id="newcert">
								<tr>
									<td>ID</td>
			
									<?php 
										session_start();
										include "include_db.php";
										$id=$_SESSION['id'];
										$test="select sijil_id from sijil order by sijil_id desc";
										$result4=mysqli_query($connect,$test);
										$row = mysqli_fetch_assoc($result4);
										$maxid=$row['sijil_id']+1;
										echo '<td>';
										echo '<input type="text" value="'.$maxid.'" disabled style="background-color:#ACB6D1">';
										echo '</td>';
																			
									?>
								</tr>
								<tr>
									<td>Name</td>
									<td colspan="3"><input type="text" name="name" placeholder="Name..." class="long" required></td>
								</tr>
								<tr>
									<td>Class</td>
									<td><input type="text" placeholder="Class..." name="class" required></td>
								</tr>
								<tr>
									<td>Event</td>
									<td colspan="3"><input type="text" placeholder="Event..." class="long" name="event" required></td>
								</tr>							
								<tr>
									<td>Date</td>
									<td><input type="date" name="date" required></td>
								</tr>
							</table>
							<table id="botom">
							   <tr>
									<td>
										<label for="type">Type of Certificate</label>
										
								    </td>
									<td>
										<input type="checkbox" id="participation" name="participation" value="participation">
										<label for="participation">Participation</label>
										<!--<select id="type" name="type">
											<option value="participation">Participation</option>
											<option value="appreciation">Appreciation</option>
										</select>-->
									</td>
								   <td>
									   	<input type="checkbox" id="appreciation" name="appreciation" value="appreciation">
										<label for="appreciation">Appreciation</label>
								   </td>
								</tr>
								<tr>
									<td ><label for="sign">Caunselor's Sign</label></td>
									<td colspan="2">  
									  <select id="sign" name="sign">
										  <?php 
										  $sql="select *from caunselor order by caunselor_id ASC";
										  $can=mysqli_query($connect,$sql);
										  while($row = mysqli_fetch_assoc($can)){
											  echo '<option value="'.$row['caunselor_id'].'">'.$row['name'].'</option>';
										  }
										  ?>
									  </select>
									</td>
								</tr>
							</table>
					</div>
						<div class="an-btn-box">
							<input type="submit" value="GENERATE !" name="submit">
						</div>
				</form>
			</div>
		</div>

	</div>
</body>
</html>
