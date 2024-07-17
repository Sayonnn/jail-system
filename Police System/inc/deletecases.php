<?php include 'Connection/Opencon.php';?>
<?php

    //process for Deletion of case information -->

   if(isset($_GET['CaseID'])){
    $CaseID = $_GET['CaseID'];
    $sql1 = "DELETE FROM casetable WHERE CaseID = '$CaseID'";
    if($result = mysqli_query($Conn, $sql1)){
        header("Location:Dashboard.php");
        header("Refresh:0");
    }else{
        echo ("<Script>alert('Failed to delete Officer Information!')</Script>");
    }
}


   
?>
