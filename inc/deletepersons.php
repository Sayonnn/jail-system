<?php include 'Connection/Opencon.php';?>

<?php

 //process for Deletion of person involve-->

 if(isset($_GET['PersonID'])){
    $PersonID = $_GET['PersonID'];
    $sql2 = "DELETE FROM personintherole WHERE PersonID = '$PersonID'";
    if($result = mysqli_query($Conn, $sql2)){
        header("Location:Dashboard.php");
        header("Refresh:0");
    }else{
        echo ("<Script>alert('Failed to delete Person Information!')</Script>");
    }
}
?>
