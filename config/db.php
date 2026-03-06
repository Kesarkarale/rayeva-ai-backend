  <?php

$host="localhost";
$user="root";
$password="";
$database="rayeva_ai";

$conn=new mysqli($host,$user,$password,$database);

if($conn->connect_error){
die("Database Connection Failed: ".$conn->connect_error);
}

?>
