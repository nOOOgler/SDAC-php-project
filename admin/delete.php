<?php
$servername = "localhost";
$username ="root";
$password ="";
$dbname ="planesite";

$conn = mysqli_connect($servername,$username, $password, $dbname);

$id = $_GET['id'];
if(!$conn){
    echo "Database not connected to localhost". mysqli_connect_error();
}
echo $id;

$sql =  "DELETE FROM users WHERE users.Id = '$id'";

$result = mysqli_query($conn, $sql);

if($result){
    echo "deleted";
    header ("location: usermanage.php");
}
else{
      echo mysqli_error($conn);
}

mysqli_close($conn);


?>