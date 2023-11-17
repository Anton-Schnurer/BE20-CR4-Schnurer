<?php
    require_once 'includes/db_connect.php';
    require_once 'includes/fileUpload.php';


    $bookid = $_GET["bookid"];
    $sql = "SELECT * from biglibrary where bookid = $bookid";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);


    if(isset($_POST["update"])){

        $title = $_POST["title"];
        $image = fileUpload($_FILES["image"]);
        $isbn_code = $_POST["isbn_code"];
        $short_description = $_POST["short_description"];
        $type = $_POST["type"];
        $author_first_name = $_POST["author_first_name"];
        $author_last_name = $_POST["author_last_name"];
        $publisher_name = $_POST["publisher_name"];
        $publisher_address = $_POST["publisher_address"];
        $publish_date = $_POST["publish_date"];
        $status = $_POST["status"];

               
        if($_FILES["image"]["error"] == 0){
            if($row["image"] != "default.png"){
                unlink("pictures/$row[image]"); 
                }
            $sql = "update `biglibrary` 
                            set title = '$title', $image = '$image[0]', isbn_code = '$isbn_code', short_description = '$short_description', type ='$type',
                                        author_first_name='$author_first_name', author_last_name ='$author_last_name', publisher_name='$publisher_name', 
                                        publisher_address='$publisher_address', publish_date='$publish_date', status='$status' where bookid=$bookid";
            } else {
            $sql = "update `biglibrary` 
                            set title = '$title', isbn_code = '$isbn_code', short_description = '$short_description', type ='$type',
                                        author_first_name='$author_first_name', author_last_name ='$author_last_name', publisher_name='$publisher_name', 
                                        publisher_address='$publisher_address', publish_date='$publish_date', status='$status' where bookid=$bookid";
            }
            if(mysqli_query($connect, $sql)){
                echo "
                <div class='alert alert-success' role='alert'>
                    All good.
                </div>
                ";
            }
            else{
                echo "
                <div class='alert alert-danger' role='alert'>
                    Somethings wrong.
                </div>
                ";
            }
    }
        
    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BE20-CR-SCHNURER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'includes/navbar.php' ?>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label class="form-label">
                Media Name:
                <input type="text" name="title" class="form-control" value="<?= $row["title"] ?>">
            </label>
            <select name="type">
                <option value="Book"<?php echo $row["type"] == "Book" ? "selected" : "" ?>>Book</option>
                <option value="DVD"<?php echo $row["type"] == "DVD" ? "selected" : "" ?>>DVD</option>
                <option value="CD"<?php echo $row["type"] == "CD" ? "selected" : "" ?>>CD</option>
            </select>
            </br>
            <label class="form-label">
                Picture:
                <input type="file" name="image" class="form-control">
            </label>
            <label class="form-label">
                ISBN Code:
                <input type="text" name="isbn_code" class="form-control" value="<?= $row["isbn_code"] ?>">
            </label>
            <br>
            <label class="form-label">
                Description:
                <textarea class="form-control" name="short_description" id="" cols="30" rows="5"><?= $row["short_description"]?></textarea>
            </label>
            <br>
            <label class="form-label">
                Author First Name:
                <input type="text" name="author_first_name" class="form-control"value="<?= $row["author_first_name"] ?>">
            </label>
            <label class="form-label">
                Author Last Name:
                <input type="text" name="author_last_name" class="form-control" value="<?= $row["author_last_name"] ?>">
            </label>
            <br>
            <label class="form-label">
                Publisher Name:
                <input type="text" name="publisher_name" class="form-control" value="<?= $row["publisher_name"] ?>">
            </label>
            <label class="form-label">
                Publisher Address:
                <input type="text" name="publisher_address" class="form-control" value="<?= $row["publisher_address"] ?>">
            </label>
            <br>
            <label class="form-label">
                Publish Date:
                <input type="text" name="publish_date" class="form-control" value="<?= $row["publish_date"] ?>">
            </label>
            <select name="status">
                <option value="available"<?php echo $row["status"] == "available" ? "selected" : "" ?>>available</option>
                <option value="reserved"<?php echo $row["status"] == "reserved" ? "selected" : "" ?>>reserved</option>
            </select>
            <br>
             <input type="submit" value="Update" name="update" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>