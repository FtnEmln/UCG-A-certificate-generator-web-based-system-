<?php 
include "include_db.php";

session_start();

if(isset($_POST['submit'])){
	
	
	$id=$_SESSION['sijil_id'];
	$admin=$_SESSION['id'];
	$name=$_POST['name'];
	$class=$_POST['class'];
	$event=$_POST['event'];
	$date=$_POST['date'];
	$sign=$_POST['sign'];
	
	
	
	$sql1="select count(*) as cntuser from sijil where sijil_id='".$id."'";
	$result1=mysqli_query($connect,$sql1);
	$row1 = mysqli_fetch_array($result1);
	$count = $row1['cntuser'];
	
	if($count>0){
		$sql="UPDATE sijil set caunselor_id='$sign', name='$name', class='$class', event='$event', date='$date' where sijil_id='".$id."'";
		$result=mysqli_query($connect,$sql);
		
		$sql2="INSERT into edit(admin_id,sijil_id) values('$admin','$id')";
		$result2=mysqli_query($connect,$sql2);
		
		if($result){
			echo "<script>
			alert('Update was successful!');
			window.location.href='history.php';
			</script>";
		}
	else
	{
		echo "error";}
	}
	
}
if(isset($_POST['insert'])){
	
	$cid=$_SESSION['caunselor_id'];
	echo $cid;
	$name=$_POST['name'];
	$img=$_POST['img'];
	$position=$_POST['position'];

	$sql1="select count(*) as cntuser from caunselor where caunselor_id='".$cid."'";
	$result1=mysqli_query($connect,$sql1);
	$row1 = mysqli_fetch_array($result1);
	$count = $row1['cntuser'];
	
	if($count>0){
		$sql="UPDATE sijil set name='$name', sign='$sign', position='$position' where caunselor_id='".$cid."'";
		$result=mysqli_query($connect,$sql);
	
		
		if($result){
			echo "<script>
			alert('Update was successful!');
			window.location.href='caunselor.php';
			</script>";
		}
	else
	{
		echo "error";}
	}
	
}




?>