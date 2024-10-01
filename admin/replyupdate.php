<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Website Project\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\Website Project\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Website Project\phpmailer\src\SMTP.php';

$id =$_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$reply = $_POST['reply'];


$servername = "localhost";
$username = "root";
$password ="";
$dbname="planesite";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn){
    echo "database not connected". mysqli_connect_error();
}


$sql = "UPDATE `comment` SET `name` = '$name', `email` = '$email', `comment` = '$comment', `reply` = '$reply' WHERE `comment`.`id` = '$id'";

$result = mysqli_query($conn, $sql);

if($result){

    $mail = new PHPMailer(true);

$aemail = 'angchekaromkar03@gmail.com';
$password = 'rftm sycl ifeb ixun';

try {
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $aemail;
    $mail->Password = $password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 25;

    // Recipient information
    $mail->setFrom($aemail, 'Planesite- Tours and Travel Agency');
    $mail->addAddress($email, $name);
    $mail->addReplyTo($aemail,'Planesite- Tours and Travel Agency' );

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Thank You for Your Feedback!';
    $mail->Body    = $reply;

    $mail->send();
    header("location:comments.php");
  
} catch (Exception $e) {
    echo 'Failed to send email: ', $mail->ErrorInfo;
}
   
}
else{
    echo "error".myqli_error($conn);
}

mysqli_close($conn);



?>