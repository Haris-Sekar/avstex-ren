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
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        //admin verification
        $admin_sql="SELECT * FROM admin WHERE email='$username' OR phone='$username'";
        $admin_res=mysqli_query($conn,$admin_sql);
        $admin_row=mysqli_fetch_array($admin_res,MYSQLI_ASSOC);
        $admin_pass=$admin_row['password'];
        $sql_login="SELECT * FROM users_details WHERE email='$username' OR mobile='$username'";
        $res_login=mysqli_query($conn,$sql_login);
        $row=mysqli_fetch_array($res_login,MYSQLI_ASSOC);
        $con_pass=$row['password'];
        if($password==$admin_pass){
            session_start();
            $_SESSION['username']=$username;
            header("location: admin_home.php");
        }
        else if($con_pass==$password){
            session_start();
            $_SESSION['username']=$username;
            header("location: home.php");
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