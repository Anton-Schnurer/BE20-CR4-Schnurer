
<?php
    require_once 'includes/db_connect.php';
    require_once 'includes/navbar.php';

    // this page is being called via GET which will contain the bookid for which all the details have to be shown

    if(isset($_GET["bookid"]) && !empty($_GET["bookid"])) {
        $sqlSid = "SELECT * FROM `biglibrary` where bookid=$_GET[bookid]";
        $result = mysqli_query($connect, $sqlSid);

        $cards = "";

        // will fetch just one record
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $cards .= "
            <div class='p-2'>
                <div class='card'>
                    <img src='pictures/{$row[0]["image"]}' class='card-img-top' style='height: 50%; width:50%; object-fit:cover' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'><u>{$row[0]["title"]}</u></h5>
                        <h5 class='card-title'>{$row[0]["author_first_name"]} {$row[0]["author_last_name"]}</h5>
                        <p class='card-text'><u>Media type:</u> {$row[0]["type"]}</p>
                        <p class='card-text'><u>Publish date:</u> {$row[0]["publish_date"]}</p>
                        <a href='publisher.php?publisher_name={$row[0]["publisher_name"]}' class='btn btn-primary'>{$row[0]["publisher_name"]}</a>
                        <p class='card-text'><u>Address:</u> {$row[0]["publisher_address"]}</p>
                        <p class='card-text'><u>ISBN:</u> {$row[0]["isbn_code"]}</p>
                        <p class='card-text'><u>Status:</u> {$row[0]["status"]}</p>
                        <p class='card-text'><details>
                         <summary>Details</summary>{$row[0]["short_description"]}</details></p>
                        <a href='update.php?bookid={$row[0]["bookid"]}' class='btn btn-warning'>Edit</a>
                        <a href='delete.php?bookid={$row[0]["bookid"]}' class='btn btn-danger'>Delete</a>
                    </div>
                </div>
            </div>
            ";
            }
        else{
            $cards = "No data found.";
        }
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
       <title>BE20-CR4-Schnurer</title>
   </head>
   <body>

         <div class="container">
            <?= $cards ?>
         </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   </body>
</html>
