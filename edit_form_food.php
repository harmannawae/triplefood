<?php
require("connection.php");

if(isset($_GET['id'])){

$id = $_GET['id'];

    $sql = "SELECT * FROM product WHERE id = $id";
     
       $row = mysqli_query($conn,$sql);

       $result = mysqli_fetch_assoc($row);

       if(!$result){

         echo "Error:". $sql . "<br>" . mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
   <title>Edit Personal information</title>

</head>
   <body>
   <center>
   <form action="data2.php" method="post">

     <fieldset>
       <legend> Personal information:</legend>

       <lable>ชื่อเมนูอาหาร:</lable><br>
       <input type="text" name="edit_product_name" required value="<?php echo $result['product_name']?>"><br>
<br>
<br>

        <lable>ราคา :</lable><br>
       <input type="text" name="edit_product_price" required value="<?php echo $result['product_price']?>"><br>
<br>
<br>
<br>
       <lable>รูปภาพ : </lable><br>
            <input type="text" name="edit_product_image" value="<?php echo $result['product_image']?>"><br>
<br>
<br>

       <lable>รหัสสินค้า : </lable><br>
            <input type="text" name="edit_product_code" value="<?php echo $result['product_code']?>"><br><br>
<br>




            <input type="hidden" name="edit_form_food" value="<?php echo $result['id']?>">

            <input type="submit" value="save">
    
      </fieldset>
      </center>
    </form>

    </body>
</html>
