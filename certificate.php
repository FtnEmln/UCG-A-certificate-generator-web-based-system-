<!doctype html>
<html>
	
<head>
<meta charset="utf-8">
<title>Certificate</title>
<link href="css/main2.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"
function PrintNi(main) {
     var printContents = document.getElementById(main).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
	
function PrintNii(main) {
     var printContents = document.getElementById(main).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script src="http://use.edgefonts.net/alex-brush:n4:default;abril-fatface:n4:default;arapey:n4:default;andada:n4:default;allura:n4:default;dancing-script:n4:default;arvo:n4:default;pt-serif-caption:n4:default;actor:n4:default.js" type="text/javascript"></script>

</head>

<body>
	<div class="sidenav">
		<h3 class="bar-item">E-SIJIL</h3>
	  	<a href="index.html"  >Home<img src="images/home-white.png" style="width:19px;float:right" alt="home"></a>
	  	<a href="addnew.php">Add New<img src="images/add-user.png" style="width:17px;float:right" alt="add"></a>
	  	<a href="history.php">History<img src="images/history.png" style="width:17px;float:right" alt="history"></a>
	  	<a href="caunselor.php">Counselor<img src="images/user.png" style="width:17px;float:right" alt="history"></a>
		<form method="POST" action="logout.php">
			<a><input type="submit" value="Logout" name="logout"><img src="images/log-out.png" style="width:17px;float:right" alt="log out"></a>
		</form>
	</div>
				<?php 
					include "include_db.php";
					$test="select sijil_id from sijil order by sijil_id desc";/*to find id of the generated sijil*/
					$result4=mysqli_query($connect,$test);
					$row = mysqli_fetch_assoc($result4);
					$maxid=$row['sijil_id'];
	
					if(isset($_GET['id'])){
						$view=$_GET['id'];
						$sql="select *from sijil where sijil_id='".$view."'";/*to find certificate info */
					}
					else{
						$sql="select *from sijil where sijil_id='".$maxid."'";/*to find certificate info */
					}

					$result1=mysqli_query($connect,$sql);
					$row1 = mysqli_fetch_assoc($result1);
					$cid = $row1['caunselor_id'];
					
					$sql2="select *from caunselor where caunselor_id='".$cid."' ";/*to find caunselor info*/
					$result2=mysqli_query($connect,$sql2);
					$row2 = mysqli_fetch_assoc($result2);
				
					$sql3="select *from penyertaan where penyertaan_id='".$maxid."'";/*to find if the certificate type*/
					$result3=mysqli_query($connect,$sql3);
					$penyertaan=mysqli_fetch_assoc($result3);
				
					$sql4="select *from penhargaan where penhargaan_id='".$maxid."'";/*to find if the certificate type*/
					$result4=mysqli_query($connect,$sql4);
					$penhargaan=mysqli_fetch_assoc($result4);
					

					if(isset($penhargaan)){

						echo '<div class="main" id="print-ni-bodoh" >';
							echo '<div class="an-box" >';
								echo '<div class="cert-box" id="cert">';
									echo '<div class="cert-logo"><img src="images/uitm logo.png" style="width:200px;" alt="uitm logo"></div>';
									echo '<div class="cert-logo">Sijil Penghargaan</div>';
									echo '<div class="cert-line"><b>Merakamkan Setinggi-tinggi Penghargaan dan Terima Kasih</b></div>';
									echo '<div class="cert-line b">Kepada</div>';
									echo '<div class="cert-line c">'.$row1['name'].'<br>('.$row1['class'].')</div>';
									echo '<div class="cert-line d">atas penyertaan dalam</div> ';
									echo '<div class="cert-line c">'.$row1['event'].'</div>';
									echo '<div class="cert-line d">pada</div>';
									echo '<div class="cert-line c">'.date('d F Y', strtotime($row1['date'])).'</div>';
									echo '<div class="sign-cert"><img src="data:image/jpeg;base64,'.base64_encode( $row2['sign'] ).'" style="width:100px" alt="sign"/></div>';
									echo '<div class="sign-name"><b>'.$row2['name'].'</b><br>'.$row2['position'].'</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					
					

				?>
		<div class="main">
		<div class="cert-btn">
			<input type="button" value="PRINT" onclick="PrintNi('print-ni-bodoh')" />
		</div>
	</div>
	<?php }
				if(isset($penyertaan)){

						echo '<div class="main" id="print-ni-pandai" >';
							echo '<div class="an-box" >';
								echo '<div class="cert-box" id="cert">';
									echo '<div class="cert-logo"><img src="images/uitm logo.png" style="width:200px;" alt="uitm logo"></div>';
									echo '<div class="cert-logo">Sijil Penyertaan</div>';
									echo '<div class="cert-line"><b>Adalah dengan ini diakui bahawa</b></div>';
									echo '<div class="cert-line c">'.$row1['name'].'<br>('.$row1['class'].')</div>';
									echo '<div class="cert-line d">telah mengambil bahagian dalam</div> ';
									echo '<div class="cert-line c">'.$row1['event'].'</div>';
									echo '<div class="cert-line d">pada</div>';
									echo '<div class="cert-line c">'.date('d F Y', strtotime($row1['date'])).'</div>';
									echo '<div class="sign-cert"><img src="data:image/jpeg;base64,'.base64_encode( $row2['sign'] ).'" style="width:100px" alt="sign"/></div>';
									echo '<div class="sign-name"><b>'.$row2['name'].'</b><br>'.$row2['position'].'</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
							
	?>
			<div class="main">
		<div class="cert-btn">
			<input type="button" value="PRINT" onclick="PrintNii('print-ni-pandai')" />
		</div>
	</div>
	<?php }	?>
</body>

</html>
