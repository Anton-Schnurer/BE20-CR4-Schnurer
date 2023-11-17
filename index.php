<?php
    require_once 'includes/db_connect.php';
    require_once 'includes/navbar.php';

    $sqlSall = "SELECT * FROM `bigLibrary`";
    $result = mysqli_query($connect, $sqlSall);

    $cards = "";

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $cards .= "
            <div class='p-2'>
                <div class='card'>
                    <img src='pictures/$row[image]' class='card-img-top' style='height: 12rem' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$row[title] / $row[author_first_name] $row[author_last_name]</h5>
                        <p class='card-text'>Media type: $row[type]</p>
                        <a href='publisher.php?publisher_name=$row[publisher_name]' class='btn btn-primary'>$row[publisher_name]</a>
                        <p class='card-text'>$row[short_description].</p>
                        <a href='details.php?bookid=$row[bookid]' class='btn btn-primary'>Details</a>
                        <a href='update.php?bookid=$row[bookid]' class='btn btn-warning'>Update</a>
                        <a href='delete.php?bookid=$row[bookid]' class='btn btn-danger'>Delete</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
    else{
        $cards = "No data found.";
    }
    mysqli_close($connect);
?>



<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       <script src="https://kit.fontawesome.com/553d5d3b41.js" crossorigin="anonymous"></script>
       <title>BE20-CR-SCHNURER</title>
   </head>
   <body>

         <div class="row row-cols-1 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
            <?= $cards ?>
         </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   </body>
</html>