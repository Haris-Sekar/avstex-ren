<?php

include('./withlogin_header.php');

$sql_address="SELECT * FROM user_address WHERE user_id='$user_id'";
$res_address=mysqli_query($conn,$sql_address);
$row_add=mysqli_fetch_array($res_address);
$address=$row_add['address1'].",".$row_add['address2'].",".$row_add['address3'].",".$row_add['city'].",".$row_add['state'].",".$row_add['pin'];

$cart_sql="SELECT * FROM cart WHERE user_id='$user_id'";
$cart_res=mysqli_query($conn,$cart_sql);
?>

<div class="bill">
    <div class="address1">
    Name: <?php echo $name;?><br>
    Billing address:  <?php echo $address;?>  <br>

    </div>
    <div class="products">
    <table>
        <tr>
            <th>Item name</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Amount</th>

        </tr>
    
    <?php while($row_cart=mysqli_fetch_array($cart_res)){
        $id=$row_cart['product_id'];
        $product_sql="SELECT * FROM products WHERE id='$id'";
        $product_res=mysqli_query($conn,$product_sql);
        $row_prod=mysqli_fetch_array($product_res,MYSQLI_ASSOC);

        ?>

        <tr>
            <td><?php echo $row_prod['name'];?></td>
            <td><?php echo $row_cart['size'];?></td>
            <td><?php echo $row_cart['quatity'];?></td>
            <td><?php echo $row_cart['rate'];?></td>
            <td><?php echo $row_cart['rate']*$row_cart['quatity'];?></td>
        </tr>    
        <?php }?>
    </table>
    </div>
    <form action="" method="POST">
        <input type="submit" value="Confirm Order" name="submit" class="place_order">
    </form>
</div>
<?php
if(isset($_POST['submit'])){
    while($row_cart=mysqli_fetch_array($cart_res)){
        $id=$row_cart['product_id'];
        $p_id=$row_cart['product_id'];
        $p_size=$row_cart['size'];
        $p_qua=$row_cart['quatity'];
        $p_net_rate=$row_cart['rate']*$row_cart['quatity'];
        $order_sql="INSERT INTO (`user_id`, `address`, `product_id`, `quantity`, `size`, `net_rate`)VALUES('$user_id','$address','$p_id','$p_qua','$p_size','$p_net_rate')";
        $order_res=mysqli_query($conn,$order_sql);
        if($order_res){
            echo "placed";
        }
        else{
            echo mysqli_error($conn);
        }
}
}


?>