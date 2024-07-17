<?php include 'Connection/Opencon.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.filterdashboard.com</title>
    <link rel="stylesheet" href="Style/Query.css" type ="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body class="body">

<?php
    session_start();
    $checker = $_SESSION['checker'];        //only on admin
    $OfficerID =  $_SESSION['OfficerID'] ;  //only on officer
    $officer = "officer";
    $admin = "admin";
?>
<nav>
    <a href="Filter.php" style = "float:left;">Previous</a>
    <a href="Dashboard.php" style = "float:right;">Dashboard</a>
</nav>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST"id = "query-Container" >
        <select id= "Queries" name = "searchFilter" >
            <option selected disabled hidden></option>
            <option value="1st Query">Admin Authorization</option>
            <option value="2nd Query">Messages</option>
            <option value="3rd Query">Joined Cases</option>
            <option value="4th Query">Lieutenants</option>
            <option value="5th Query">Admin Account</option>
            <option value="6th Query">Proofs</option>
            <option value="7th Query">Open Cases</option>
            <option value="8th Query">Frauds</option>
            <option value="9th Query">Witness</option>
            <option value="10th Query">Suspects</option>
            <option value="11th Query">Victims</option>
            <option value="12th Query">Male Officers</option>
            <option value="13th Query">Female Officers</option>
            <option value="14th Query">Officer ID < 100</option>
            <option value="15th Query">Officer ID > 100</option>
            <option value="16th Query">Closed Cases</option>
            <option value="17th Query">Age Between 30 and 40</option>
            <option value="18th Query">Male Age <= 25</option>
            <option value="19th Query">Female Age <= 25</option>
            <option value="20th Query">Male Age > 25</option>
            <option value="21st Query">Female Age > 25</option>
            <option value="22nd Query">Generals</option>
            <option value="23rd Query">Captain</option>
            <option value="24th Query">Colonel</option>
            <option value="25th Query">Sergeant</option>
        </select>
        <button name= "btnSearch" id = "btnSearch">Start</button>
