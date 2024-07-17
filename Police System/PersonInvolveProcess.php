<?php include 'Connection/Opencon.php';?>
<?php include 'Dashboard.php';?>

<?php
    session_start();
    
    //process for person in the role creation -->

    $checker =  $_SESSION['checker'];
    $PersonName= $_POST['Person-Name'];
    $PersonAge= $_POST['Person-Age'];
    $PersonGender= $_POST['Person-Gender'];
    $PersonAddress= $_POST['Person-Address'];
    $RoleType= $_POST['Role-Type'];
    $CaseID = $_POST['Case-ID'];

    $image  = $_FILES['Person-Image'];                         // get image from post data 
    $image_name = $image['name'];                              // image name
    $image_tmp_name = $image['tmp_name'];                     // temp file path
    $destination="images/".$image_name;                    // Folder path Where Image saved
    move_uploaded_file($image_tmp_name , $destination); 

    if(isset($_POST['SubmitPerson'])){
        if(empty($PersonName) || empty($PersonAge)|| empty($PersonGender) ||empty($RoleType)||empty($CaseID)){
            echo ("<Script>alert('ERROR: All fields are required!')</Script>");
        }else{
            $query = "INSERT INTO personintherole(PersonID,PersonName,PersonAge,PersonGender,PersonAddress,RoleType,`PersonImage`,CaseID) VALUES('','$PersonName',' $PersonAge','$PersonGender','$PersonAddress','$RoleType','{$image_name}','$CaseID')";
            $result = mysqli_query($Conn, $query);
            if($result){
                echo ("<Script>alert('SUCCESS: Person Involve Added successfully!')</Script>");
                echo "<meta http-equiv='refresh' content='0'>";
            }else{
                echo ("<Script>alert('ERROR: failed to Add Person Involve!')</Script>");
            }
        }
    }
?>
