
<?php 

session_start();

require_once "connection.php";

if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_code = $_POST['product_code'];

    $user_check = "SELECT * FROM porduct WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        $query = "INSERT INTO porduct (product_name, product_price, product_image, product_code)
                    VALUE ('$product_name', ' $product_price', '$product_image', ' $product_code')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = "Insert user successfully";
            header("Location: index.php");
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("Location: index.php");
        }
    }

}


?>


<!DOCTYPE html>
<html>
<head>
<title>register</title>
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
    <h1>REGISTER</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="#" method="post">
                <input class="text" type="text" name="product_name" placeholder="product_name" required>
                <input class="text" type="text" name="product_price" placeholder="product_price"required>
                <input class="file" type="file" name="product_image" placeholder="product_image" required>
                <input class="text" type="text" name="product_code" placeholder="product_code" required>
                
                
                    
                    <div class="clear"> </div>
                </div>
                <input type="submit" name="submit" value="SAVE">
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