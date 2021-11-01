<?php 
include("./conn.php");

session_start();
if($_SESSION['username']){
    $user=$_SESSION['username'];
    $sql="SELECT * FROM admin WHERE email='$user' OR phone='$user'";
    $res=mysqli_query($conn,$sql);
    if(!$res){
        session_destroy();
        header("location: login.php");
    }
}else{
    session_destroy();
    header("location: login.php");
}
$admin_det_sql="SELECT * FROM admin WHERE email='$user' OR phone='$user'";
$admin_det_res=mysqli_query($conn,$admin_det_sql);
$row=mysqli_fetch_array($admin_det_res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVS TEXTILES</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="nav_container">
        <div class="nav">
            <ul>
                <a href=""><li id="nav_items" style="text-transform: uppercase;"><?php echo $row['name'];?></li></a>

                <a href="./admin_home.php"><li class="nav-title" style="float: left;">AVS TEXTILES</li></a>
                <a href="./logout.php"><li id="nav_items">Logout</li></a>
                <a href="./admin_products.php"><li id="nav_items">Products</li></a>
                <a href=""><li id="nav_items">Page Settings</li></a>
                <a href=""><li id="nav_items">Orders</li></a>
            </ul>
        </div>
    </div>
</body>
</html>