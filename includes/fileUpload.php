<?php

function fileUpload($image){

    if($image["error"] == 4){ // checking if a file has been selected, it will return 0 if you choose a file, and 4 if you didn't
       $pictureName = "default.png"; // the file name will be default.png (default picture for a product)
       $message = "No picture has been chosen, but you can upload an image later :)";
   } else{
       $checkIfImage = getimagesize($image["tmp_name"]); // checking if you selected an image, return false if you didn't select an image
       $message = $checkIfImage ? "Ok" : "Not an image";
   }

    if($message == "Ok"){
       $ext = strtolower(pathinfo($image[ "name"],PATHINFO_EXTENSION)); // taking the extension data from the image
       $pictureName = uniqid(""). "." . $ext; // changing the name of the picture to random string and numbers
       $destination = "pictures/{$pictureName}"; // where the file will be saved
       move_uploaded_file($image["tmp_name"], $destination); // moving the file to the pictures folder
   }

    return [$pictureName, $message]; // returning an array with two values, the name of the picture and the message
}