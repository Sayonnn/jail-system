<?php include 'Connection/Opencon.php';?>
<?php include 'Dashboard.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.officer-dashboard.com</title>
    <link rel="stylesheet" href="Style/Update.css" type ="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
    <script type="text/javascript" src="Script/Script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body class="body">
    <script src = "Script/Script.js"></script>

<?php
    session_start();
    $checker = $_SESSION['checker'];
    $OfficerID =  $_SESSION['OfficerID'] ;
    $officer = "officer";
    $admin = "admin";
?>

<?php

  //fetching account data

if(isset($_GET['AccountID'])){
    $AccountID = $_GET['AccountID'];
    $sql = "SELECT * FROM  officeraccount WHERE AccountID = '$AccountID'";
    $result = mysqli_query($Conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $AccountID = $row['AccountID'];
    $Username = $row['OfficerUsername'];
    $Password = $row['OfficerPassword'];
    $DateCreated = $row['DateCreated'];
    $OffID = $row['OfficerID'];
    ?>
        <style>
            #addcaseContainer{
                display:none;
            }
            .Add-Person-Involve{
                display:none;
            }
            .Add-Officer-Container{
                display:none;
            }
            
        </style>
        <form  action="/UpdateProcess.php" class = "Update-Acc-Container" id = "Update-Acc-Container" autocomplete = "off"  method="POST">
            <!-- this part is for the officer account creating -->
            <div class="Officer-Update-Acc" id="Officer-Update-Acc">
                <img src="img/goldlogo.png" alt="">
                <h2>Officer Account</h2>
                <div class="Update-Acc">
                    <label for="AccountID">Account ID:</label>
                    <input type="text" name="AccountID" class="" placeholder="<?php echo $AccountID;?>" autocomplete="off" value = "<?php echo $AccountID;?>" readonly>
                </div>
                <div class="Update-Acc">
                    <label for="OfficerUsername">Username:</label>
                    <input type="text" name="OfficerUsername" id="" class="Officer-Username" placeholder = "<?php echo $AccountID;?>" autocomplete="off" value = "<?php echo $Username;?>">
                </div>
                <div class="Update-Acc">
                    <label for="OfficerPassword">Password:</label>
                    <input type="password" name="OfficerPassword" id="" placeholder = "Officer Password" class="<?php echo $AccountID;?>" value = "<?php echo $Password;?>">
                </div>
                <div class="Update-Acc">
                    <label for="Date">Date Created:</label>
                    <input type="text" name="Date" class="" placeholder="<?php echo $DateCreated;?>" autocomplete="off" value = "<?php echo $DateCreated;?>" >
                </div>
                <div class="Update-Acc">
                    <label for="OfficerID">Officer ID:</label>
                    <input type="text" name="OfficerID" id="" class="Officer-Username" placeholder = "<?php echo $OffID;?>" autocomplete="off" value = "<?php echo $OffID;?>">
                </div>
                <div class="btnContainer">
                        <button id = "btnUpdateAccount"class="btnUpdateAccount" name = "btnUpdateAccount">Update</button>
                </div>
            </div>
        </form>

<?php }?>

