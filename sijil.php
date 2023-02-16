<?php
include "include_db.php";
session_start();
$id=$_SESSION['id'];

//$test="select sijil_id from sijil where sijil_id='select max(sijil_id)'";
$test="select sijil_id from sijil order by sijil_id desc";
$result4=mysqli_query($connect,$test);
$row = mysqli_fetch_assoc($result4);
$maxid=$row['sijil_id']+1;

if(isset($_POST['submit'])){


$name=$_POST['name'];
$class=$_POST['class'];
$event=$_POST['event'];
$date=$_POST['date'];
$sign=$_POST['sign'];
if(isset($_POST['participation'])){
	$participation=$_POST['participation'];
}

if(isset($_POST['appreciation'])){
	$appreciation=$_POST['appreciation'];
}


	
$sql="insert into sijil(caunselor_id,name,class,event,date) values('$sign','$name','$class','$event','$date')";
$result=mysqli_query($connect,$sql);

if($result){
	
	if(isset($participation)){
		$sql1="insert into penyertaan(penyertaan_id) values('$maxid')";
			$result1=mysqli_query($connect,$sql1);
	}

	if(isset($appreciation)){
		$sql2="insert into penhargaan(penhargaan_id) values('$maxid')";
				$result2=mysqli_query($connect,$sql2);
	}


	echo "<script>
		alert('Certificate successfuly generated!');
		window.location.href='certificate.php';
	</script>";
	//header('Location: certificate.php');
}
	else
		echo "fail";
	
	
}

?>
