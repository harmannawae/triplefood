<?php

    require("connection.php");

    //add new data form to mysql
    if(isset($_POST['add_form_food'])){
        
        $product_name = $_POST['product_name'];

        $product_price = $_POST['product_price'];

        $product_image = $_POST['product_image'];

        $product_code = $_POST['product_code'];

    $sql = "INSERT INTO product ( id , product_name , product_price,  product_image, product_code)
        
        VALUES (null , '$product_name','$product_price','$product_image',' $product_code' )";

        if (mysqli_query($conn,$sql)) {

            echo "New record created successfully";
            echo "<br><a href='add_form_food.php'>Bact To All Employees Page</a>";

        }else{

            echo "Error:" . $sql . "<br>" . mysqli_error($conn);

        }
    }


    //save edit data

    if(isset($_POST['edit_form_food'])){

       

        $product_name =$_POST['edit_product_name'];

        $product_price =$_POST['edit_product_price'];

        $product_image =$_POST['edit_product_image'];

        $product_code =$_POST['edit_product_code'];

        
        $id = $_POST['edit_form_food'];
        $sql ="UPDATE product SET product_name='$product_name', product_price='$product_price',
               product_image ='$product_image',product_code='$product_code' WHERE id=$id";

        if (mysqli_query($conn,$sql)){

            echo "Record updated successfully";

            echo "<br><a href='edit_food_admin.php'>Bact To All user Page</a>";

        }else{
            echo "Error updating record: " . mysqli_error($conn);
        }
    }




    //delete data
    if(isset($_GET['delete_id'])){

        $id = $_GET['delete_id'];

        // sql to delete a record
        $sql = "DELETE FROM product WHERE id= $id";

        if (mysqli_query($conn,$sql)){

            echo "Record deleted successfully";

            echo "<br><a href='edit_food_admin.php'> Bact To user Page</a>";

        }else{

            echo "Error deleting record: " . mysqli_error($conn);
        }

    }
    ?>






