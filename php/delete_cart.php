<?php
include('./conn.php');
$id=$_GET['id'];
$sql="DELETE FROM cart WHERE id='$id'";
$res=mysqli_query($conn,$sql);
if($res){
    header("location: cart.php");
}
?>