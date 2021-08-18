<!DOCTPE html>
<html lang="th">
<head>
   <title>Bootstrap Example</title>
   <meta charset="UTF-8">

</head>

   <body>

   <form action="data.php" method="post">
      <fieldset>

         <legend>Personal information:</legend>

         <lable>ชื่อ - นามสกุล: </lable><br>

         <input type="text" name="fullname"><br>

         <lable> ที่อยู่ : </lable><br>

         <textarea name="address" rows="5" cols="30"></textarea><br>
         
         <lable> เงินเดือน : </lable><br>
           
           <input type="number" name="salary"><br>

        <lable> วันเกิด : </lable><br>
           
           <input type="date" name="birthday"><br><br>

        <input type="submit" value="บันทึกข้อมูล">
    
      </fieldset>
    
    </form>

    </body>

</html>