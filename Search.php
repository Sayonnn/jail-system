<?php include 'Connection/Opencon.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.searchdashboard.com</title>
    <link rel="stylesheet" href="Style/Search.css" type ="text/css">
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
<!-- for searching  -->

<script>
        $('#btnSearch').keypress(function(event){
        event.preventDefault();
        // Code goes here
        return false;
        });
</script>
<nav id = "Navigation-Container"  >
<img src="img/goldlogo.png" style = "width:100px;height:100px;margin:1rem;position:absolute;" alt="">

        <a href="Filter.php">Next</a>
        <a href="Dashboard.php" >Previous</a>
</nav>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST" id = "Primary-Container">
    <section id="searching-topbar-container">
        <h6 style = "color:gold;font-size:15px;padding:.5rem;border:1px solid gray;width:50rem;margin:2rem;">SEARCHING PAGE</h6>
        <!-- get the value for dropbox filtering send it to searchprocess -->
        <!-- <h2 style = "font-size:15px">Search for:</h2> -->
        <select name = "searchFilter" style ="width:16rem;text-align:center;font-size:13px;" value ="none">
            <option selected disabled hidden></option>
            <option value="Officer Information">Officer Information</option>
            <option value="Officer Account">Officer Account</option>
            <option value="Person Involve">Person Involve</option>
            <option value="Cases">Cases</option>
        </select>
        <div id="searchValue-Container" >
            <input type="search" name="searchValue" id="searchValue">
            <button name = "btnSearch" id = "btnSearch">Search</button>
        </div>
        <?php
            $searchFilter = $_POST['searchFilter'];
            $searchValue = $_POST['searchValue'];
            $OI = "Officer Information";
            $OA = "Officer Account";
            $PI = "Person Involve";
            $C = "Cases";
            if(isset($_POST['btnSearch'])){
        //searching for officer information
                if($OI == $searchFilter){
        ?>
                <table class ="table" >
                <thead>
                <tr>
                <th scope = "col">Badge ID:</th>
                <th scope = "col">Name:</th>
                <th scope = "col">Gender:</th>
                <th scope = "col">Age:</th>
                <th scope = "col">Duty:</th>
                <th scope = "col">Rank:</th>
                <th scope = "col">Position:</th>
                <th scope = "col">Image:</th>
                </tr>
                </thead>
                <tbody>
        <?php
                    $sql = "SELECT * FROM officerinformation WHERE OfficerID = '$searchValue ' OR Name LIKE '%".$searchValue."%' OR Gender = '$searchValue' ";
                    if($result = mysqli_query($Conn, $sql)){
                    while($row = mysqli_fetch_assoc($result)){
                        $Officerid = $row['OfficerID'];
                        $Name = $row['Name'];
                        $Gender = $row['Gender'];
                        $Age = $row['Age'];
                        $Duty = $row['Duty'];
                        $Rank = $row['Rank'];
                        $Position = $row['Position'];
                        $Image = $row['Image'];
                        echo '<tr>
                        <th scope = "row">'.$Officerid.'</th>
                        <td>'.$Name.'</td>
                        <td>'.$Gender.'</td>
                        <td>'.$Age.'</td>
                        <td>'.$Duty.'</td>
                        <td>'.$Rank.'</td>
                        <td>'.$Position.'</td>
                        <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                        </tr>';
                        }
                    }
        ?>
                </tbody>
                </table>
        <?php
        //searching for officer accounts
                }elseif($OA == $searchFilter){
        ?>
                <table class ="table">
                <thead>
                <tr>
                <th scope = "col">AccountID:</th>
                <th scope = "col">Username:</th>
                <th scope = "col">Password:</th>
                <th scope = "col">Date Created:</th>
                <th scope = "col">Badge ID:</th>
                </tr>
                </thead>
                <tbody>
        <?php 
                $sql = "SELECT * FROM officeraccount WHERE AccountID = '$searchValue' OR OfficerID = '$searchValue' OR DateCreated LIKE '%".$searchValue."%'  ";
                if($result = mysqli_query($Conn, $sql)){
                    while($row = mysqli_fetch_assoc($result)){
                        $AccountID = $row['AccountID'];
                        $Username = $row['OfficerUsername'];
                        $Password = $row['OfficerPassword'];
                        $DateCreated = $row['DateCreated'];
                        $OfficerID = $row['OfficerID'];
                        echo '<tr>
                        <th scope = "row">'.$AccountID.'</th>
                        <td>'.$Username.'</td>
                        <td>'.$Password.'</td>
                        <td>'.$DateCreated.'</td>
                        <td>'.$OfficerID.'</td>
                        </tr>';
                    }
                }
        ?>
                </tbody>
                </table>
        <?php
        //searching for cases
                }elseif($C == $searchFilter){
        ?>
                <table class ="table">
                <thead>
                <tr>
                <th scope = "col">Case ID:</th>
                <th scope = "col">Case Name:</th>
                <th scope = "col">Case Type:</th>
                <th scope = "col">Case Desc:</th>
                <th scope = "col">Case Degree:</th>
                <th scope = "col">Case Status:</th>
                <th scope = "col">Applicable Law:</th>
                <th scope = "col">Badge ID:</th>
                </tr>
                </thead>
                <tbody>
        <?php 
                $sql = "SELECT * FROM casetable WHERE OfficerID = '$searchValue' OR CaseStatus LIKE '%".$searchValue."%' OR CaseDegree = '$searchValue' OR CaseName LIKE '%".$searchValue."%'";
                if($result = mysqli_query($Conn, $sql)){
                    while($row = mysqli_fetch_assoc($result)){
                        $CaseID = $row['CaseID'];
                        $Name = $row['CaseName'];
                        $Type = $row['CaseType'];
                        $Description = $row['CaseDesc'];
                        $Degree = $row['CaseDegree'];
                        $Status = $row['CaseStatus'];
                        $ApplicableLaw = $row['ApplicableLaw'];
                        $BadgeID = $row['OfficerID'];
                        echo '<tr>
                        <th scope = "row">'.$CaseID.'</th>
                        <td>'.$Name.'</td>
                        <td>'.$Type.'</td>
                        <td>'.$Description.'</td>
                        <td>'.$Degree.'</td>
                        <td>'.$Status.'</td>
                        <td>'.$ApplicableLaw.'</td>
                        <td>'.$BadgeID.'</td>
                        </tr>';
                    }
                }
        ?>
                </tbody>
                </table>
        <?php
        //searching for person involve
                }elseif($PI == $searchFilter){
        ?> 
                <table class ="table">
                <thead>
                <tr>
                <th scope = "col">Person ID:</th>
                <th scope = "col">Person Name:</th>
                <th scope = "col">Person Age:</th>
                <th scope = "col">Person Gender:</th>
                <th scope = "col">Person Address:</th>
                <th scope = "col">Role Type:</th>
                <th scope = "col">Case ID:</th>
                <th scope = "col">Image:</th>
                </tr>
                </thead>
                <tbody>
        <?php 
                $sql = "SELECT * FROM personintherole WHERE PersonName LIKE '%".$searchValue."%' OR PersonID = '$searchValue' OR PersonAge = '$searchValue' OR PersonGender = '$searchValue' OR RoleType LIKE '%".$searchValue."%'";
                if($result = mysqli_query($Conn, $sql)){
                    while($row = mysqli_fetch_assoc($result)){
                        $PersonID = $row['PersonID'];
                        $PersonName = $row['PersonName'];
                        $PersonAge = $row['PersonAge'];
                        $PersonGender = $row['PersonGender'];
                        $PersonAddress = $row['PersonAddress'];
                        $RoleType= $row['RoleType'];
                        $Image = $row['PersonImage'];
                        $CaseID = $row['CaseID'];
                        echo '<tr>
                        <th scope = "row">'.$PersonID.'</th>
                        <td>'.$PersonName.'</td>
                        <td>'.$PersonAge.'</td>
                        <td>'.$PersonGender.'</td>
                        <td>'.$PersonAddress.'</td>
                        <td>'.$RoleType.'</td>
                        <td>'.$CaseID.'</td>
                        <td><img src="img/'.$Image.'"style = "height:70px; width:70px; border-radius:50%;"></td>
                        </tr>';
                    }
                }
        ?>
                </tbody>
                </table>
     <?php } ?>
    <?php } ?>        
    </section>
</form>
</body>
</html>