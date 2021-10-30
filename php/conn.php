<?php
//data base connection esablishment

$host="localhost";
$username="root";
$password="";
$dbname="avstex_ren";

$conn=mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_error()){
    echo "Cannot Connect DB";

}
else{
    // echo "done"; 
}
 
?>