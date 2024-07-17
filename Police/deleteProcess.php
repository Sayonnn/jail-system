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

    
  //process for deleting message done -->

  if(isset($_GET['MID'])){
    $id = $_GET['MID'];
    $sql = "DELETE FROM messages WHERE MessageID = '$id'";
    if($result = mysqli_query($Conn, $sql)){
        header("Location:Dashboard.php");
        header("Refresh:0");
    }else{
        echo ("<Script>alert('Failed to delete Officer Information!')</Script>");
    }
}
?>
