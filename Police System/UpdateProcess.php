<?php include 'Connection/Opencon.php';?>
<?php include 'Dashboard.php';?>
<?php

    //for officer information updating
    session_start();

    if(isset($_POST['btnUpdateRegister'])){
        $OfficerID = $_POST['OfficerID'];
        $Name = $_POST['OfficerName'];
        $Gender = $_POST['OfficerGender'];
        $Age = $_POST['OfficerAge'];
        $Duty = $_POST['OfficerDuty'];
        $Rank = $_POST['OfficerRank'];
        $Position = $_POST['OfficerPosition'];
        
        $Officer_Image  = $_FILES['OfficerImage'];                         // get image from post data 
        $Officer_name = $Officer_Image['name'];                   //send this on database                     // image name
        $Officer_image_tmp_name = $Officer_Image['tmp_name'];                     // temp file path
        $Officer_destination="images/".$Officer_name;                    // Folder path Where Image saved
        move_uploaded_file($Officer_image_tmp_name , $Officer_destination); 

        $sql = "UPDATE officerinformation SET Name = '$Name',Gender = '$Gender', Age = '$Age', Duty = '$Duty', Rank = '$Rank', Position = '$Position', Image = '$Officer_name' WHERE OfficerID = '$OfficerID' ";
        if($result = mysqli_query($Conn, $sql)){
            echo ("<Script>alert('SUCCESS: Officer information updated successfully!')</Script>");
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo ("<Script>alert('SUCCESS: Failed to update data!')</Script>");
        }
    }

    //for person information updating

    if(isset($_POST['UpdatePerson'])){
        $PersonID = $_POST['PersonID'];
        $PersonName = $_POST['PersonName'];
        $PersonAge = $_POST['PersonAge'];
        $PersonGender = $_POST['PersonGender'];
        $PersonAddress= $_POST['PersonAddress'];
        $RoleType = $_POST['RoleType'];
        $CaseID = $_POST['CaseID'];

        $Person_Image  = $_FILES['PersonImage'];                         // get image from post data 
        $Person_name = $Person_Image['name'];                   //send this on database                     // image name
        $Person_image_tmp_name = $Person_Image['tmp_name'];                     // temp file path
        $Person_destination="images/".$Person_name;                    // Folder path Where Image saved
        move_uploaded_file($Person_image_tmp_name , $Person_destination); 

        $sql = "UPDATE personintherole SET PersonName = '$PersonName', PersonAge = '$PersonAge', PersonGender = '$PersonGender', PersonAddress = '$PersonAddress', RoleType = '$RoleType',PersonImage = '$Person_name',CaseID = '$CaseID' WHERE PersonID = '$PersonID' ";

        if($result = mysqli_query($Conn, $sql)){
            echo ("<Script>alert('SUCCESS: Person Involve information updated successfully!')</Script>");
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo ("<Script>alert('SUCCESS: Failed to update data!')</Script>");
        }
    }

    //for case information updating

    if(isset($_POST['btnUpdateCase'])){
        $CaseID = $_POST['CaseID'];
        $CaseName = $_POST['CaseName'];
        $CaseType = $_POST['CaseType'];
        $CaseDesc = $_POST['CaseDesc'];
        $CaseDegree = $_POST['CaseDegree'];
        $CaseStatus = $_POST['CaseStatus'];
        $ApplicableLaw = $_POST['ApplicableLaw'];
        $PersonInvolve = $_POST['PersonInvolve'];
        $OfficerID = $_POST['OfficerID'];

        $sql = "UPDATE casetable SET CaseName = '$CaseName', CaseType = '$CaseType', CaseDesc = '$CaseDesc', CaseDegree = '$CaseDegree', CaseStatus = '$CaseStatus', ApplicableLaw = '$ApplicableLaw', PersonID = '$PersonInvolve', OfficerID = '$OfficerID' WHERE CaseID = '$CaseID' ";

        if($result = mysqli_query($Conn, $sql)){
            echo ("<Script>alert('SUCCESS: Case information updated successfully!')</Script>");
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo ("<Script>alert('SUCCESS: Failed to update data!')</Script>");
        }
    }

    //for account information updating

    if(isset($_POST['btnUpdateAccount'])){
        $AccountID = $_POST['AccountID'];
        $Username = $_POST['OfficerUsername'];
        $Password = $_POST['OfficerPassword'];
        $DateCreated = $_POST['Date'];
        $OfficerID = $_POST['OfficerID'];

        $ENpassword = password_hash($Password,PASSWORD_DEFAULT);

        $sql = "UPDATE officeraccount SET OfficerUsername = '$Username', OfficerPassword = '$ENpassword', DateCreated =  '$DateCreated', OfficerID = '$OfficerID' WHERE AccountID = '$AccountID' ";

        if($result = mysqli_query($Conn, $sql)){
            echo ("<Script>alert('SUCCESS: Account of officer $OfficerID updated successfully!')</Script>");
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo ("<Script>alert('SUCCESS: Failed to update data!')</Script>");
        }
    }
?>