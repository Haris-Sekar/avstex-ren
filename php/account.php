<?php
include('./withlogin_header.php');

$sql_user="SELECT * FROM users_details WHERE id='$user_id'";
$res_user=mysqli_query($conn,$sql_user);

$row=mysqli_fetch_array($res_user);
$name=$row['fname']." ".$row['lname'];
$dob=$row['dob'];
$email=$row['email'];
$mobile=$row['mobile'];

$sql_add="SELECT * FROM user_address WHERE user_id='$user_id'";
$res_add=mysqli_query($conn,$sql_add);
$row=mysqli_fetch_array($res_add);
if($row){

    $add1=$row['address1'];
    $add2=$row['address2'];
    $add3=$row['address3'];
    $city1=$row['city'];
    $state1=$row['state'];
    $pin1=$row['pin'];   
}


?>

<div class="userinfo">
    <div class="tit">Personal INFO</div><br>
    Name: <span class="name"> <?php echo $name;?></span><br><br>
    Email: <span class="email"><?php echo $email;?></span><br><br>
    Date of Birth: <span class="dob"><?php echo $dob;?></span><br><br>
    Mobile: <span class="mobile"><?php echo $mobile;?></span><br><br>
</div>

<div class="address">
    <h1>Update address</h1>
    <form action="" method="post">
        Address line 1: <input type="text" name="add1" id="" ><br>
        Address line 2: <input type="text" name="add2" id="" ><br>
        Address line 3: <input type="text" name="add3" id="" ><br>
        State: <input type="text" name="state" id="" ><br>
        City: <input type="text" name="city" id="" ><br>
        Pin code: <input type="number" name="pin"><br>
        <input type="submit" name="submit" value="Update/set">
    </form>
</div>


<?php

if(isset($_POST['submit']))
{
    $a1=$_POST['add1'];
    $a2=$_POST['add2'];
    $a3=$_POST['add3'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $pin=$_POST['pin'];

    $sql_add1="INSERT INTO user_address( `user_id`, `address1`, `address2`, `address3`, `state`, `city`, `pin`) VALUES('$user_id','$a1','$a2','$a3','$state','$city','$pin')";
    $res_add1=mysqli_query($conn,$sql_add1);
    if($res_add1){
        ?>
        <script>
            alert('Address updated!');
        </script>
        <?php
    }
    else{
        echo "hi";

        echo mysqli_error($conn);
    }
}

?>