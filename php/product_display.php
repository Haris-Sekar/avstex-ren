<?php
include('./withlogin_header.php');
$id=$_GET['id'];
// echo $id;
global $user_id;
$sql="SELECT * FROM users_details WHERE email='$user' OR mobile='$user'";
    $res=mysqli_query($conn,$sql);
    while($userid=mysqli_fetch_array($res)){
        $user_id=$userid['id'];
    }
    $sql_product="SELECT * FROM products WHERE id='$id'";
    $res_product=mysqli_query($conn,$sql_product);
    while($row=mysqli_fetch_array($res_product)){
        $product_name=$row['name'];
        $product_dec=$row['description'];
        $images=$row['image'];
    }
    
    $sql_rates="SELECT * FROM product_rate WHERE product_id='$id'";
    $res_rates=mysqli_query($conn,$sql_rates);
    $rates=array();

    while($row2=mysqli_fetch_array($res_rates,MYSQLI_ASSOC)){
        $rates[$row2['size']]=array(
            "rate"=> $row2['rate'],
            "frate"=>$row2['frame_rate'],
            "discount"=>$row2['discount']   
        );
    }
    ?>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
<script src="../assets/js/select_search.js"></script>
</head>
    <div class="product_display">
        <div class="imgs">
            <img src="../assets/images/product_images/<?php echo $images;?>" alt="">
            <div class="product_name1"><?php echo $product_name;?></div>
        </div>
        <div class="product_dets">
            <div class="product_name_down"><?php echo $product_name;?></div>
            <div class="product_group_down"><?php echo $product_dec;?></div>
            <form action="" method="post">
               <br><br> Size: <br>
            <?php 
                $qurey="SELECT * FROM product_rate WHERE product_id='$id';";
                $result=mysqli_query($conn,$qurey);
                while($row1=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                <input type="submit" name="submit" class="rates" value="<?php echo $row1['size'];?>" id="<?php echo $row1['size'];?>" onclick="btn_changes" >
                <?php } ?>
                </form><br>
                                
                <?php 
                if(isset($_POST['submit'])){
                    ?>
                    <script>
                        document.getElementById('<?php echo $_POST['submit'];?>').style.backgroundColor="black";
                        document.getElementById('<?php echo $_POST['submit'];?>').style.color="white";
                    </script>
                    <?php
                    $size=$_POST['submit'];?>
                    <span id="rss">Rs.</span><span class="rate_disp"> <?php print_r($rates[$size]['rate']);?>/-</span><span class="frate">Rs.<?php print_r($rates[$size]['frate']);?>/</span><span class="rates1">-<?php print_r($rates[$size]['discount']);?>%</span>
                    <form action="" method="post" id="forms_butos">
                        <input type="text" name="size" value="<?php echo $size;?>" id="" hidden>
                        <input type="text" name="rate" value="<?php print_r($rates[$size]['rate']);?>" id="" hidden>
                        <div class="formsss">
                        Quantity 
                            <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                            <input type="number" id="number" value="1" name="box" required onchange="boxconvert()" required/>
                            <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                        </div>
                    <?php
                }
                    ?>
        </div>
        <div class="product_book">
            <input type="submit"  name="cart" value="Add to Cart" class="btn_book">
            
        </div>
            </form>
</div>



<script>
    function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 1 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 1 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
    function increaseValue1() {
  var value = parseInt(document.getElementById('number1').value, 10);
  value = isNaN(value) ? 1 : value;
  value++;
  document.getElementById('number1').value = value;
}

function decreaseValue1() {
  var value = parseInt(document.getElementById('number1').value, 10);
  value = isNaN(value) ? 1 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number1').value = value;
}
function boxconvert(){
    var value=document.getElementById('number').value;
    var boxCount=0;
    if(value==10){
        document.getElementById('box').innerHTML=boxCount+" boxes"
        boxCount+=boxCount;
    }

}
</script>
<?php
if(isset($_POST['cart'])){
    $quantity=$_POST['box'];
    $size1=$_POST['size'];
    $rate1=$_POST['rate'];
    $rate_sql="INSERT INTO `cart`(`user_id`, `product_id`, `size`, `quatity`, `rate`) VALUES('$user_id','$id','$size1','$quantity','$rate1') ";
    $rate_res=mysqli_query($conn,$rate_sql);
    echo $user_id;

    if($rate_res){
        ?>
            <script>
                alert('Product Added!');
            </script>
        <?php
            header("Refresh: 0");

    }    
}
?>