<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>History</title>
<link href="css/main2.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/actor:n4:default;abel:n4:default;lato:n1:default.js" type="text/javascript"></script>

</head>

<body>
	<div class="sidenav">
		<h3 class="bar-item">E-SIJIL</h3>
	  	<a href="index.html"  >Home<img src="images/home-white.png" style="width:19px;float:right" alt="home"></a>
	  	<a href="addnew.php">Add New<img src="images/add-user.png" style="width:17px;float:right" alt="add"></a>
	  	<a href="history.php" class="active">History<img src="images/history.png" style="width:17px;float:right" alt="history"></a>
	  	<a href="caunselor.php">Counselor<img src="images/user.png" style="width:17px;float:right" alt="history"></a>
		<form method="POST" action="logout.php">
			<a><input type="submit" value="Logout" name="logout"><img src="images/log-out.png" style="width:17px;float:right" alt="log out"></a>
		</form>
	</div>
	<div class="main">
		<div class="an-box">
			<div class="an-box-in b">
				<h3>History</h3>
				<p>The table shows past generated certificate(s)</p>
				<form id="search" method="POST" action="history.php">
					<input type="text" placeholder="Search..." name="search">
					<input type="submit" value="search" name="submit">
				</form>
				<table id="history">
				<form method="POST">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Class</th>
						<th>Event</th>
						<th>Sign</th>
						<th>Date</th>
						<th>Actions</th>
					</tr>
					<?php 
					include "include_db.php";
					session_start();
			

					$count=0;
					
					if(isset($_POST['submit'])){
						$search=$_POST['search'];
						/*$sql3="select *from sijil where sijil_id='".$search."' OR name='".$search."' OR class='".$search."' OR event='".$search."' OR date='".$search."' ";*/
						/*$sql3="select *from sijil where sijil_id like '%$search%' OR name like '%$search%' OR class like '%$search%' OR event like '%$search%' OR date like '%$search%'";*/
						
						$sql3="select sijil.sijil_id, sijil.name, sijil.class, sijil.event, sijil.date, sijil.caunselor_id from `sijil` inner join caunselor on sijil.caunselor_id=caunselor.caunselor_id where sijil.sijil_id like '%$search%' OR sijil.name like '%$search%' OR sijil.class like '%$search%' OR sijil.event like '%$search%' OR sijil.date like '%$search%' OR caunselor.name like '%$search%'";
						
						$result = mysqli_query($connect,$sql3);
					}
					else{
						$sql="select *from sijil order by sijil_id asc";
						$result = mysqli_query($connect,$sql);
					}
					
					while($row = mysqli_fetch_assoc($result)){
						$sql2="select name from caunselor where caunselor_id='".$row['caunselor_id']."'";
						$result2 = mysqli_query($connect,$sql2);
						$row2 = mysqli_fetch_assoc($result2);

						/*echo '<tr onClick="certificate.php?id='.$row['sijil_id'].'" >';*/
						echo '<tr onClick= >';
						echo '<td>'.$row['sijil_id'].'. </td>';
						echo '<td style="max-width:150px;">'.$row['name'].'</td>';
						echo '<td style="max-width:100px;overflow:hidden">'.$row['class'].'</td>';
						echo '<td  style="max-width:150px;">'.$row['event'].'</td>';
						echo '<td style="width:150px;">'.$row2['name'].'</td>';
						echo '<td>'.date('d F Y', strtotime($row['date'])).'</td>';
						echo '<td>';
						echo '<a href="updateinfo.php?id='.$row['sijil_id'].'"><input type="button" value="Update" class="h-btn u"></a>';
						echo '<a href="delete.php?id='.$row['sijil_id'].'"><input type="button" value="Delete" onClick=deleteCert() class="h-btn d"></a>';
						echo '<a href="certificate.php?id='.$row['sijil_id'].'"><input type="button" value="view" class="h-btn v" name="view"></a>';
						echo '</td>';
						echo '</tr>';
						$count++;
						}
					?>
				</form>
				</table>
				<div class="history-total">
					Total : <?php echo $count ?>
				</div>
			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(function($) {
		$(".clickable-row").click(function() {
			window.location = $(this).data("href");
			});
		});
		
		function deleteCert() {
		  var txt;
		  if (confirm("Are you sure ? ")) {
			location.href='delete.php';
		  } else {
			txt = "You pressed Cancel!";
		  }
		  document.getElementById("demo").innerHTML = txt;
		}
	</script>
</body>
</html>
