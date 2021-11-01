<?php
//data base connection esablishment

// $host="localhost";
// $username="root";
// $password="";
// $dbname="avstex_ren";

// //infinity free db connection
// $host="sql312.epizy.com";
// $username="epiz_29179456";
// $password="BOW9m6bqRrK";
// $dbname="epiz_29179456_avstex";

//clever cloud DB connect Details

$host='b4qjlowsvqnxh584yjnm-mysql.services.clever-cloud.com:3306';
$username='uy0caq08nnmiknzz';
$password='jmC4ecTwJDAGnw5IsTu8';
$dbname='b4qjlowsvqnxh584yjnm';

$conn=mysqli_connect($host,$username,$password,$dbname);
if(mysqli_connect_error()){
    echo "Cannot Connect DB";

}
else{
    // echo "done"; 
}
 
?>