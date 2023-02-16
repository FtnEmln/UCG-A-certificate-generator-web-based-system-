<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Caunselor</title>
<link href="css/main2.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/actor:n4:default;abel:n4:default;lato:n1:default.js" type="text/javascript"></script>

</head>

<body>
	<div class="sidenav">
		<h3 class="bar-item">E-SIJIL</h3>
	  	<a href="index.html">Home<img src="images/home-white.png" style="width:19px;float:right" alt="home"></a>
	  	<a href="addnew.php" >Add New<img src="images/add-user.png" style="width:17px;float:right" alt="add"></a>
	  	<a href="history.php" >History<img src="images/history.png" style="width:17px;float:right" alt="history"></a>
	  	<a href="caunselor.php" class="active">Counselor<img src="images/user.png" style="width:17px;float:right" alt="history"></a>
		<a href="logout.php">Logout<img src="images/log-out.png" style="width:17px;float:right" alt="log out"></a>
	</div>
	<div class="main">
		<div class="an-box">
			<div class="an-box-in b">
				<h3>Counselor</h3>
				<p>The table shows details of counselors that are signing the certificates</p>
				<table id="history">
				<form method="POST" >
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Sign</th>
						<th>Position</th>
						<th>Actions</th>
					</tr>
				
						<?php 
						include "include_db.php";
						
						$sql="select *from caunselor order by caunselor_id asc";
						$result = mysqli_query($connect,$sql);
						while($row = mysqli_fetch_assoc($result)){
							echo '<tr>';
							echo '<td>'.$row['caunselor_id'].'. </td>';
							echo '<td  style="max-width:150px;">'.$row['name'].'</td>';
							echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['sign'] ).'" style="width:100px" alt="sign"/></td>';
							echo '<td style="max-width:150px;">'.$row['position'].'</td>';
							echo '<td>';
							echo '<a href="updatecounselor.php?id='.$row['caunselor_id'].'"><input type="button" value="Update" class="h-btn u"></a>';
							echo '<a href="deletecaunselor.php?id='.$row['caunselor_id'].'"><input type="button" value="Delete" onClick=deleteCert() class="h-btn d"></a>';
							echo '</td>';
							echo '</tr>';
						}
						?>
				</form>
				</table>
				<div class="addnewc-box">
					<a href="addnewcounselor.php" style="float:right">
						<button><img src="images/addcaunselor.png" style="width:40px;float:right" alt="addnew"></button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<script>
				function deleteCert() {
		  var txt;
		  if (confirm("Are you sure ? ")) {
			location.href='deletecaunselor.php';
		  } else {
			txt = "You pressed Cancel!";
		  }
		  document.getElementById("demo").innerHTML = txt;
		}

	</script>
</body>
</html>
