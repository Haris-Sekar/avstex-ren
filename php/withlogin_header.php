<?php 
include("./conn.php");

session_start();
if($_SESSION['username']){
    $user=$_SESSION['username'];
    $sql="SELECT * FROM users_details WHERE email='$user' OR mobile='$user'";
    $res=mysqli_query($conn,$sql);
    if(!$res){
        session_destroy();
        header("location: login.php");
    }
}else{
    session_destroy();
    header("location: login.php");
}

$admin_det_sql="SELECT * FROM users_details WHERE email='$user' OR mobile='$user'";
$admin_det_res=mysqli_query($conn,$admin_det_sql);
$row=mysqli_fetch_array($admin_det_res);
global $user_id,$name;
$sql="SELECT * FROM users_details WHERE email='$user' OR mobile='$user'";
    $res=mysqli_query($conn,$sql);
    while($userid=mysqli_fetch_array($res)){
        $user_id=$userid['id'];
    }
$cart_sql="SELECT COUNT(*) as cart1 FROM cart WHERE user_id='$user_id'";
$cart_res=mysqli_query($conn,$cart_sql);
$row3=mysqli_fetch_array($cart_res);
$cart_no=$row3['cart1'];?>

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
                <a href="./account.php"><li id="nav_items" style="text-transform: uppercase;"><?php $name="Mr.".$row['fname']; echo "Mr.".$row['fname'];?></li></a>

                <a href="./home.php"><li class="nav-title" style="float: left;">AVS TEXTILES</li></a>
                <a href="./logout.php"><li id="nav_items">Logout</li></a>
                <a href="./cart.php"><li id="nav_items">Cart(<?php echo $cart_no;?>)</li></a>
                <a href="./products.php"><li id="nav_items">Products</li></a>
                <a href="./home.php"><li id="nav_items">Home</li></a>
            </ul>
        </div>
    </div>
</body>
</html>