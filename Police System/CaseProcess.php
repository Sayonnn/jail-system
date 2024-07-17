<?php include 'Connection/Opencon.php';?>
<?php include 'Dashboard.php';?>

<?php
    session_start();
    
    //process for person in the role creation -->

    $checker =  $_SESSION['checker'];
    $CaseName= $_POST['Case-Name'];
    $CaseType= $_POST['Case-Type'];
    $CaseDesc= $_POST['Case-Desc'];
    $CaseDegree= $_POST['Case-Degree'];
    $CaseStatus= $_POST['Case-Status'];
    $ApplicableLaw= $_POST['Applicable-Law'];
    $PersonID= $_POST['Person-Involve'];
    $OfficerID= $_POST['Officer-ID'];
    

    if(isset($_POST['btnAddCase'])){
        if(empty($OfficerID)){
            echo ("<Script>alert('ERROR: Case Handler Officer Badge ID is required!')</Script>");
        }elseif (empty($CaseName)) {
            echo ("<Script>alert('ERROR: Please Specify the Case Name!')</Script>");
        }elseif (empty($CaseDegree)) {
            echo ("<Script>alert('ERROR: Is it bailable or not bailable?')</Script>");
        }elseif (empty($CaseStatus)) {
            echo ("<Script>alert('ERROR: Is it Active//Inactive//Open//Closed!')</Script>");
        }elseif (empty($CaseDesc)) {
            echo ("<Script>alert('ERROR: Please Enter case description!')</Script>");
        }elseif (empty($PersonID)) {
            echo ("<Script>alert('ERROR: Please Enter Primary Person Involve!')</Script>");
        }else{
            $query = "INSERT INTO casetable VALUES('','$CaseName',' $CaseType','$CaseDesc','$CaseDegree','$CaseStatus','$ApplicableLaw','$PersonID','$OfficerID')";
            $result = mysqli_query($Conn, $query);
            if($result){
                echo ("<Script>alert('SUCCESS: Officer Case Added successfully!')</Script>");
                echo "<meta http-equiv='refresh' content='0'>";
            }else{
                echo ("<Script>alert('ERROR: failed to Add Officer Case!')</Script>");
            }
        }
    }

    $Investigation= $_POST['Investigation'];
    $ProofImage= $_POST['Proof_Image'];
    $LegalDocs= $_POST['Legal_Docs'];
    $CaseID= $_POST['CaseID'];

    //proof images retrieving
    $Proof_Image  = $_FILES['Proof_Image'];                         // get image from post data 
    $Proof_name = $Proof_Image['name'];         //send this on database                     // image name
    $Proof_image_tmp_name = $Proof_Image['tmp_name'];                     // temp file path
    $Proof_destination="images/".$Proof_name;                    // Folder path Where Image saved
    move_uploaded_file($Proof_image_tmp_name , $Proof_destination); 

    //Legal Docs retrieving
    $Document  = $_FILES['Proof_Image'];                         // get image from post data 
    $Document_Proof_name = $Document['name'];           //send this on database                   // image name
    $Document_image_tmp_name = $Document['tmp_name'];                     // temp file path
    $Document_destination="images/".$Document_Proof_name;                    // Folder path Where Image saved
    move_uploaded_file($Document_image_tmp_name , $Document_destination); 
    

    if(isset($_POST['btnsubmitProof'])){
        if (empty($CaseID)) {
            echo ("<Script>alert('ERROR: Specify which case the documents are associated!')</Script>");
        }else{
            $query = "INSERT INTO personcaseinformation VALUES('','$Investigation',' $Proof_name','$Document_Proof_name','$CaseID')";
            $result = mysqli_query($Conn, $query);
            if($result){
                echo ("<Script>alert('SUCCESS: Officer Case Added successfully!')</Script>");
                echo "<meta http-equiv='refresh' content='0'>";
            }else{
                echo ("<Script>alert('ERROR: failed to Add Officer Case!')</Script>");
            }
        }
    }
?>
