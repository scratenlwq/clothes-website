<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM sizes where size_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Beden Silindi!";
    }
    else{
        echo"Bir Hata Oluştu!";
    }
    
?>