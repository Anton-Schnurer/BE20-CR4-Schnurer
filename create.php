<?php
    require_once 'includes/db_connect.php';
    require_once 'includes/fileUpload.php';

    if(isset($_POST["create"])){

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

        $sql = "INSERT INTO `biglibrary` (`title`, `image`, `isbn_code`, `short_description`, `type`, `author_first_name`, `author_last_name`,
                                         `publisher_name`, `publisher_address`, `publish_date`, `status`) 
                VALUES ('$title', '$image[0]', '$isbn_code', '$short_description', '$type', '$author_first_name', '$author_last_name',
                         '$publisher_name', '$publisher_address', '$publish_date', '$status')";



// echo $sql;
// exit();



        if(mysqli_query($connect, $sql)){
            echo "
            <div class='alert alert-success' role='alert'>
                New Media added!
            </div>";
        }
        else {
            echo "
            <div class='alert alert-danger' role='alert'>
                Something went wrong!
            </div>";
        }
    }

    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'includes/navbar.php' ?>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label class="form-label">
                Media Name:
                <input type="text" name="title" class="form-control">
            </label>
            <select name="type">
                <option value="Book">Book</option>
                <option value="DVD">DVD</option>
                <option value="CD">CD</option>
            </select>
            </br>
            <label class="form-label">
                Picture:
                <input type="file" name="image" class="form-control">
            </label>
            <label class="form-label">
                ISBN Code:
                <input type="text" name="isbn_code" class="form-control">
            </label>
            <br>
            <label class="form-label">
                Description:
                <textarea class="form-control" name="short_description" id="" cols="30" rows="5"></textarea>
            </label>
            <br>
            <label class="form-label">
                Author First Name:
                <input type="text" name="author_first_name" class="form-control">
            </label>
            <label class="form-label">
                Author Last Name:
                <input type="text" name="author_last_name" class="form-control">
            </label>
            <br>
            <label class="form-label">
                Publisher Name:
                <input type="text" name="publisher_name" class="form-control">
            </label>
            <label class="form-label">
                Publisher Address:
                <input type="text" name="publisher_address" class="form-control">
            </label>
            <br>
            <label class="form-label">
                Publish Date:
                <input type="text" name="publish_date" placeholder="YYYY-MM-DD" class="form-control">
            </label>
            <select name="status">
                <option value="available">available</option>
                <option value="reserved">reserved</option>
            </select>
            <br>
             <input type="submit" value="Create" name="create" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>