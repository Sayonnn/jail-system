<?php include 'Connection/Opencon.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.officer-dashboard.com</title>
    <link rel="stylesheet" href="Style/Dashboard.css" type ="text/css">
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

<?php
    session_start();
    $checker = $_SESSION['checker'];
    $OfficerID =  $_SESSION['OfficerID'] ;
    $officer = "officer";
    $admin = "admin";
?>
    <!-- this part is for styling the dashboard when the checker = officer -->

<?php
session_start();
    if ($officer == $checker) { 
        if(isset($_POST['Logout'])){
            header("Location: Main.php");
        }
        if(isset($_POST['msgBack'])){
            header("Location: Dashboard.php");
        }
        if(isset($_POST['msgsubmit'])){
            $msgTitle =$_POST['msgTitle'];
            $msg = $_POST['msgArea'];
            $query1 = "SELECT * FROM officerinformation WHERE OfficerID = '$OfficerID'";
            $result1 = mysqli_query($Conn,$query1);
            $fetch1 = mysqli_fetch_assoc($result1);
            $OfficerName = $fetch1['Name'];
            $OfficerRank = $fetch1['Rank'];
            
            $query = "INSERT INTO messages(Title,Message,OfficerID,Name,Rank) VALUES('$msgTitle','$msg','$OfficerID','$OfficerName','$OfficerRank')";
            if($result = mysqli_query($Conn,$query)){
                echo ("<Script>alert('Message Sent Successfully!')</Script>");
                echo "<meta http-equiv='refresh' content='0'>";
            }else{
                echo ("<Script>alert('Sending message failed! please try again later')</Script>");
            }
        }
?>
    <style type="text/css">
        :root{
            --black:black ;
            --white:white; 
            --blue:#0ef;
            --gray:gray;
        }
        .sidebarImg{
            content:url("img/bluelogo.png");
        }
        #sidebarName{
            color:var(--blue);
        }
        #addOfficer,#addAccount{
            display:none;
        }
        .sidebarMenuContainer i{
            color:var(--blue);
        }
        /* .sidebarInfoContainer .officerImg{
            content:url("img/");
        } */
        .sidebarMenuContainer{
            margin-bottom:10rem;
        }
        .viewRank:hover{
            color:var(--blue);
            border:2px solid var(--blue);
            transform:scale(1.1);
        }
        .sidebarMenuContainer i:hover a{
            color:var(--blue);
        }
        .sidebarMenuContainer i:hover{
            color:var(--blue);
        }
        .sidebarLogout .Logout:hover{
            transform:scale(1.1);
            border:2px solid var(--blue);
            color:var(--blue);
        }
        .UpgradeContainer .Upgrade{
            background-color:var(--blue);
            border:2px solid var(--blue);
        }
        .UpgradeContainer .Upgrade:hover{
            box-shadow: 0 0 .5rem var(--blue);
        }
        .UpgradeContainer .Notification i:hover
        ,.UpgradeContainer .Notification:hover i {
            color:var(--blue);
        }
        .UpgradeContainer .Notification:hover {
            color:var(--blue);
        }
        .topbarTitle h2{
            color:var(--blue);
            font-size:25px;
        }
        .sidebarInfoContainer img{
            box-shadow: 0 0 1rem var(--black);
        }
        #showInserts{
            display:none;
        }
        #opbtnContainer{
            display:none;
            visibility: hidden;
        }
        #viewOfficers,#viewPersons,#viewCases,#viewAccounts{
            display:none;
        }
        #Dashboard,#Case,#Message,#Request,#Settings{
            display:block;
        }
        /* #OfficerCaseHandles{
            display:block;
        }  */
        #OfficerCaseHandles::-webkit-scrollbar {
            width:12px;
            scroll-behavior: smooth;
        }
#Notification{
    display:none;
}
        
        </style>
