<?php
$a= $_POST['a'];
$b= $_POST['b'];
$servername ="localhost";
$username="root";
$password="";
$dbname="planesite";

$conn = mysqli_connect($servername, $username, $password, $dbname );
if(!$conn){
    echo "database not connected". mysqli_connect_error();
   
}

$sql = "SELECT * FROM users WHERE email = '$a' AND password = '$b'";


$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    echo "successfull";
    header("location: index.html");
    
}
else{
    echo "invalid credentials";
}
mysqli_close($conn);


?>