<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="css/main2.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/actor:n4:default;lato:n4,n1:default;abel:n4:default.js" type="text/javascript"></script>

</head>

<body>
	<div class="sidenav">
		<h3 class="bar-item">E-SIJIL</h3>
	  	<a href="index.html"  class="active">Home<img src="images/home-white.png" style="width:19px;float:right" alt="home"></a>
	  	<a href="addnew.php">Add New<img src="images/add-user.png" style="width:17px;float:right" alt="add"></a>
	  	<a href="history.php">History<img src="images/history.png" style="width:17px;float:right" alt="history"></a>
	  	<a href="caunselor.php">Counselor<img src="images/user.png" style="width:17px;float:right" alt="history"></a>
		<form method="POST" action="logout.php">
			<a><input type="submit" value="Logout" name="logout"><img src="images/log-out.png" style="width:17px;float:right" alt="log out"></a>
		</form>
	</div>
	<div class="main">
		<div class="home-box" id="main">
			<div class="home-box-in">
				<img src="images/uitm logo.png" style="width:200px" alt="uitm logo">
			</div>
			<div class="desc">
				<?php 
					session_start();
					$id=$_SESSION['id'];
				?>
				<h3>About Us</h3>
				E-Sijil is an online certificate generator made to serve UiTM students. The idea was born out by UiTM's very own stduents.Below is details of those said students.
			</div>
			<table id="details">
				<tr>
					<th>Name</th>
					<th style="text-align: center">Picture</th>
					<th>Matrix No.</th>
					<th>NRIC</th>
					<th>Program</th>
					<th>Group</th>
					<th>Email</th>
				</tr>
				<tr>
					<td>Amalia Natasha bt Mohd Puat</td>
					<td><img src="images/amalia.png" style="width:90px;height:90px;border-radius: 100px" alt="amalia" class="zoom"></td>
					<td>2018269748</td>
					<td>000828-14-1322</td>
					<td>Computer Science (CS110)</td>
					<td>CS1105F</td>
					<td>amaliantsha@gmail.com</td>
				</tr>
				<tr>
					<td>Fatin Nurul Amalin Binti Faizu</td>
					<td><img src="images/fatin.jpeg" style="width:90px;height:90px;border-radius: 100px" alt="fatin" class="zoom"></td>
					<td>2018404698</td>
					<td>001206-08-1200</td>
					<td>Computer Science (CS110)</td>
					<td>CS1105F</td>
					<td>fatinamalin53@gmail.com</td>
				</tr>
				<tr>
					<td>Nur Rashiqah Abdul Wahid</td>
					<td><img src="images/cika.jpeg" style="width:90px;height:90px;border-radius: 100px" alt="shiqah" class="zoom"></td>
					<td>2018232516</td>
					<td>00122-00-11874</td>
					<td>Computer Science (CS110)</td>
					<td>CS1105F</td>
					<td>shiqah123@gmail.com</td>
				</tr>
				<tr>
					<td>Nor Sofea Erissa Bt Noorhisham</td>
					<td><img src="images/PicSofea.JPG" style="width:90px;height:90px;border-radius: 100px" alt="sofea" class="zoom"></td>
					<td>2018220302</td>
					<td>001030-03-0556</td>
					<td>Computer Science (CS110)</td>
					<td>CS1105F</td>
					<td>Sofeaerissa@gmail.com</td>
				</tr>
				<tr>
					<td>Nur Aqilah Binti Mohd Sharif</td>
					<td><img src="images/aqilah.jpeg" style="width:90px;height:90px;border-radius: 100px" alt="aqilah" class="zoom"></td>
					<td>2018244162</td>
					<td>001113-01-0374</td>
					<td>Computer Science (CS110)</td>
					<td>CS1105F</td>
					<td>nuraqilahsharif13@gmail.com</td>
				</tr>
			</table>
			<img src="images/People of Brooklyn - Home Studio.png" alt="book" style=" width:300px;margin-left:350px;">
		</div>
	</div>
</body>
</html>
