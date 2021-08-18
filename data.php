<?php

    require("connection.php");

    //add new data form to mysql
    if(isset($_POST['fullname'])){
        
        $fullname = $_POST['fullname'];

        $address = $_POST['address'];

        $salary = $_POST['salary'];

        $birthday = $_POST['birthday'];

    $sql = "INSERT INTO user ( id , fullname , address, salary, birthday)
        
        VALUES (null , '$fullname','$address','$salary','$birthday' )";

        if (mysqli_query($conn,$sql)) {

            echo "New record created successfully";
            echo "<br><a href='indax.php'>Bact To All Employees Page</a>";

        }else{

            echo "Error:" . $sql . "<br>" . mysqli_error($conn);

        }
    }


    //save edit data

    if(isset($_POST['edit_form_id'])){

        $fullname =$_POST['edit_fullname'];

        $address =$_POST['edit_address'];

        $salary =$_POST['edit_salary'];

        $birthday =$_POST['edit_birthday'];

        $id = $_POST['edit_form_id'];

        $username =$_POST['edit_username'];

        $password =$_POST['edit_password'];
        
        $sql ="UPDATE user SET fullname='$fullname', address='$address',
               salary ='$salary',birthday='$birthday',username='$username',password='$password' WHERE id=$id";

        if (mysqli_query($conn,$sql)){

            echo "Record updated successfully";

            echo "<br><a href='table_admin.php'>Bact To All user Page</a>";

        }else{
            echo "Error updating record: " . mysqli_error($conn);
        }
    }




    //delete data
    if(isset($_GET['delete_id'])){

        $id = $_GET['delete_id'];

        // sql to delete a record
        $sql = "DELETE FROM user WHERE id= $id";

        if (mysqli_query($conn,$sql)){

            echo "Record deleted successfully";

            echo "<br><a href='index.php'> Bact To user Page</a>";

        }else{

            echo "Error deleting record: " . mysqli_error($conn);
        }

    }
    ?>






