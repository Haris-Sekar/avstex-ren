<?php

include('./withlogin_header.php');

$sql_address="SELECT * FROM user_address WHERE user_id='$user_id'";
$res_address=mysqli_query($conn,$sql_address);
$row_add=mysqli_fetch_array($res_address);
$address=$row_add['address1'].",".$row_add['address2'].",".$row_add['address3'].",".$row_add['city'].",".$row_add['state'].",".$row_add['pin'];
echo $address;

$cart_sql="SELECT * FROM cart WHERE user_id='$user_id'";
$cart_res=mysqli_query($conn,$cart_sql);


        
?>

<a href="place_order.php"><button class="place_order" name="submit" type="submit">Place Your Order</button></a><br><br><br><br><br>
    <div class="products_display">
        <?php while($row4=mysqli_fetch_array($cart_res)){
        $id=$row4['product_id'];
        $size=$row4['size'];
        $quantity=$row4['quatity'];
        $rate=$row4['rate'];
        $product_sql="SELECT * FROM products WHERE id='$id'";
        $product_res=mysqli_query($conn,$product_sql);
        $row=mysqli_fetch_array($product_res,MYSQLI_ASSOC); ?>
        <div class="product_card">
            <div class="img"> <img src="../assets/images/product_images/<?php echo $row['image'];?>" alt=""></div>
            <div class="product_name"><?php echo $row['name'];?></div>
            <div class="product_name"><?php echo "Size: ".$size;?></div>
            <div class="product_name"><?php echo "Rate: ".$rate;?></div>
            <div class="product_name"><?php echo "Quantity: ".$quantity;?></div>
            <div class="rates_table"><a href="delete_cart.php?id=<?php echo $row4['id'];?>"><img src="../assets/images/delete.png" alt=""></a></div>
        </div>
        <?php }?>
    </div>  
<button class="place_order" name="submit" type="submit">Place Your Order</button>