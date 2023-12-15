<?php
   require_once 'includes/db_connect.php';

    if(isset($_GET["bookid"]) && !empty($_GET["bookid"])){
        $bookid = $_GET["bookid"];

        $sql = "SELECT * FROM biglibrary WHERE bookid = $bookid"; 
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        
        // remove picture if it isn't the default one before deleting the record
        
        if($row["image"] != "default.png"){ 
            unlink("pictures/$row[image]");
        }
        $sql = "DELETE FROM `biglibrary` WHERE bookid = $bookid";
        mysqli_query($connect, $sql);
    }
    
    mysqli_close($connect);
    header("Location: index.php");
