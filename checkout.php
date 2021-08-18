<?php
    require('connection.php');

    $grand_total = 0;
    $allItems = '';
    $items = array();

    $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty,
    total_price FROM cart";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $grand_total +=$row['total_price'];
        $items[] = $row['ItemQty'];
    }
    $allItems = implode(", ", $items);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ออกบิล</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/yourcode.js"></script>
       <!--Get your code at fontawesome.com-->

</head>

<body>

<nav class="navbar navbar-expand-md bg-success navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="product_admin.php">ยำแซ่บปาก</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="product_admin.php">หน้าเมนูยำ</a>
      </li>

      
    

      
       

      </ul>
  </div>
</nav>

<div class="container">
<div class="row justify-content-center">
   <div class="col-lg-6 px-4 pb-4" id="order">
   <h4 class="text-center text-info p-2">การชำระเงิน</h4>
   <div class="jumbotron p-3 mb-2 text-center">
   <h6 class="lead"><b>รายการ :</b><?= $allItems; ?></h6>
 
   <h5><b>ราคารวมทั้งหมด :</b><?= number_format($grand_total,2) ?>บาท</h5>
   </div>
  <form action="" method="post" id="placeOrder">
    <input type="hidden" name="products" value="<?= $allItems; ?>">
    <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
       <
        <h6 class="text-center lead">เลือกวิธีการชำระเงิน</h6>
        <div class="form-group">
            <select name="pmode" class="form-control">
                <option 
                    valie=""selected disable>เลือกวิธีการชำระเงิน
                </option>

                <option value="จ่ายสด">จ่ายเงินสด</option>

              
             </select>
        </div>
            <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
        </div>
  </form>
</div>

</div>

       

    <!--โค้ดสดงรูปแสดงราคาสิ้นสุด-->

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

    $("#placeOrder").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'action.php',
            method: 'post',
            data: $('form').serialize()+"&action=order",
            success:function(response){
                $("#order").html(response);
            }
        });
    });

 
 
   load_cart_item_number();

   function load_cart_item_number(){
     $.ajax({
       url: 'action.php',
       method: 'get',
       data:{cartItem:"cart_item"},
       success:function(response){
        $("#cart-item").html(response);
       }
     });
   }

 });

</script>


</body>

</html>