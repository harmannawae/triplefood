
<?php 

session_start();

require_once "connection.php";

if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_code = $_POST['product_code'];

    $result = mysqli_query($conn, $user_check);
    

   

        $query = "INSERT INTO product (product_name, product_price, product_image, product_code)
                    VALUE ('$product_name', '$product_price', '$product_image', '$product_code')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
            header("Location: edit_food_admin.php");
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("Location: edit_food_admin.php");
        }
    }




?>


<!DOCTYPE html>
<html>
<head>
<title>เพิ่มข้อมูล</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<!-- main -->
<div class="main-w3layouts wrapper">
    <h1>เพิ่มข้อมูล</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="" method="post">
             <fieldset>
                        <input class="text" type="text" name="product_name" placeholder="ชื่อเมนู" required>
                        <input class="text" type="text" name="product_price" placeholder="ราคา"required>
                        <input class="text" type="text" name="porduct_image" placeholder="รูปภาพ" required>
                        <input class="text" type="text" name="porduct_code" placeholder="รหัสสินค้า" required>
                        
                        
                        <input type="submit" name="submit" value="เพิ่มข้อมูล">
                </fieldset>
            </form>
          
        </div>
    </div>
    
    
    
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<!-- //main -->
</body>
</html>