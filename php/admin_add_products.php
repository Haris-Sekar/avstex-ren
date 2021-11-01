<?php

include('./admin_header.php');
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

<div class="addproducts">   

<form action="" method="POST" enctype="multipart/form-data">
        Product Name: <input type="text" name="product_name"  class="text_feild" autocomplete="off"><br>
        Product Description: <input type="text" name="product_dec" class="text_feild1" autocomplete="off"><br>

        Upload Product Images:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="file" id="actual-btn" name="img"  required>
        <br><br><input type="submit" value="Add Product" name="submit"><input type="reset" value="Reset">
        </form>
</div>



<script>
    const actualBtn = document.getElementById('actual-btn');

const fileChosen = document.getElementById('file-chosen');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})
</script>


<?php

if (isset($_POST["submit"]))

 {
     $product_name=$_POST['product_name'];
     $product_dec=$_POST['product_dec'];
     $title = rand(0,100000);
    $temp_arr = $title.'-'.$_FILES["img"]["name"];
    $pname = $title.'-'.$_FILES["img"]["name"];
    $tname = $_FILES["img"]["tmp_name"];
    $uploads_dir = '../assets/images/product_images';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    $sql = "INSERT INTO `products`(`name`, `description`, `image`) VALUES('$product_name','$product_dec','$pname');";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?> <script>alert("Product Added!")</script><?php
    }
    else{
        echo mysqli_error($conn);
    }
    
    
}


?>

