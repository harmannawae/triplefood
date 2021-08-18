<?php 

    session_start();

    if (isset($_POST['username'])) {

        include('connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
       

        $query = "SELECT * FROM user WHERE username = '$username'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['salary'] = $row['salary'];
            $_SESSION['birthday'] = $row['birthday'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['userlevel'] = $row['userlevel'];

     //หน้้าข้อมูลออเดอร์
            $_SESSION['name'] = $row['neme'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['products'] = $row['products'];
            $_SESSION['amount_paid'] = $row['amount_paid'];
            $_SESSION['user_id'] = $row['user_id'];
     //หน้้าข้อมูลออเดอร์


     //ของรายการอาหาร
     $_SESSION['product_name'] = $row['product_name'];
     $_SESSION['product_price'] = $row['product_price'];
     $_SESSION['product_image'] = $row['product_image'];
     $_SESSION['product_code'] = $row['product_code'];


    //ของรายการอาหาร
            if ($_SESSION['userlevel'] == 'Manager') {
                header("Location: admin_page.php");
            }

            if ($_SESSION['userlevel'] == 'member') {
                header("Location: user_page.php");
            }
        } else {
            echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
        }

    } else {
        header("Location: index.php");
    }


?>