<?php

  //fetching case data-->

  if(isset($_GET['CaseID'])){
    $CaseID = $_GET['CaseID'];
    $sql = "SELECT * FROM casetable WHERE CaseID = '$CaseID'";
    $result = mysqli_query($Conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $CaseID = $row['CaseID'];
    $CaseName = $row['CaseName'];
    $CaseType = $row['CaseType'];
    $CaseDesc = $row['CaseDesc'];
    $CaseDegree = $row['CaseDegree'];
    $CaseStatus = $row['CaseStatus'];
    $ApplicableLaw = $row['ApplicableLaw'];
    $PersonID = $row['PersonID'];
    $OffID = $row['OfficerID'];
?>
    <style>
          .Update-Acc-Container{
            display:none;
          }  
          .Add-Person-Involve{
            display:none;
          }
          .Add-Officer-Container{
            display:none;
        }
        
    </style>
     <form action="/UpdateProcess.php" method = "POST" class = "UpdateCaseContainer" id = "UpdateCaseContainer">
                <div class="UpdateCase" id="UpdateCase">
                    <img src="img/goldlogo.png" alt="">
                    <h2>Update Case</h2>
                    <div class="Cases">
                        <label for="CaseID">Case ID: </label>
                        <input type="text" name="CaseID" class="short" placeholder="Case ID" autocomplete="off" value = "<?php echo $CaseID;?>" readonly>
                    </div>
                    <div class="Cases">
                        <label for="CaseName">Case Name: </label>
                        <input type="text" name="CaseName" class="Case-Name" placeholder="Case Name" autocomplete="off" value = "<?php echo $CaseName;?>">
                    </div>
                    <div class="Cases">
                        <label for="CaseType">Case Type: </label>
                        <input type="text" name="CaseType" class="short" placeholder="Case Type" autocomplete="off" value = "<?php echo $CaseType;?>">
                    </div>
                    <div class="Cases">
                        <label for="CaseDesc">Case Description: </label>
                        <input type="text" name="CaseDesc" class="short" placeholder="Case Description" autocomplete="off" value = "<?php echo $CaseDesc;?>">
                    </div>
                    <div class="Cases">
                        <label for="CaseDegree">Case Degree: </label>
                        <input type="text" name="CaseDegree" class="Case-Degree" placeholder="Case Degree" autocomplete="off" value = "<?php echo $CaseDegree;?>">
                    </div>
                    <div class="Cases">
                        <label for="CaseStatus">Case Status: </label>
                        <input type="text" name="CaseStatus" class="Case-Status" placeholder="Case Status" autocomplete="off" value = "<?php echo $CaseStatus;?>">
                    </div>
                    <div class="Cases">
                        <label for="ApplicableLaw">Applicable Law: </label>
                        <input type="text" name="ApplicableLaw" class="Applicable-Law" placeholder="Applicable Law" autocomplete="off" value = "<?php echo $ApplicableLaw;?>">
                    </div>
                    <div class="Cases">
                        <label for="PersonInvolve">Person ID: </label>
                        <input type="text" name="PersonInvolve" class="short" placeholder="Person in the role ID" autocomplete="off" value = "<?php echo $PersonID;?>">
                    </div>
                    <div class="Cases">
                        <label for="OfficerID">Officer ID: </label>
                        <input type="text" name="OfficerID" class="short" placeholder="Officer Badge ID" autocomplete="off"value = "<?php echo $OffID;?>">
                    </div>
                    <div class="btnContainer">
                        <input type="button" value="Update Proof" id = "UpdateProof">
                        <button id = "btnUpdateCase"class="btnUpdateCase" name = "btnUpdateCase">Update</button>
                    </div>
                </div>  
        </form>
<?php }?>

<?php

 //fetching person involve data / done for updating-->

 if(isset($_GET['PersonID'])){
    $PersonID = $_GET['PersonID'];
    $sql = "SELECT * FROM personintherole WHERE PersonID = '$PersonID'";
    $result = mysqli_query($Conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $PersonID = $row['PersonID'];
    $PersonName = $row['PersonName'];
    $PersonAge = $row['PersonAge'];
    $PersonGender = $row['PersonGender'];
    $PersonAddress = $row['PersonAddress'];
    $RoleType = $row['RoleType'];
    $CaseID = $row['CaseID'];
    $Image = $row['PersonImage'];
?>
    <style>
        #addcaseContainer{
            display:none;
        } 
        .Update-Acc-Container{
            display:none;
          }  
        .Add-Officer-Container{
            display:none;
        }
        
    </style>
    <form action="/UpdateProcess.php" class="Update-Person-Involve-Container" id="Update-Person-Involve-Container"  method="POST" enctype="multipart/form-data">
            <div class="Update-Person-Involve" id = "Update-Person-Involve">
                <?php
                    echo  "<img src=img/".$Image.' alt = "Officer Profile Picture" class="officerImg" style = "width:120px; height:120px;border-radius:15px;border:2px solid gray;">';
                ?>
                <h2>Person Involve Update</h2>
                <div class="Person-Container">
                    <label for="PersonID">Person ID: </label>
                    <input type="text" name="PersonID" class="" placeholder="Person ID" autocomplete="off" value = "<?php echo $PersonID;?>" readonly>
                </div>
                <div class="Person-Container">
                    <label for="PersonName">Person Name: </label>
                    <input type="text" name="PersonName" class="" placeholder="Person Name" autocomplete="off" value = "<?php echo $PersonName;?>">
                </div>
                <div class="Person-Container">
                    <label for="PersonAge">Person Age: </label>
                    <input type="number" name="PersonAge" class="" placeholder="Person Age" autocomplete="off" value = "<?php echo $PersonAge;?>">
                </div>
                <div class="Person-Container">
                    <label for="PersonGender">Person Gender: </label>
                    <input type="text" name="PersonGender" class="" placeholder="Person Gender"  autocomplete="off" value = "<?php echo $PersonGender;?>" >
                </div>
                <div class="Person-Container">
                    <label for="PersonAddress">Person Address: </label>
                    <input type="text" name="PersonAddress" class="" placeholder="Person Address" autocomplete="off" value = "<?php echo $PersonAddress;?>">
                </div>
                <div class="Person-Container">
                    <label for="RoleType">Role Type: </label>
                    <input type="text" name="RoleType" class="" placeholder="Role Type" autocomplete="off" value = "<?php echo $RoleType;?>">
                </div>
                <div class="Person-Container">
                    <label for="PersonImage">Person Image: </label>
                    <input type="file" name="PersonImage"  accept="image/*" class="PersonImage"  value = "<?php echo $Image;?>"> 
                </div>
                <div class="Person-Container">
                    <label for="CaseID">Case ID: </label>
                    <input type="text" name="CaseID" class="" placeholder="CaseID" autocomplete="off" value = "<?php echo $CaseID;?>">
                </div>
                <div class="btnContainer">
                    <input type = "button" value ="Hide"class="btnHide" name = "Hide" id = "Hide" onclick = "hide()">
                    <button class="UpdatePerson" name = "UpdatePerson">Update</button>
                </div>
            </div>
        </form>
<?php }?>
<?php

  //fetching officer information data / done for updating-->

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM officerinformation WHERE OfficerID = '$id'";
    $result = mysqli_query($Conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $OffID = $row['OfficerID'];
    $Name = $row['Name'];
    $Gender = $row['Gender'];
    $Age = $row['Age'];
    $Duty = $row['Duty'];
    $Rank = $row['Rank'];
    $Position = $row['Position'];
    $Image = $row['Image'];
?>
    <style>
        #addcaseContainer{
            display:none;
        } 
        .Update-Acc-Container{
            display:none;
        }  
        .Add-Person-Involve{
            display:none;
        } 
        
    </style>
    <form action="/UpdateProcess.php" autocomplete = "off" class="Update-Officer-Container" id="Update-Officer-Container"  method="POST"  enctype="multipart/form-data">
            <div class="Update-Officer" id = "Update-Officer">
                <?php
                    echo  "<img src=img/".$Image.' alt = "Officer Profile Picture" class="officerImg" style = "width:120px; height:120px;border-radius:15px;border:2px solid gray;">';
                ?>
                <h2>Officer Information Update</h2>
                <div class="Officer-Information">
                    <label for="OfficerID">Badge ID: </label>
                    <input type="text" name="OfficerID" class="" placeholder="Officer ID " autocomplete="off" value = "<?php echo  $OffID;?>" readonly>
                </div>
                <div class="Officer-Information">
                    <label for="OfficerName">Name: </label>
                    <input type="text" name="OfficerName" class="" placeholder="Officer Name" autocomplete="off" value = "<?php echo $Name;?>">
                </div>
                <div class="Officer-Information">
                    <label for="OfficerGender">Gender: </label>
                    <input type="text" name="OfficerGender" class="" placeholder="Gender"  autocomplete="off" value = "<?php echo $Gender?>">
                </div>
                <div class="Officer-Information">
                    <label for="OfficerAge">Age: </label>
                    <input type="number" name="OfficerAge" class="" placeholder="Age" autocomplete="off" value = "<?php echo $Age;?>">
                </div>
                <div class="Officer-Information">
                    <label for="OfficerDuty">Duty: </label>
                    <input type="text" name="OfficerDuty" class="" placeholder="Duty" autocomplete="off" value = "<?php echo $Duty;?>">
                </div>
                <div class="Officer-Information">
                    <label for="OfficerRank">Rank: </label>
                    <input type="text" name="OfficerRank" class="" placeholder="Rank" autocomplete="off" value = "<?php echo $Rank;?>">
                </div>
                <div class="Officer-Information">
                    <label for="OfficerPosition">Position: </label>
                    <input type="text" name="OfficerPosition" class="" placeholder="Position" autocomplete="off" value = "<?php echo $Position;?>">
                </div>
                <div class="Officer-Information">
                    <label for="OfficerImage">Image: </label>
                    <input type="file" name="OfficerImage"  accept="image/*" class="OfficerImage"  value = "<?php echo $Image;?>"> 
                </div>
                <div class="btnContainer">
                    <button class="btnReset" name = "Reset" id = "Reset" >Reset</button>
                    <button class="btnUpdateRegister" name = "btnUpdateRegister">Update</button>
                </div>
            </div>
        </form>
<?php }?>
</body>
</html>