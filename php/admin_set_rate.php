
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="../assets/js/select_search.js"></script>

</head>
<?php
$product_id=$_GET['id'];
if($product_id=='null'){
    header("location: admin_rate_select_product.php");
}

include("./admin_header.php");
$i=1;

$sql_rates="SELECT * FROM product_rate WHERE product_id='$product_id'";
$res_rates=mysqli_query($conn,$sql_rates);
$sql_product_detail="SELECT * FROM products WHERE id='$product_id'";
$res_product_detail=mysqli_query($conn,$sql_product_detail);
while($row_product=mysqli_fetch_array($res_product_detail,MYSQLI_ASSOC)){
    $product_name=$row_product['name'];
    $product_decs=$row_product['description'];
}



if(isset($_POST['submit'])){
    $size=$_POST['size'];
    $rate=$_POST['rate'];
    $discount=$_POST['discount'];
    $discounted_rate=$rate-($rate*($discount/100));


    $sql_setrate="INSERT INTO `product_rate`(`product_id`,  `size`, `rate`, `frame_rate`, `discount`) VALUES ('$product_id','$size','$discounted_rate','$rate','$discount')";
    $res_setrate=mysqli_query($conn,$sql_setrate);
    if($res_setrate){
        header("Refresh: 0");
    }
    else{
        echo 'bye';
    }

}
?>

<div class="nav_container1">
    <div class="nav1">
        <ul>
            <a href="./admin_size_master.php"><li id="nav_items1">Add size group</li></a>
            <a href="./admin_add_products.php"><li id="nav_items1">Add products</li></a>
            <a href="./admin_rate_select_product.php"><li id="nav_items1">Set Rates</li></a>
        </ul>
    </div>
</div>
<body>
<div class="product_det">
    <div class="product_name"><?php echo $product_name;?></div>
    <div class="proudct_group"><?php echo $product_decs;?></div>
<div class="rates_content">
    <div class="rates_table">
        <table>
            <tr>
                <th>S I</th>
                <th>Size</th>
                <th>Rate</th>
                <th>Discount</th>
                <th>Rate after Discount</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php while($row_rates=mysqli_fetch_array($res_rates,MYSQLI_ASSOC)){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row_rates['size']; ?></td>
                <td><?php echo $row_rates['frame_rate']; ?></td>
                <td><?php echo $row_rates['discount']; ?></td>
                <td><?php echo $row_rates['rate']; ?></td>
                <td><a href="edit_rate.php?id=<?php echo $row_rates['id'];?>&product=<?php echo $product_id;?>"><img src="../assets/images/edit.png" alt=""></a></td>
                <td><a href="delete_rates.php?id=<?php echo $row_rates['id'];?>&product=<?php echo $product_id;?>"><img src="../assets/images/delete.png" alt=""></a></td>
            </tr>
            <?php $i++;  } ?>
        </table>
    </div>
    <div class="setrates">
        <form action="" method="POST">
            Size: <select name="size" class="text_feild">
            <?php 
                $qurey="SELECT * FROM size_master";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['size']?>"><?php echo $row['size']?></option>
                    
            <?php }?>
        </select><br>
            Rate: <input type="number" name="rate" id="rate" placeholder="Enter the rate" class="text_feild"><br>
            Discount: <input type="number" name="discount" id="discount" placeholder="Enter the discount" class="text_feild"><br>
            <input type="submit" value="Add rate" class="btn-setrates" name="submit">
        </form>
    </div>
</div>

 <!-- cd-gallery -->

<script src="../assets/js/jquery-2.1.1.js"></script>
<script src="../assets/js/jquery.mobile.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>