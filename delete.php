<?php 
include "include_db.php";
$id=$_GET['id'];

$sql="delete from sijil where sijil_id='".$id."'";
$result=mysqli_query($connect,$sql);

		if($result){
			echo "<script>
			alert('Deleted succesfully !');
			window.location.href='history.php';
			</script>";
		}
	else
	{
		echo "error";}
	
	
?>

