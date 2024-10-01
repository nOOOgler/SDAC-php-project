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

$sql =  "DELETE FROM comment WHERE comment.id = '$id'";

$result = mysqli_query($conn, $sql);

if($result){
    echo "deleted";
    header ("location: comments.php");
}
else{
      echo mysqli_error($conn);
}

mysqli_close($conn);


?>