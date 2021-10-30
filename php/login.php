<?php 
include("./not_logged_in.php");

?>
<div class="alert" id="a1">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong> Invalid credentials!</strong> &nbsp;&nbsp;&nbsp; Please check you credentials.
</div>
<div class="login-container">
    <div class="images">
        <img src="../assets/images/login_image.jpg" alt="">
    </div>
    <div class="login_panel">
        <div id="title">AVS Textiles</div>
        <div id="welcome">Welcome to AVS Textiles</div>
        <form action="" method="post">
            <label for="">Email or Phone Number</label><br>
            <input type="text" name="username" id="" placeholder="" autocomplete="off" name="username"><br>
            <label for="">Password</label><br>
            <input type="password" name="password" id="" placeholder="" name="password"><br>
            <a href="" id="for">Forget password?</a><br>
            <input type="submit" value="Sign in" name="submit">
            <div class="new">New to site? <a href="./register_user.php">Create Account</a></div>
        </form>
    </div> 
</div>

<?php

if(isset($_POST['submit'])){
    $uname=$_POST['username'];
    $pass=md5($_POST['password']);

    $sql_login_admin="SELECT * FROM admin WHERE email='$uname' OR phone='$uname'";
    $res_login_admin=mysqli_query($conn,$sql_login_admin);
    $row=mysqli_fetch_array($res_login_admin,MYSQLI_ASSOC);
    $password=$row['password'];
    if($pass==$password){
        header("location: admin_home.php");
    }
    else{
        ?>
            <script>
                document.getElementById('a1').style.visibility="visible";
            </script>
        <?php
    }
}

?>