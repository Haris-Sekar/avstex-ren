<?php 
include('./admin_header.php');
?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
<script src="../assets/js/select_search.js"></script>

</head>
<div class="nav_container1">
    <div class="nav1">
        <ul>
            <a href="./admin_size_master.php"><li id="nav_items1">Add size group</li></a>
            <a href="./admin_add_products.php"><li id="nav_items1">Add products</li></a>
            <a href="./admin_rate_select_product.php"><li id="nav_items1">Set Rates</li></a>
        </ul>
    </div>
</div>
<div class="select_product">
    <form action="" method="post">
    Products:
        <select name="id" class="text_feild1" id="product_id">
          <option value="null">Select a product</option>
            <?php 
                $qurey="SELECT * FROM products;";
                $result=mysqli_query($conn,$qurey);
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    ?>
                    
                        <option value="<?php echo $row['id'];?>"><?php echo $row['id'].". ".$row['name']?></option>
                    
            <?php }?>
        </select>
        <input type="submit" name="submit" value="View/Set rates" class="btn-setrates" >
    </form>
</div>
<?php 
if(isset($_POST['submit'])){
  $id=$_POST['id'];
  header("location: admin_set_rate.php?id=$id");
}
?>