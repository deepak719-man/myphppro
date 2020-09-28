<?php
function db(){

$conn = mysqli_connect('localhost','root','','ajax',8111);

return $conn;
}



?>