</form>
<?php
$strQuery ="";
if(isset($_POST['btnSearch'])){
    $searchFilter = $_POST['searchFilter'];
    //searching for officer information
            if($searchFilter == "1st Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">AdminID:</th>
            <th scope = "col">Username:</th>
            <th scope = "col">Date Created:</th>
            <th scope = "col">Password:</th>
            <th scope = "col">AuthorizeID:</th>
            <th scope = "col">Email:</th>
            <th scope = "col">Code:</th>
            <th scope = "col">Secret Pin:</th>
            <th scope = "col">Secret Password:</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT aa.AdminID, aa.Username, aa.DateCreated, aa.Password,
                auth.AuthorizeID, auth.Email, auth.Code, auth.SecretPin, auth.SecretPassword
                FROM adminaccount AS aa
                INNER JOIN authorizeadmin AS auth 
                ON aa.AdminID = auth.AdminID
                WHERE aa.Username = 'Laud Zion'
                AND auth.Email LIKE 'cascallalaudzion19@gmail.com'
                ORDER BY aa.DateCreated DESC, auth.AuthorizeID ASC";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <th scope = "row">'.$row['AdminID'].'</th>
                    <td>'.$row['Username'].'</td>
                    <td>'.$row['DateCreated'].'</td>
                    <td>'.$row['Password'].'</td>
                    <td>'.$row['AuthorizeID'].'</td>
                    <td>'.$row['Email'].'</td>
                    <td>'.$row['Code'].'</td>
                    <td>'.$row['SecretPin'].'</td>
                    <td>'.$row['SecretPassword'].'</td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
            }elseif($searchFilter == "2nd Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">MessageID:</th>
            <th scope = "col">Title</th>
            <th scope = "col">Message</th>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Rank</th>
            <th scope = "col">DateSent</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT MessageID, Title, Message, OfficerID, Name, Rank, DateSent FROM messages;";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <th scope = "row">'.$row['MessageID'].'</th>
                    <td>'.$row['Title'].'</td>
                    <td>'.$row['Message'].'</td>
                    <td>'.$row['OfficerID'].'</td>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['DateSent'].'</td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
            }elseif($searchFilter == "3rd Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">CaseID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Type</th>
            <th scope = "col">Description</th>
            <th scope = "col">Degree</th>
            <th scope = "col">Status</th>
            <th scope = "col">Law</th>
            <th scope = "col">PersonID</th>
            <th scope = "col">OfficerID</th>
            <th scope = "col">PersonName</th>
            <th scope = "col">Age</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Address</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT casetable.*, personintherole.PersonName, personintherole.PersonAge, personintherole.PersonGender, personintherole.PersonAddress FROM casetable JOIN personintherole ON casetable.CaseID = personintherole.CaseID WHERE casetable.CaseStatus = 'Closed'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <th scope = "row">'.$row['CaseID'].'</th>
                    <td>'.$row['CaseName'].'</td>
                    <td>'.$row['CaseType'].'</td>
                    <td>'.$row['CaseDesc'].'</td>
                    <td>'.$row['CaseDegree'].'</td>
                    <td>'.$row['CaseStatus'].'</td>
                    <td>'.$row['ApplicableLaw'].'</td>
                    <td>'.$row['PersonID'].'</td>
                    <td>'.$row['OfficerID'].'</td>
                    <td>'.$row['PersonName'].'</td>
                    <td>'.$row['PersonAge'].'</td>
                    <td>'.$row['PersonGender'].'</td>
                    <td>'.$row['PersonAddress'].'</td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
            
        }elseif($searchFilter == "4th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Rank = 'Lieutenant'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];

                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
                        
        }elseif($searchFilter == "5th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">AdminID</th>
            <th scope = "col">Username</th>
            <th scope = "col">Password</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT AdminID, Username, Password FROM adminaccount WHERE DateCreated > '2022-01-01'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <th scope = "row">'.$row['AdminID'].'</th>
                    <td>'.$row['Username'].'</td>
                    <td>'.$row['Password'].'</td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "6th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">ID</th>
            <th scope = "col">Investigation</th>
            <th scope = "col">Proofs</th>
            <th scope = "col">LegalDocs</th>
            <th scope = "col">CaseID</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT ID, Investigation, Proofs, LegalDocs, CaseID FROM personcaseinformation";
            
                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Proofs = $row['Proofs'];
                    $Image = $row['LegalDocs'];

                    echo '<tr>
                    <th scope = "row">'.$row['ID'].'</th>
                    <td>'.$row['Investigation'].'</td>
                    <td><img src="img/'.$Proofs.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:15px;"></td>
                    <td>'.$row['CaseID'].'</td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "7th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">CaseID</th>
            <th scope = "col">Case Name</th>
            <th scope = "col">Case Type</th>
            <th scope = "col">Description</th>
            <th scope = "col">Case Degree</th>
            <th scope = "col">Case Status</th>
            <th scope = "col">Law</th>
            <th scope = "col">Person ID</th>
            <th scope = "col">Officer ID</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM casetable WHERE CaseStatus = 'Open'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <th scope = "row">'.$row['CaseID'].'</th>
                    <td>'.$row['CaseName'].'</td>
                    <td>'.$row['CaseType'].'</td>
                    <td>'.$row['CaseDesc'].'</td>
                    <td>'.$row['CaseDegree'].'</td>
                    <td>'.$row['CaseStatus'].'</td>
                    <td>'.$row['ApplicableLaw'].'</td>
                    <td>'.$row['PersonID'].'</td>
                    <td>'.$row['OfficerID'].'</td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "8th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">ID</th>
            <th scope = "col">Investigation</th>
            <th scope = "col">Proofs</th>
            <th scope = "col">Legal Documents</th>
            <th scope = "col">Case ID</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM personcaseinformation WHERE Investigation LIKE '%fraud%'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Proofs = $row['Proofs'];
                    $Image = $row['LegalDocs'];

                    echo '<tr>
                    <th scope = "row">'.$row['ID'].'</th>
                    <td>'.$row['Investigation'].'</td>
                    <td><img src="img/'.$Proofs.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:15px;"></td>
                    <td>'.$row['CaseID'].'</td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "9th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">Person ID</th>
            <th scope = "col">Person Name</th>
            <th scope = "col">Person Age</th>
            <th scope = "col">Person Gender</th>
            <th scope = "col">Person Address</th>
            <th scope = "col">Role Type</th>
            <th scope = "col">Case ID</th>
            <th scope = "col">Witness Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM personintherole WHERE  RoleType = 'Witness'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['PersonImage'];

                    echo '<tr>
                    <th scope = "row">'.$row['PersonID'].'</th>
                    <td>'.$row['PersonName'].'</td>
                    <td>'.$row['PersonAge'].'</td>
                    <td>'.$row['PersonGender'].'</td>
                    <td>'.$row['PersonAddress'].'</td>
                    <td>'.$row['RoleType'].'</td>
                    <td>'.$row['CaseID'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "10th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">Person ID</th>
            <th scope = "col">Person Name</th>
            <th scope = "col">Person Age</th>
            <th scope = "col">Person Gender</th>
            <th scope = "col">Person Address</th>
            <th scope = "col">Role Type</th>
            <th scope = "col">Case ID</th>
            <th scope = "col">Suspect Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM personintherole WHERE  RoleType = 'Suspect'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['PersonImage'];

                    echo '<tr>
                    <th scope = "row">'.$row['PersonID'].'</th>
                    <td>'.$row['PersonName'].'</td>
                    <td>'.$row['PersonAge'].'</td>
                    <td>'.$row['PersonGender'].'</td>
                    <td>'.$row['PersonAddress'].'</td>
                    <td>'.$row['RoleType'].'</td>
                    <td>'.$row['CaseID'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
            //==================================================================10 queries ended
        }elseif($searchFilter == "11th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">Person ID</th>
            <th scope = "col">Person Name</th>
            <th scope = "col">Person Age</th>
            <th scope = "col">Person Gender</th>
            <th scope = "col">Person Address</th>
            <th scope = "col">Role Type</th>
            <th scope = "col">Case ID</th>
            <th scope = "col">Victim Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM personintherole WHERE  RoleType = 'Victim'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['PersonImage'];

                    echo '<tr>
                    <th scope = "row">'.$row['PersonID'].'</th>
                    <td>'.$row['PersonName'].'</td>
                    <td>'.$row['PersonAge'].'</td>
                    <td>'.$row['PersonGender'].'</td>
                    <td>'.$row['PersonAddress'].'</td>
                    <td>'.$row['RoleType'].'</td>
                    <td>'.$row['CaseID'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "12th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Gender = 'Male'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "13th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Gender = 'Female'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "14th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE OfficerID < 100";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "15th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE OfficerID > 100";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
//====================================================================================================end of 15 queries
        }elseif($searchFilter == "16th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">CaseID</th>
            <th scope = "col">Case Name</th>
            <th scope = "col">Case Type</th>
            <th scope = "col">Description</th>
            <th scope = "col">Case Degree</th>
            <th scope = "col">Case Status</th>
            <th scope = "col">Law</th>
            <th scope = "col">Person ID</th>
            <th scope = "col">Officer ID</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM casetable WHERE CaseStatus = 'Closed'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <th scope = "row">'.$row['CaseID'].'</th>
                    <td>'.$row['CaseName'].'</td>
                    <td>'.$row['CaseType'].'</td>
                    <td>'.$row['CaseDesc'].'</td>
                    <td>'.$row['CaseDegree'].'</td>
                    <td>'.$row['CaseStatus'].'</td>
                    <td>'.$row['ApplicableLaw'].'</td>
                    <td>'.$row['PersonID'].'</td>
                    <td>'.$row['OfficerID'].'</td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "17th Query"){
            ?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            <th scope = "col">Service</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Age > 30 AND Age < 40";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td>Near Retirement</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "18th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Age <= 25 AND Gender = 'Male'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "19th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Age <= 25 AND Gender = 'Female'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "20th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Age > 25 AND Gender = 'Male'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
//============================================================================================================end of 20th query
        }elseif($searchFilter == "21st Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Age > 25 AND Gender = 'Female'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "22nd Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Rank LIKE '%General%'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "23rd Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Rank LIKE '%Captain%'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "24th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Rank LIKE '%Colonel%'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }elseif($searchFilter == "25th Query"){
?>
            <table class ="table">
            <thead>
            <tr>
            <th scope = "col">OfficerID</th>
            <th scope = "col">Name</th>
            <th scope = "col">Gender</th>
            <th scope = "col">Age</th>
            <th scope = "col">Duty</th>
            <th scope = "col">Rank</th>
            <th scope = "col">Position</th>
            <th scope = "col">Image</th>
            </tr>
            </thead>
            <tbody>
<?php
                $sql = "SELECT * FROM officerinformation WHERE Rank LIKE '%Sergeant%'";

                if($result = mysqli_query($Conn, $sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $Image = $row['Image'];
                    echo '<tr>
                    <th scope = "row">'.$row['OfficerID'].'</th>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Gender'].'</td>
                    <td>'.$row['Age'].'</td>
                    <td>'.$row['Duty'].'</td>
                    <td>'.$row['Rank'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                    </tr>';
                    }
                }
?>
            </tbody>
            </table>
<?php
        }
    }
?>
</body>
</html>