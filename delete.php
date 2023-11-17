<?php
   require_once 'includes/db_connect.php';
   
    if(isset($_GET["bookid"]) && !empty($_GET["bookid"])){
        $bookid = $_GET["bookid"];

        $sql = "DELETE FROM `biglibrary` WHERE bookid = $bookid";
        mysqli_query($connect, $sql);
    }
    
    mysqli_close($connect);
    header("Location: index.php");