<?php
 } ?>

    <!-- this part is for the retrieving and fetching of data from the officerinformation to display it in the dashboard -->

    <?php
    if ($officer == $checker) {
        $sql = "SELECT * FROM officerinformation WHERE OfficerID = '$OfficerID'";
        $result = mysqli_query($Conn, $sql);

        if($fetch = mysqli_fetch_assoc($result)){
            if ($checker == $officer) {
                $OfficerName = $fetch['Name'];
                $OfficerDuty = $fetch['Duty'];
                $OfficerPosition = $fetch['Position'];
                $OfficerRank = $fetch['Rank'];
                $OfficerImage = $fetch['Image'];
              //echo ("<Script>alert('$OfficerImage')</Script>");
                
            }
        }
    }

    ?>

    <!-- this one is for logging out process -->

<?php
    if(isset($_POST['Logout'])){
        header("Location: Main.php");
        mysqli_close($Conn);
    }
?>
    <!-- 
            here starts the code for the dashboard structure
     -->
    <section class="sidebarContainer" id="sidebarContainer">
        <div class="sidebarlogoContainer">
            <img src="img/goldlogo.png" alt="" class="sidebarImg" id="sidebarImg">
            <h2 class="sidebarName" id="sidebarName">POLICE</h2>
        </div>
        <div class="sidebarInfoContainer">  
            <!-- this part is for officer or admin profile picture-->
            <?php 
            if($officer == $checker) 
            { 
                echo  "<img src=img/".$OfficerImage.' alt = "Officer Profile Picture" class="officerImg">';
            }
            else
            {
                $OfficerImage = "laudzion.jpg";
                echo  "<img src=img/".$OfficerImage.' alt = "Administrator Profile Picture" class="officerImg">';
            } 
            ?>
            <!-- this part is for the name and rank of the admin or officer -->
            <h3 class="officerName"><?php if($officer == $checker) { echo "$OfficerName";}else{echo "Laud Zion Cascalla";} ?></h3>
            <h6 class="officerName"><?php if($officer == $checker) { echo "$OfficerRank";}else{echo "Bachelor of Science in Information Technology";}  ?></h3>
            <button class="viewRank" id="viewRank"><a href="Dashboard.php" style = "color:gray;padding:.2rem;text-decoration:none;font-size:12px;">Home</a> </button>
        </div>
        <div class="sidebarMenuContainer">
            <!-- officer sidebar menus -->
            <i class="fa-solid fa-gauge" id ="Dashboard"><a class="Dashboard">Dashboard</a></i>
            <i class="fa-solid fa-message" id ="Message"><a class="Message">Message</a></i>
            <!-- <i class="fa-solid fa-pen-to-square" id ="Request"><a class="Request">Request</a></i> -->
            <i class="fa-solid fa-gears" id ="Settings"><a class="Settings">Settings</a></i>
            <!-- admin sidebar menus ================================================================-->
            <i class="fa-solid fa-gauge" id ="viewOfficers"><a class="Officer-logo">Officers</a></i>
            <i class="fa-solid fa-calendar-days" id ="viewCases"><a class="Schedule">Cases</a></i>
            <i class="fa-solid fa-chart-line" id ="viewPersons"><a class= "Cases">Persons</a></i>
            <i class="fa-solid fa-gears" id ="viewAccounts"><a class = "Settings">Accounts</a></i>
            <button id = "showInserts">View More</button>
            <i class="fa-solid fa-user-plus" id = "addCases"><a>Add Cases</a></i>
            <i class="fa-solid fa-user-plus" id = "addPersons"><a>Add Persons Involve</a></i>
            <i class="fa-solid fa-user-plus" id = "addOfficer"><a>Register Officer</a></i>
            <i class="fa-solid fa-user-plus" id = "addAccount" onclick="showCreate()"><a>Create Officer Account</a></i>
        </div>
        <div class="sidebarLogout">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
                <button class="Logout" name = "Logout">Logout</button>
            </form>
        </div>
    </section>
    <!-- 
        Jqueries
     -->
    <script src = "Script/Script.js"></script>
    <script>
        //function for showing the officer cases
        $(document).ready(function(){
            $("#Dashboard").click(function(){
                $("#OfficerCaseHandles").slideDown("slow");
                document.getElementById("officerMessagingContainer").style.display = "none";
            });
        });

        //for messaging

        $(document).ready(function(){
            $("#Message").click(function(){
                 document.getElementById("officerMessagingContainer").style.display = "flex";
                 $("#OfficerCaseHandles").fadeOut("fast");
              // $("#officerMessagingContainer").style.display = "flex";
            });
        });

        //for notification toggle

        $(document).ready(function(){
            $("#Notification").click(function(){
                 $("#NotificationContainer").slideToggle("slow");
            });
        });
        //function for showing and hiding the sidebar view more panel

         $(document).ready(function(){
        $("#showInserts").click(function(){
        let flag = true;
        if(flag){
            $("#addCases").fadeToggle("fast");
            $("#addPersons").fadeToggle("fast");
            $("#addOfficer").fadeToggle("fast");
            $("#addAccount").fadeToggle("fast");
            flag = false;
        }
        });
    });
    </script>

    <!-- this part begin the top bar structure -->

    <nav class="topbarContainer">
        <div class="topbarTitle">
            <h2>Dashboard</h2>
        </div>
        <div style = "margin:1rem;">
        <form class="UpgradeContainer" id = "UpgradeContainer" method = "POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <button class="Upgrade" ><a href="Search.php" style = "color:gray;text-decoration:none;">Search</a></button>
            <a class="Notification" id ="Notification"><i class="fa-solid fa-bell"></i></a>
        </form>
    </nav>

    <!-- this is for the officer information registration structure -->

    <section class="createContainer" id = "createContainer">
        <form autocomplete = "off" class="Add-Officer-Container" action="/OfficerInfoProcess.php" method="POST"  enctype="multipart/form-data">
            <div class="Officer-Info-Container" id = "Officer-Info-Container">
                <img src="img/goldlogo.png" alt="">
                <h2>Officer Information Registration Panel</h2>
                <div class="inputContainer">
                    <label for="Officer_ID">Badge ID: </label>
                    <input type="text" name="Officer_ID" class="" placeholder="Badge Number " autocomplete="off">
                </div>
                <div class="inputContainer">
                    <label for="Officer_Name">Name: </label>
                    <input type="text" name="Officer_Name" class="" placeholder="Name" autocomplete="off">
                </div>
                <div class="inputContainer">
                    <label for="Officer_Gender">Gender: </label>
                    <input type="text" name="Officer_Gender" class="" placeholder="Gender"  autocomplete="off">
                </div>
                <div class="inputContainer">
                    <label for="Officer_Age">Age: </label>
                    <input type="number" name="Officer_Age" class="" placeholder="Age" autocomplete="off">
                </div>
                <div class="inputContainer">
                    <label for="Officer_Duty">Duty: </label>
                    <input type="text" name="Officer_Duty" class="" placeholder="Duty" autocomplete="off">
                </div>
                <div class="inputContainer">
                    <label for="Officer_Rank">Rank: </label>
                    <input type="text" name="Officer_Rank" class="" placeholder="Rank" autocomplete="off">
                </div>
                <div class="inputContainer">
                    <label for="Officer_Position">Position: </label>
                    <input type="text" name="Officer_Position" class="" placeholder="Position" autocomplete="off">
                </div>
                <div class="inputContainer">
                    <label for="Officer_Image">Image: </label>
                    <input type="file" name="Officer_Image"  accept="image/*" class="Officer_Image"  value="" > 
                </div>
                <div class="btnContainer">
                    <button class="btnReset" name = "Reset" id = "Reset" >Reset</button>
                    <button class="btnRegister" name = "Register">Register</button>
                </div>
            </div>
        </form>

        <form  autocomplete = "off" action="/OfficerAccProcess.php" method="POST">
            <!-- this part is for the officer account creating -->
            <div class="Officer-Acc-Container" id="Officer-Acc-Container">
                <img src="img/goldlogo.png" alt="">
                <h2>Officer Account Creation Panel</h2>
                <input type="text" name="Badge_ID" class="" placeholder="Badge ID" autocomplete="off">
                <input type="text" name="Officer-Username" id="" class="Officer-Username" placeholder = "Username" autocomplete="off">
                <input type="password" name="Officer-password" id="" placeholder = "Officer Password" class="password">
                <button class="btnCreate" name = "btnCreate">Create Account</button>
                <div class="note" id ="note">
                    <h6>Note: in creating an account for officer, you need to specify the officer <em>BADGE ID</em> for the system to specifically make it for a certain officer.<br><br>
                    Ex: Officer Cascalla's <em>BADGE ID NUMBER</em> is <i>302</i> you have to input that BADGE ID Above in order to create an account for officer Cascalla.</h6>
                </div>
            </div>
        </form>

        <!-- code to create the dashboard containers -->

        <article class="StatisticsContainer" id ="StatisticsContainer" >

            <!-- start of  officer information fetching -->

            <div class="StatContainer" name = "StatContainer">
                <h2>Officer Information</h2>
                <table class ="table">
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
                        <th scope = "col">Operations:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    session_start();
                    if($checker == $admin){
                        //if(isset($_POST['btnOISearch'])){
                        //$OISearch = $_POST['OISearch']; //officer information search value
                        $sql = "SELECT * FROM officerinformation";
                        if($result = mysqli_query($Conn, $sql)){
                            while($row = mysqli_fetch_assoc($result)){
                                $Officerid = $row['OfficerID'];
                                $_SESSION['OfficerID'] = $Officerid;
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
                                <td>'.$Image.'</td>
                                <td>
                                    <div class = "btnTable"style = "display:flex; flex-direction:row; justify-content:center; text-align:center; align-items:center; padding:none;">
                                        <button class = "btn btn-light btn-xs" style ="font-size:12px; padding:none;"><a href="Update.php?id='.$Officerid.'" class = "text-dark" style ="text-decoration:none;">Update</a></button>
                                        <button name = "btnDelete"class = "btn btn-danger btn-xs" style ="font-size:12px; padding:none;"><a href="deleteProcess.php?id='.$Officerid.'" class = "text-light" style ="text-decoration:none;">Delete</a></button>
                                    </div>
                                </td>
                                </tr>
                                ';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
      //  if($officer == $Checker) {
                //maybe something unique for viewing
                //maybe use for each
                //make another panel for results  
                //new stylings
          //  }
        ?>
        </article>

            <!-- start of cases information fetching -->

        <article class="StatisticsContainer1" id ="StatisticsContainer1" >

            <!-- start of cases information fetching -->

            <div class="StatContainer1" name = "StatContainer1">
                <h2>Cases Information </h2>
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
                        <th scope = "col">Person Involve:</th>
                        <th scope = "col">Badge ID:</th>
                        <th scope = "col">Operations:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if($admin == $checker){
                        $sql = "SELECT * FROM casetable";
                        if($result = mysqli_query($Conn, $sql)){
                            while($row = mysqli_fetch_assoc($result)){
                                $CaseID = $row['CaseID'];
                                $Name = $row['CaseName'];
                                $Type = $row['CaseType'];
                                $Description = $row['CaseDesc'];
                                $Degree = $row['CaseDegree'];
                                $Status = $row['CaseStatus'];
                                $ApplicableLaw = $row['ApplicableLaw'];
                                $PersonID = $row['PersonID'];
                                $BadgeID = $row['OfficerID'];
                                echo '<tr>
                                <th scope = "row">'.$CaseID.'</th>
                                <td>'.$Name.'</td>
                                <td>'.$Type.'</td>
                                <td>'.$Description.'</td>
                                <td>'.$Degree.'</td>
                                <td>'.$Status.'</td>
                                <td>'.$ApplicableLaw.'</td>
                                <td>'.$PersonID.'</td>
                                <td>'.$BadgeID.'</td>
                                <td>
                                    <div class = "btnTable"style = "display:flex; flex-direction:row; justify-content:center; text-align:center; align-items:center; padding:none;">
                                    <button class = "btn btn-warning btn-xs" style ="font-size:12px; padding:none;"><a href="Update.php?CaseID='.$CaseID.'" class = "text-dark" style ="text-decoration:none;">Update</a></button>
                                    <button name = "btnDelete"class = "btn btn-danger btn-xs" style ="font-size:12px; padding:none;"><a href="deleteProcess.php?CaseID='.$CaseID.'" class = "text-light" style ="text-decoration:none;">Delete</a></button>
                                    </div>
                                </td>
                                </tr>
                                ';
                            }
                        }
                    }elseif($officer == $Checker) {
                        //maybe something unique for viewing
                       //maybe use for each
                       //make another panel for results
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </article>

        <!-- this part is for the persons involve data fetching -->

        <article class="StatisticsContainer2" id ="StatisticsContainer2" >

            <!-- start of person involve information fetching -->

            <div class="StatContainer2" name = "StatContainer2">
                <h2>Person Involve</h2>
                <table class ="table">
                    <thead>
                    <tr>
                        <th scope = "col">Person ID:</th>
                        <th scope = "col">Person Name:</th>
                        <th scope = "col">Person Age:</th>
                        <th scope = "col">Person Gender:</th>
                        <th scope = "col">Person Address:</th>
                        <th scope = "col">Role Type:</th>
                        <th scope = "col">Image:</th>
                        <th scope = "col">Case ID:</th>
                        <th scope = "col">Operations:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if($admin == $checker){
                        $sql = "SELECT * FROM personintherole";
                        if($result = mysqli_query($Conn, $sql)){
                            while($row = mysqli_fetch_assoc($result)){
                                $PersonID = $row['PersonID'];
                                $PersonName = $row['PersonName'];
                                $PersonAge = $row['PersonAge'];
                                $PersonGender = $row['PersonGender'];
                                $PersonAddress = $row['PersonAddress'];
                                $RoleType= $row['RoleType'];
                                $CaseID = $row['CaseID'];
                                $PersonImage = $row['PersonImage'];
                               //
                                echo '<tr>
                                <th scope = "row">'.$PersonID.'</th>
                                <td>'.$PersonName.'</td>
                                <td>'.$PersonAge.'</td>
                                <td>'.$PersonGender.'</td>
                                <td>'.$PersonAddress.'</td>
                                <td>'.$RoleType.'</td>
                                <td>'.$PersonImage.'</td>
                                <td>'.$CaseID.'</td>
                                <td>
                                    <div class = "btnTable"style = "display:flex; flex-direction:row; justify-content:center; text-align:center; align-items:center; padding:none;">
                                        <button class = "btn btn-info btn-xs" style ="font-size:12px; padding:none;"><a href="Update.php?PersonID='.$PersonID.'" class = "text-dark" style ="text-decoration:none;">Update</a></button>
                                        <button name = "btnDelete"class = "btn btn-danger btn-xs" style ="font-size:12px; padding:none;"><a href="deleteProcess.php?PersonID='.$PersonID.'" class = "text-light" style ="text-decoration:none;">Delete</a></button>
                                    </div>
                                </td>
                                </tr>
                                ';
                            }
                        }
                    }elseif($officer == $Checker) {
                        //maybe something unique for viewing
                       //maybe use for each
                       //make another panel for results
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </article>

        <!-- this is for fetching datas from officer accounts -->

        <article class="StatisticsContainer3" id ="StatisticsContainer3" >

        <!-- this is for fetching datas from officer accounts -->

            <div class="StatContainer3" name = "StatContainer3">
                <h2>Officer Accounts</h2>
                <table class ="table">
                    <thead>
                    <tr>
                        <th scope = "col">AccountID:</th>
                        <th scope = "col">Username:</th>
                        <th scope = "col">Password:</th>
                        <th scope = "col">Date Created:</th>
                        <th scope = "col">Badge ID:</th>
                        <th scope = "col">Operations:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if($admin == $checker){
                        $sql = "SELECT * FROM officeraccount";
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
                                <td>
                                    <div class = "btnTable"style = "display:flex; flex-direction:row; justify-content:center; text-align:center; align-items:center; padding:none;">
                                        <button class = "btn btn-success btn-xs" style ="font-size:12px; padding:none;"><a href="Update.php?AccountID='.$AccountID.'" class = "text-dark" style ="text-decoration:none;">Update</a></button>
                                        <button name = "btnDelete"class = "btn btn-danger btn-xs" style ="font-size:12px; padding:none;"><a href="deleteProcess.php?AccountID='.$AccountID.'" class = "text-light" style ="text-decoration:none;">Delete</a></button>
                                    </div>
                                </td>
                                </tr>
                                ';
                            }
                        }
                    }elseif($officer == $Checker) {
                       //maybe something unique for viewing
                       //maybe use for each
                       //make another panel for results
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </article>

        <!-- this is for the officer handles cases fetching base on id ==================================================================-->
        <article class="OfficerCaseHandles" id="OfficerCaseHandles">
            <?php
                session_start();
                $OfficerID =  $_SESSION['OfficerID'] ;
                //echo $OfficerID;
                if($officer == $checker) {
                    $sql = "SELECT * FROM casetable WHERE OfficerID = '$OfficerID'";
                    $result = mysqli_query($Conn,$sql);
                    if($fetch = mysqli_fetch_assoc($result)){
                        //$CID = $fetch['CaseID'];
                        //$CName = $fetch['CaseName'];
                        //$CType = $fetch['CaseType'];
                        //$CDesc = $fetch['CaseDesc'];
                        //$CDegree = $fetch['CaseDegree'];
                        //$CStatus = $fetch['CaseStatus'];
                        //$CApplicableLaw = $fetch['ApplicableLaw'];
                        //$CPersonID = $fetch['PersonID'];
                        //$COfficerID = $fetch['OfficerID'];
                    }else{
                        echo ("<Script>alert('Officer $OfficerID has no handle cases currently...')</Script>");
                    }
        foreach ($result as $row): 
            $CID = $row['CaseID'];
            $CName = $row['CaseName'];
            $CType = $row['CaseType'];
            $CDesc = $row['CaseDesc'];
            $CDegree = $row['CaseDegree'];
            $CStatus = $row['CaseStatus'];
            $CApplicableLaw = $row['ApplicableLaw'];
            $CPersonID = $row['PersonID'];
            $COfficerID = $row['OfficerID'];
        ?>
                 <div id="CaseHandlesContainer">
                    <div id = "First">
                        <img src="img/bluelogo.png" alt="" >
                        <h6 class ="Title"><?php echo $CName?></h6>
                    </div>
                    <div id = "First" >
                        <h6 class ="Title"><?php echo $CType?></h6>
                        <h6 class = "Description"><?php echo $CDesc?>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, delectus cum? Cum, beatae commodi voluptatibus aliquam adipisci aliquid autem optio.</h6>
                    </div>
                    <div id ="First" >
                        <h6 style = "padding:.5rem;">Applicable Laws:</h6>
                        <h6 style = "font-size:10px;"><?php echo $CApplicableLaw?></h6>
                    </div>
                    <div id = "Firsts" >
                        <div id = "Last">
                            <h6><?php echo $CStatus?></h6>
                            <h6 style = "font-weight:400;font-size:10px;">Degree: <?php echo $CDegree?></h6>
                        </div>
                        <div id = "Last">
                            <h6>Case ID: <?php echo $CID?></h6>
                        </div>
                    </div>
                 </div>
        <?php 
        endforeach;    }
        ?>
        </article>

        <!-- for messaging -->

        <article id="officerMessagingContainer">
            <form id="officerMessaging" method = "POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="text" name="msgTitle" id="msgTitle" autocomplete="off">
                <div class="msgAreaContainer">
                    <textarea name="msgArea" id="msgArea" cols="50" rows="10"></textarea>
                </div>
                <div class="sendContainer">
                    <button type = "submit" name = "msgsubmit">Send</button>
                    <button type="msgBack">Back</button>
                </div>
            </form>
        </article>
        <!-- ======================================================================================================================= -->
        <!-- code to add person involve in the database -->

        <form class="Add-Person-Involve" id="Add-Person-Involve" action="/PersonInvolveProcess.php" method="POST" enctype="multipart/form-data">
            <div class="Person-Involve-Container" id = "Person-Involve-Container">
                <img src="img/goldlogo.png" alt="">
                <h2>Person Involve Insertion Panel</h2>
                <div class="Person-Container">
                    <label for="Person-Name">Person Name: </label>
                    <input type="text" name="Person-Name" class="" placeholder="Person Name" autocomplete="off">
                </div>
                <div class="Person-Container">
                    <label for="Person-Age">Person Age: </label>
                    <input type="number" name="Person-Age" class="" placeholder="Person Age" autocomplete="off">
                </div>
                <div class="Person-Container">
                    <label for="Person-Gender">Person Gender: </label>
                    <input type="text" name="Person-Gender" class="" placeholder="Person Gender"  autocomplete="off">
                </div>
                <div class="Person-Container">
                    <label for="Person-Address">Person Address: </label>
                    <input type="text" name="Person-Address" class="" placeholder="Person Address" autocomplete="off">
                </div>
                <div class="Person-Container">
                    <label for="Role-Type">Role Type: </label>
                    <input type="text" name="Role-Type" class="" placeholder="Role Type" autocomplete="off">
                </div>
                <div class="Person-Container">
                    <label for="Case-ID">Case ID: </label>
                    <input type="text" name="Case-ID" class="" placeholder="Case ID" autocomplete="off">
                </div>
                <div class="Person-Container">
                    <label for="Person-Image">Person Image:</label>
                    <input type="file" name="Person-Image"  accept="image/*" class="Person-Image"  value="" > 
                </div>
                <div class="btnContainer">
                    <input type = "button" value ="Hide"class="btnHide" name = "Hide" id = "Hide" onclick = "hide()">
                    <button class="SubmitPerson" name = "SubmitPerson">Submit</button>
                </div>
            </div>
        </form>

        <!-- this is for the case container structure -->

        <section class="CaseContainer" id="CaseContainer">
            <form action="/CaseProcess.php" method = "POST" id = "addcaseContainer">
                <div class="addCase" id="addCase">
                    <img src="img/goldlogo.png" alt="">
                    <h2>Cases Insertion Panel</h2>
                    <div class="Cases">
                        <label for="Case-Name">Case Name: </label>
                        <input type="text" name="Case-Name" class="Case-Name" placeholder="Case Name" autocomplete="off">
                    </div>
                    <div class="Cases">
                        <label for="Case-Type">Case Type: </label>
                        <input type="text" name="Case-Type" class="Case-Type" placeholder="Case Type" autocomplete="off">
                    </div>
                    <div class="Cases">
                        <label for="Case-Desc">Case Description: </label>
                        <input type="text" name="Case-Desc" class="Case-Desc" placeholder="Case Description" autocomplete="off">
                    </div>
                    <div class="Cases">
                        <label for="Case-Degree">Case Degree: </label>
                        <input type="text" name="Case-Degree" class="Case-Degree" placeholder="Case Degree" autocomplete="off">
                    </div>
                    <div class="Cases">
                        <label for="Case-Status">Case Status: </label>
                        <input type="text" name="Case-Status" class="Case-Status" placeholder="Case Status" autocomplete="off">
                    </div>
                    <div class="Cases">
                        <label for="Applicable-Law">Applicable Law: </label>
                        <input type="text" name="Applicable-Law" class="Applicable-Law" placeholder="Applicable Law" autocomplete="off">
                    </div>
                    <div class="Cases">
                        <label for="Person-Involve">Person Involve: </label>
                        <input type="text" name="Person-Involve" class="Person-Involve" placeholder="Person in the role ID" autocomplete="off">
                    </div>
                    <div class="Cases">
                        <label for="Officer-ID">Officer ID: </label>
                        <input type="text" name="Officer-ID" class="Officer-ID" placeholder="Officer Badge ID" autocomplete="off">
                    </div>
                    <!-- <div class="inputContainer">
                        <label for="Officer_Image">Image: </label>
                        <input type="file" name="Officer_Image"  accept="image/*" class="Officer_Image"  value="" > 
                    </div> -->
                    <div class="btnContainer">
                        <input type="button" value="Add Proof" id = "AddProof">
                        <button id = "btnAddCase"class="btnAddCase" name = "btnAddCase">Submit</button>
                    </div>
                </div>  

                <!-- this code is for additional prrof documents for the case -->

                <div id="addCaseProof">
                    <div class="addProof" id="addProof">
                        <img src="img/goldlogo.png" alt="">
                        <h2>Additional Proof</h2>
                        <div class="Proof">
                            <label for="Investigation">Investigation: </label>
                            <input type="text" name="Investigation" class="Investigation" placeholder="Investigation" autocomplete="off">
                        </div>
                        <div class="Proof">
                            <label for="Proof_Image">Proof Image: </label>
                            <input type="file" name="Proof_Image"  accept="image/*" class="Proof_Image"  value="" > 
                        </div>
                        <div class="Proof">
                            <label for="Legal_Docs">Legal Documents: </label>
                            <input type="file" name="Legal_Docs"  accept="image/*" class="Legal_Docs"  value="" > 
                        </div>
                        <div class="Proof">
                            <label for="CaseID">Case ID: </label>
                            <input type="text" name="CaseID" class="CaseID" placeholder="Case ID" autocomplete="off">
                        </div>
                        <div class="btnContainer">
                            <input type="button" value="Hide" id = "HideProof">
                            <button class="btnsubmitProof" name = "btnsubmitProof">Submit</button>
                        </div>
                    </div> 
                </div>             
            </form>
        </section>

    </section>

     <!-- admin notification -->
     <section id = "NotificationContainer">
            <div class="SearchContainer">
                <button name = "searchNotif"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="search" name="searchNotif" id="searchNotif">
            </div>
            <?php
                $sql2 = "SELECT * FROM messages";
                $result2 = mysqli_query($Conn,$sql2);
            ?>
            <?php foreach($result2 as $row):
                $MID = $row['MessageID'];
                $Title = $row['Title'];
                $Message = $row['Message'];
                $OID = $row['OfficerID'];
                $OName = $row['Name'];
                $ORank = $row['Rank'];
        
                echo '
                <section id = "NotifContain">
                <div class = "Identity" style ="border-radius:25px;background-image:radial-gradient(circle,yellow,orange,rgba(0,0,0,.1));padding:.5rem;">
                    <h6 style = "color:black;font-size:8px;">'.$OID.'</h6>
                    <h6 style = "color:black;font-size:10px;">'.$OName.'</h6>
                    <h6 style = "color:black;font-size:8px;">'.$ORank.'</h6>
                </div>
                <div class = "Identity">
                    <h6 style = "font-size:10px;font-weight:600;">'.$Title.'</h6>
                    <h6 style ="font-weight:400;font-size:10px">'.$Message.'</h6>
                </div>
                <div class = "buttons">
                    <button name = "" class = "btnDone"><a href="deleteProcess.php?MID='.$MID.'"  style ="text-decoration:none;">Done</a></button>
                </div>
                </section>
                ';
             endforeach;?>
        </section>
</body>
</html>