<?php include 'Connection/Opencon.php';?>
<?php include 'Dashboard.php';?>


<?php
    session_start();
    
   //process for officer account creation -->
    
    $BadgeID = $_POST['Badge_ID'];
    $OfficerUsername = $_POST['Officer-Username'];
    $OfficerPassword = $_POST['Officer-password'];

    if(isset($_POST['btnCreate'])){
//        echo ("<Script>alert('$EN')</Script>");
            $ENpassword = password_hash($OfficerPassword,PASSWORD_DEFAULT);

        if(empty($BadgeID) || empty($OfficerUsername) || empty($OfficerPassword)){
            echo ("<Script>alert('ERROR: All fields are required!)</Script>");
        }else{
            $query = "INSERT INTO officeraccount(OfficerUsername,OfficerPassword,OfficerID)VALUES('$OfficerUsername','$ENpassword','$BadgeID')";
            $result = mysqli_query($Conn, $query);
            if($result){
                echo ("<Script>alert('SUCCESS: Account created successfully!')</Script>");
                echo "<meta http-equiv='refresh' content='0'>";
            }else{
                echo ("<Script>alert('ERROR: Account creation failed!')</Script>");
            }
        }
    }
?>




