<?php
$Server = 'localhost';
$Host = 'adbms';
$Password = '!Cr!m!n@l$19';
$Database = 'adbms';

$Conn = mysqli_connect($Server, $Host, $Password, $Database);

if(!$Conn){
    echo ("<script>alert('Connection failed!');</script>");
}
?>