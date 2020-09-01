<?php
$server='localhost';
$username='root';
$password=''; 
 $conn=mysqli_connect($server,$username,$password,'trial');//trial is name of DataBase
 if(!$conn)
 {  
     echo 'connection Error'.mysqli_connect_error();
 }

?>