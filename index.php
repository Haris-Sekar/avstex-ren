<?php 
include("./php/conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVS TEXTILES</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="nav_container">
        <div class="nav">
            <ul>
                <a href="./index.php"><li class="nav-title" style="float: left;">AVS TEXTILES</li></a>
                <a href="./php/login.php"><li id="nav_items">Login/Signup</li></a>
                <a href=""><li id="nav_items">About us</li></a>
                <a href=""><li id="nav_items">Collections</li></a>
                <a href="./index.php"><li id="nav_items">Home</li></a>
            </ul>
        </div>
    </div>

    <div class="body-content">
      <div class="slider">
        <div class="slides">
          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">
          <input type="radio" name="radio-btn" id="radio4">
          <div class="slide first">
            <img src="./assets/images/slides/slide1.jpg" alt="">
          </div>
          <div class="slide">
            <img src="./assets/images/slides/slide2.jpg" alt="">
          </div>
          <div class="slide">
            <img src="./assets/images/slides/slide3.jpg" alt="">
          </div>
          <div class="slide">
            <img src="./assets/images/slides/slide4.jpg" alt="">
          </div>
          <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
          </div>
        </div>
        <div class="navigation-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
        </div>
      </div>
    </div>
</body>
</html>

<script type="text/javascript">
    var counter = 2;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 3000);
    </script>
