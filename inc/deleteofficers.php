<?php include 'Connection/Opencon.php';?>
<?php
   //process for Deletion of officer information -->

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM officerinformation WHERE OfficerID = '$id'";
        if($result = mysqli_query($Conn, $sql)){
            header("Location:Dashboard.php");
            header("Refresh:0");
        }else{
            echo ("<Script>alert('Failed to delete Officer Information!')</Script>");
        }
    }
?>
