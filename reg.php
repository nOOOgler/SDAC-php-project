<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Website Project\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\Website Project\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Website Project\phpmailer\src\SMTP.php';

$servername = "localhost";
$username ="root";
$password ="";
$dbname ="planesite";

$conn = mysqli_connect($servername,$username, $password, $dbname);
if(!$conn){
    echo "Database not connected to localhost". mysqli_connect_error();
}

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$contact = $_POST["contact"];
$email = $_POST["email"];
$password = $_POST["password"];
$hashedpass = hash('md5', $password);
// $fname = $_POST["fname"];

$sql = "INSERT INTO `users` (`Id`, `fname`, `lname`, `contact`, `email`, `password`) VALUES (NULL, '$fname', '$lname', '$contact', '$email', '$hashedpass')";

if(mysqli_query($conn, $sql)){
    $mail = new PHPMailer(true);

    $aemail = 'angchekaromkar03@gmail.com';
    $pass = 'rftm sycl ifeb ixun';
    
    try {
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $aemail;
        $mail->Password = $pass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 25;
    
        // Recipient information
        $mail->setFrom($aemail, 'Planesite- Tours and Travel Agency');
        $mail->addAddress($email, $fname);
        $mail->addReplyTo($aemail,'Planesite- Tours and Travel Agency' );
    
        // Email content
        $mail->isHTML(true);
        $mail->Subject = ' Welcome to Planesite! Your Registration is Complete 🌍✈️';
        $mail->Body    = 'Dear ' .$fname. ',<br>

        Congratulations! We are thrilled to welcome you to Planesite – your passport to extraordinary travel experiences.<br>
        
        Thank you for choosing us to be a part of your journey. Your registration was successful, and you are now an esteemed member of our travel community.<br><br>
        
        Here are a few things you can do with your new account:<br>
        
        1. **Explore Our Tours:** Dive into a world of exciting travel destinations and discover unique experiences tailored just for you.<br>
        
        2. **Manage Your Bookings:** Easily book and manage your upcoming tours through your personalized account dashboard.<br>
        
        3. **Exclusive Offers:** As a valued member, you will receive exclusive offers, discounts, and updates on our latest travel packages.<br>
        
        4. **Stay Connected:** Join our newsletter to stay informed about the latest travel trends, destination highlights, and travel tips.<br><br>
        
        If you have any questions or need assistance, our dedicated team is here to help. Simply reply to this email, and will be happy to assist you.<br>
        
        Once again, thank you for choosing Planesite.<br> We look forward to being a part of your memorable travel experiences.<br>
        
        Happy Travels!<br><br>
        
        Best regards,<br>
        Planesite
        ';
    
        $mail->send();
        header("location: index.html");
      
    } catch (Exception $e) {
        echo 'Failed to send email: ', $mail->ErrorInfo;
    }

    
}
else{
    echo "something went wrong".mysqli_error($conn);
}

mysqli_close($conn);

?>