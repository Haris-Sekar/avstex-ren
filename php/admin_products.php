<?php
include("./admin_header.php");


$product_sql="SELECT * FROM products";
$product_res=mysqli_query($conn,$product_sql);


?>

<div class="products_display">
    <?php while($row=mysqli_fetch_array($product_res,MYSQLI_ASSOC)){?>
    <div class="product_card">
        <div class="img"> <img src="../assets/images/product_images/<?php echo $row['image'];?>" alt=""></div>
        <div class="product_name"><?php $id=$row['id'];echo $row['name'];?></div>
        

        <div class="container1">
            <div class="inner1">
                <a href=""><button>View/Edit Product</button></a>
                <a href="./admin_set_rate.php?id=<?php echo$id;?>"><button>Edit Rates</button></a>

            </div>
        </div>
    </div>
    <?php } ?>
</div>  