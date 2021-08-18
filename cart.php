<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการเมนูอาหาร</title>
    <!--===================================เปลียนไอคอน==================================================-->	
	   <link rel="icon" type="image/png" href="images/icons/img.png"/>
    <!--===============================================================================================-->
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
          <a class="nav-link active" href="cart.php">ออเดอร์<span id="cart-item" class="badge badge-danger"></span></a> 
       </li>

      </ul>
  </div>
</nav>

<div class="container">
   <div class="row justify-content-center">
     <div class="col-lg-10">

            <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else {echo 'none';} unset($_SESSION['showAlert']); ?>"  
                class="alert alert-success alert-dismissible mt-3">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                         <strong>
                            <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?>
                         </strong>
             </div>


       <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                <td colspan="7">
                    <h4 class="text-center text-info m-0">รายการที่เลือกทั้งหมด</h4>
                </td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>รูป</th>
                    <th>รายงาน</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>
                    <a href="action.php?clear=all" class="badge-danger badge p-2" 
                    onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการเคลียร์รถเข็นของคุณ');"><i class="fas fa-trash"></i>เคลียร์ท้ังหมด</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                  require 'connection.php';
                  $stmt = $conn->prepare("SELECT * FROM cart");
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $grand_total = 0;
                  while($row = $result->fetch_assoc()):
                ?>
                <tr>
                        <td><?= $row['id'] ?></td>
                        <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                        <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                        <td><?= $row ['product_name'] ?></td>
                        <td><?= number_format($row['product_price'],2) ?></td>
                        <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                        <td><input type="number" class="form-control itemQty" value="<?= $row['qty']?>" style="width:75px;"></td>
                        <td><?= number_format($row['total_price'],2) ?></td>
                        <td><a href="action.php?remove=<?= $row['id '] ?>" class="text-danger lead" onclick="return confirm('คุณแน่ใจหรือไม่');">ลบ</a>
                        </td>
                </tr>

                 <!--ปุ่มรวมราคา รวมต่างๆๆข้างล่างเริ่มต้น-->
                 <?php $grand_total +=$row['total_price']; ?>
                  <?php endwhile; ?>
                  <tr>

                  <!--ปุ่มรวมราคา รวมต่างๆๆข้างล่างเริ่มต้น-->

                     <td colspan="3">

                     <a href="product_admin.php" class="btn btn-success">เลือกเพิ่มเติม</a></td>

                     <td colspan="2"><b>ราคารวมสุทธิ</b></td>

                     <td><b><?= number_format($grand_total,2) ?></b></td>

                     <td>
                     
                     <a href="checkout.php" class="btn btn-info <?= ($grand_total>1)?"":"disabled"; ?>">จ่ายเงิน</a>

                     </td>

                     <!--ปุ่มรวมราคา รวมต่างๆๆข้างล่างสิ้นสุด-->

                  </tr>
            </tbody>
           </table>
       </div>
   
     </div>
   </div>
</div>
    
      
<center>
  <button type="button" class="btn btn-light"><a href="user_page.php">กลับหน้าหลัก</button>
</center>

    <!--โค้ดสดงรูปแสดงราคาสิ้นสุด-->

    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">



$(document).ready(function(){

  $(".addItemBtn").click(function(e){

      e.preventDefault();

      var $form = $(this).closest(".form-submit");

      var pid = $form.find(".pid").val();

      var pname = $form.find(".pname").val();

      var pprice = $form.find(".pprice").val();

      var pimage = $form.find(".pimage").val();

      var pcode = $form.find(".pcode").val();

  $(".itemQty").on('change', function(){
  var $el = $(this).closest('tr');

  var pid = $el.find(".pid").val();
  var pprice = $el.find(".pprice").val();
  var qty= $el.find(".itemQty").val();
 
  location.reload(true);

  $.ajax({

    url: 'action.php',
    method: 'post',
    cache: false,
    data: {qty:qty,pid:pid,pprice:pprice},
    success: function(response){
      
      console.log(response);
        }
      });
    });
 

  $.ajax({

      url: 'action.php',
      method: 'post',
      data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
      success:function(response){

      $("#message").html(response);

      window.scrollTo(0,0);

      load_cart_item_number();

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