<?php
//data base connection esablishment

// $host="localhost";
// $username="root";
// $password="";
// $dbname="avstex_ren";

// //infinity free db connection
$host="sql312.epizy.com";
$username="epiz_29179456";
$password="BOW9m6bqRrK";
$dbname="epiz_29179456_avstex";



$conn=mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_error()){
    echo "Cannot Connect DB";

}
else{
    // echo "done"; 
}
 
?>