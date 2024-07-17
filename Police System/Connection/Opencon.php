<?php
$Server = 'localhost';
$Host = 'root';
$Password = '';
$Database = 'finals';

$Conn = mysqli_connect($Server, $Host, $Password, $Database);

if(!$Conn){
    echo ("<script>alert('Connection failed!');</script>");
}
?>