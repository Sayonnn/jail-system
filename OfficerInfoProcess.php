<?php include 'Connection/Opencon.php';?>
<?php include 'Dashboard.php';?>



<?php
    session_start();
    $checker =  $_SESSION['checker'];
    $missingErr = "";
    //variables retrieve from the officer information registration dashboard
    $OfficerID = $_POST['Officer_ID'];
    $OfficerName = $_POST['Officer_Name'];      
    $OfficerGender = $_POST['Officer_Gender'];
    $OfficerAge = $_POST['Officer_Age'];
    $OfficerDuty = $_POST['Officer_Duty'];
    $OfficerRank = $_POST['Officer_Rank'];
    $OfficerPosition = $_POST['Officer_Position'];
    $image  = $_FILES['Officer_Image'];                         // get image from post data 
    $image_name = $image['name'];                              // image name
    $image_tmp_name = $image['tmp_name'];                     // temp file path
    $destination="images/".$image_name;                    // Folder path Where Image saved
    move_uploaded_file($image_tmp_name , $destination); 

    if(isset($_POST['Register'])){
         if(empty($OfficerID)){
            $missingErr = "Field Error: Unique OfficerID is required!";
            missingError($missingErr);
         }elseif (empty($OfficerName)) {
            $missingErr = "Field Error: Officer Name is required!";
            missingError($missingErr);
         }elseif (empty($OfficerGender)) {
            $missingErr = "Field Error: Officer Gender is required!";
            missingError($missingErr);
         }elseif (empty($OfficerAge)) {
            $missingErr = "Field Error: Officer Age is required!";
            missingError($missingErr);
         }elseif (empty($OfficerRank)) {
            $missingErr = "Field Error: Please specify the officer rank!";
            missingError($missingErr);
         }elseif (empty($OfficerPosition)) {
            $missingErr = "Field Error: Please specify the officer position!";
            missingError($missingErr);
         }
         else{
            $sql = "INSERT INTO officerinformation(OfficerID,Name,Gender,Age,Duty,Rank,Position,`Image`)VALUES('$OfficerID','$OfficerName','$OfficerGender','$OfficerAge',' $OfficerDuty','$OfficerRank','$OfficerPosition','{$image_name}')";
            if($result = mysqli_query($Conn, $sql)){
               echo ("<Script>alert('SUCCESS: Officer Information Registration Complete!')</Script>");
               echo "<meta http-equiv='refresh' content='0'>";
            }else{
                echo ("<Script>alert('ERROR: Officer Information Registration Failed!')</Script>");
            }
         }
    }
    function missingError($missingErr){
        echo ("<Script>alert('$missingErr')</Script>");
    }
?>




