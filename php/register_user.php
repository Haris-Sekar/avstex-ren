<?php
include("./not_logged_in.php");
?>
<div class="alert" id="a1">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong> Password Mismatch!</strong> &nbsp;&nbsp;&nbsp; Please check you credentials.
</div>
<div class="registration_panel">
    <div id="reg_title">Welcome, Create an Account</div>
    <form action="" method="post" onchange="passwordValidation()"> 
        <div class="line1">
            <div class="set1">
                <label for="fname">First Name</label><br>
                <input type="text" name="fname" id="" autocomplete="off" required>
            </div>
            <div class="set1">
                <label for="fname">Last Name</label><br>
                <input type="text" name="lname" id="" autocomplete="off" required>
            </div>
        </div>
        <div class="line1">
            <div class="set1">
                <label for="fname">Birthday</label><br>
                <input type="date" name="birthday" id="" autocomplete="off" required>
            </div>
            <div class="set1">
                <label for="fname">Gender</label><br>
                <input type="radio" name="gender" id="" value="male" required>Male
                <input type="radio" name="gender" id="" value="female" required>Female
            </div>
        </div>
        <div class="line1">
            <div class="set1">
                <label for="fname">Email</label><br>
                <input type="email" name="email" id="" autocomplete="off" required>
            </div>
            <div class="set1">
                <label for="fname">Mobile</label><br>
                <input type="number" name="phone" id="" autocomplete="off" required>
            </div>
        </div>
        <div class="line1">
            <div class="set1">
                <label for="fname">Password</label><br>
                <input type="password" name="pass" id="pass" autocomplete="off" required>
            </div>
            <div class="set1">
                <label for="fname">Confirm password</label><br>
                <input type="password" name="cpass" id="cpass" autocomplete="off" required>
            </div>
        </div>
        <input type="submit" name="submit" value="Create Account" id="btn_create" id="btn_submit">
    </form>
</div>      
<script src="../assets/js/passwordValidation.js"></script>

<?php
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $password=md5($_POST['pass']);
        $mobile=$_POST['phone'];
        $dob=$_POST['birthday'];
        $reg_sql="INSERT INTO `users_details`(`fname`, `lname`, `mobile`, `email`, `dob`, `password`) VALUES ('$fname','$lname','$mobile','$email','$dob','$password')";
        $reg_res=mysqli_query($conn,$reg_sql);
        if($reg_res){
            header("location: login.php");
        }else{
            echo mysqli_error($conn);
        }
    }
?>