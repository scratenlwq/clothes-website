<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $catname = $_POST['c_name'];
       
         $insert = mysqli_query($conn,"INSERT INTO category
         (category_name) 
         VALUES ('$catname')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../adminPanel.php?category=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../adminPanel.php?category=success");
         }
     
    }
        
?>