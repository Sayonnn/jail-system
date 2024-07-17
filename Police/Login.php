<?php include 'Connection/Opencon.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.CriminalRecords.com</title>
    <link rel="stylesheet" href="Style/style.css" type ="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</head>
<body >
    
    <?php
    session_start();
    //process when login button clicked, check is the user is the administration
    $checker =  $_SESSION['checker'];
   // echo ("<Script>alert('$checker');</Script>");
    $officer = "officer";
    $admin = "admin";
    

    if( $officer == $checker){
        if (isset($_POST['Login'])) {
            $username = mysqli_real_escape_string($Conn, $_POST['Username']);
            $password = mysqli_real_escape_string($Conn, $_POST['Password']);
            $sqli = "SELECT * FROM officeraccount WHERE OfficerUsername = '$username'";
            $result = mysqli_query($Conn,$sqli);
            if ($row = mysqli_fetch_assoc($result)) {
                $pass = $row['OfficerPassword'];
                //echo ("<Script>alert('$pass');</Script>");
                $retrievedpassword = password_verify($password,$pass);
                //echo ("<Script>alert('$retrievedpassword');</Script>");
                if($retrievedpassword == 1 || $retrievedpassword == '1'){
                    header("Location: Dashboard.php");
                    $_SESSION['OfficerID'] = $row['OfficerID'];
                    $_SESSION['AccountID'] = $row['AccountID'];
                }else{
                    echo ("<Script>alert('Incorrect Password!');</Script>");
                }
            } else {
                $error_message = "Unauthorized access is strictly prohibited! ";
                echo ("<Script>alert('$error_message')</Script>");
                header("Refresh: 0");
            }
        } 
    }elseif($admin == $checker){
        if (isset($_POST['Login'])) {
            $username = mysqli_real_escape_string($Conn, $_POST['Username']);
            $password = mysqli_real_escape_string($Conn, $_POST['Password']);
            $sql = "SELECT * FROM adminaccount WHERE Username = '$username' AND Password = '$password'";
            $result = mysqli_query($Conn,$sql);
    
            if ($row = mysqli_fetch_array($result)) {
                header('Location: Authenticate.php');
                $_SESSION['AdminID'] = $row['AdminID'];
            } else {
                $error_message = "Unauthorized access is strictly prohibited! ";
                echo ("<Script>alert('$error_message')</Script>");
                header("Refresh: 0");
            }
        } 
    }

    if(isset($_POST['Back'])){
        header("Location: Main.php");
    }
    ?>
    <?php
        $checker =  $_SESSION['checker'];
        $officer = "officer";
        if ($officer == $checker) { 
    ?>
            <style type="text/css">
                :root{
                    --black:black ;
                    --white:white; 
                    --blue:#0ef;
                    --gray:gray;
                }
                .Log-Container {
                    box-shadow: 0 0 8rem var(--blue);
                }
                #btnContainer button{
                    border:1.5px solid var(--blue);
                    color:var(--blue);
                }
                .logo{
                    content:url("img/bluelogo.png");
                }
                .Forgot{
                    display:none;
                }
            </style>
    <?php } ?>

    <div class = "Container">
    <section class = "Log-Container">
    <center><h2 id="Name" class="Name">Advanced Database Management System</h2></center>
        <img src="img/goldlogo.png"  alt="" id="logo" class="logo">
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" id = "Registration">
            <input type="text" name="Username" autocomplete="off" id="Username">
            <input type="password" name="Password" autocomplete="off" id="Password">
            <a href="ForgotPassword.php" class = "Forgot">Forgot Password?</a>
            <div id="btnContainer">
                <button name = "Back" >Back</button>
                <button type = "submit" name = "Login" >Login</button>
            </div>
        </form>        
    </section>
    </div>
</body>
</html>

