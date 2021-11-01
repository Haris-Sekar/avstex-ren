<?php
include("./withlogin_header.php");


$product_sql="SELECT * FROM products";
$product_res=mysqli_query($conn,$product_sql);


?>

<div class="products_display">
    <?php while($row=mysqli_fetch_array($product_res,MYSQLI_ASSOC)){?>
        <a href="./product_display.php?id=<?php echo $row['id'];?>">
    <div class="product_card">
        <div class="img"> <img src="../assets/images/product_images/<?php echo $row['image'];?>" alt=""></div>
        <div class="product_name"><?php $id=$row['id'];echo $row['name'];?></div>
        

        <div class="container1">
            <div class="inner1">

                <?php 
                $sql_rates="SELECT * FROM `product_rate` WHERE  product_id  ='$id'";
                $res_rates=mysqli_query($conn,$sql_rates);
  
                $row1=mysqli_fetch_array($res_rates,MYSQLI_ASSOC);?>
                <div class="floatLeft1">
                    <span class="size"><?php echo $row1['size']; ?></span>
                    <span class="rate"> <span id="rs"> Rs.</span><?php  echo round($row1['rate']); ?></span>
                    <span class="frate"><?php echo $row1['frame_rate'];?></span>
                    <span class="disc"><?php echo "-".$row1['discount']."%";?></span><br>
                </div>
            </div>
        </div>
    </div>
    </a>
    <?php } ?>
</div>  