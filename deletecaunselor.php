<?php 
include "include_db.php";
$id=$_GET['id'];

$sql="delete from caunselor where caunselor_id='".$id."'";
$result=mysqli_query($connect,$sql);

		if($result){
			echo "<script>
			alert('Deleted succesfully !');
			window.location.href='caunselor.php';
			</script>";
		}
	else
	{
		echo "error";}
	
	
?>

