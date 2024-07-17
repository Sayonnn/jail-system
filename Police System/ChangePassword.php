<?php include 'Connection/Opencon.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.adminpasswordrecovery.com</title>
    <link rel="stylesheet" href="Style/Forgot.css" type ="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>
<body class = "body">
    <?php
        session_start();
        $AdminID = $_SESSION['AdminID'];
        $Password = $_POST['Password'];
        $ConfirmPassword = $_POST['ConfirmPassword'];
        $Username = $_SESSION['Username'];


        if(isset($_POST['Submit'])){
            $ENpassword = password_hash($Password,PASSWORD_DEFAULT);
            $ENusername = password_hash('Laud Zion',PASSWORD_DEFAULT);

            $sql = "UPDATE adminaccount SET  Username = '$ENusername', Password = '$ENpassword' WHERE AdminID = '$AdminID'";
            if($result = mysqli_query($Conn,$sql)){
                if($Password != $ConfirmPassword){
                    echo ("<Script>alert('Password does not match!')</Script>");
                }elseif(empty($Password) || empty($ConfirmPassword)){
                    echo ("<Script>alert('Enter new Password!')</Script>");
                }else{
                    echo ("<Script>alert('SUCCESS: admin $Username account password updated!')</Script>");
                }
            }
        }

        if(isset($_POST['Back'])){
            header("Location: ForgotPassword.php");
        }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" class = "FContainer">
        <section class="forgotContainer">
            <div class="Container">
                <label for="Username" style = "font-size: 18px;">Change Password</label>
                <input type="password" name="Password" id="" placeholder="New Password" autocomplete="off">
                <input type="password" name="ConfirmPassword" id="" placeholder="Confirm New Password">
                <div class="btnContainer">
                    <button class = "" name = "Back">Back</button>
                    <button class = "" name = "Submit">Submit</button>
                </div>
            </div>
        </section>
    </form>
    
</body>
</html>