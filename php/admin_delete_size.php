<?php
include('./conn.php');
$id=$_GET['id'];
$size_delete_sql="DELETE FROM `size_master` WHERE id='$id' ";
$size_delete_res=mysqli_query($conn,$size_delete_sql);
if($size_delete_res){
    header("location: admin_size_master.php");
}


?>