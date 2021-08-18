<?php
require("connection.php");

if(isset($_GET['id'])){

$id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id = $id";
     
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
   <form action="data.php" method="post">

     <fieldset>
       <legend> Personal information:</legend>

       <lable>ชื่อ - นามสกุล :</lable><br>
       <input type="text" name="edit_fullname" required value="<?php echo $result['fullname']?>"><br>
<br>
<br>

       <lable>ที่อยู่ : </lable><br>
       <textarea name="edit_address" rows="5" cols="30" required><?php echo $result['address']?></textarea><br>
<br>
<br>
<br>
       <lable>เงินเดือน : </lable><br>
            <input type="number" name="edit_salary" value="<?php echo $result['salary']?>"><br>
<br>
<br>

       <lable>วันเกิด : </lable><br>
            <input type="date" name="edit_birthday" value="<?php echo $result['birthday']?>"><br><br>
<br>
<br>

       <lable>รหัสพนักงาน :</lable><br>
            <input type="text" name="edit_username" required value="<?php echo $result['username']?>"><br>
<br>
<br>

       <lable>รหัสผ่าน :</lable><br>
            <input type="text" name="edit_password" required value="<?php echo $result['password']?>"><br>
      
 <br>
<br>



            <input type="hidden" name="edit_form_id" value="<?php echo $result['id']?>">

            <input type="submit" value="save">
    
      </fieldset>
      </center>
    </form>

    </body>
</html>
