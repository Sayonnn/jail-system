<?php include 'Connection/Opencon.php';?>

<?php

   //process for Deletion of case information -->

   if(isset($_GET['AccountID'])){
    $AccountID = $_GET['AccountID'];
    $sql1 = "DELETE FROM officeraccount WHERE AccountID = '$AccountID'";
    if($result = mysqli_query($Conn, $sql1)){
        header("Location:Dashboard.php");
        header("Refresh:0");
    }else{
        echo ("<Script>alert('Failed to delete Officer Information!')</Script>");
    }
}
?>
