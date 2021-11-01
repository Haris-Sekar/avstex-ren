<?php

include('./admin_header.php');

//sql to fetch the already available data

$unit_sql="SELECT * FROM size_master";
$unit_res=mysqli_query($conn,$unit_sql);

if(isset($_POST['submit'])){
    $size=$_POST['size'];
    $unit_insert_sql="INSERT INTO `size_master`( `size`) VALUES  ('$size')";
    $unit_insert_res=mysqli_query($conn,$unit_insert_sql);
    if(!mysqli_error($conn)){
        header("Refresh:0");
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

<div class="unitformbox">
    <p class="title">
        Size master
    </p >
    <div class="masterunits">
        <div class="unitdisplaybox">
            Size's
            <div class="dbunits">
                <?php $i=1;  while($unit_row=mysqli_fetch_array($unit_res,MYSQLI_ASSOC)){?>
                <p><?php echo $i.'. '.$unit_row['size'];?><a href="./admin_delete_size.php?id=<?php echo $unit_row['id']; ?>"><img src="../assets/images/delete_icon.png" alt=""></a><br></p>
                <?php $i++; } ?>
            </div>

        </div>
        <div class="unitform">
            <p class="formtitle">Add Size</p> 
            <form action="" method="post">
                Size: <input type="text" name="size" id="" autocomplete="off"><br>
                    <input type="submit" value="Add" name="submit" >
            </form>

        </div>
    </div>
</div>

