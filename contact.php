<?php
$servername = "localhost";
$username ="root";
$password ="";
$dbname ="planesite";

$conn = mysqli_connect($servername,$username, $password, $dbname);
if(!$conn){
    echo "Database not connected to localhost". mysqli_connect_error();
}

$name = $_POST["name"];
$email = $_POST["email"];
$comment = $_POST["comment"];

// $fname = $_POST["fname"];

$sql = "INSERT INTO `comment` (`Id`, `name`, `email`, `comment`) VALUES (NULL, '$name', '$email', '$comment')";

if(mysqli_query($conn, $sql)){
    header("location: contactus.html");
}
else{
    echo "something went wrong".mysqli_error($conn);
}

mysqli_close($conn);

?>