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
        //process when login button clicked, check is the user is the administration
        $checker =  $_SESSION['checker'];
        // echo ("<Script>alert('$checker');</Script>");
        $officer = "officer";
        $admin = "admin";

        if(isset($_POST['Check'])){
            //from form input
            $Username = $_POST['Username'];
            $_SESSION['Username'] = $Username;
            $Recovery = $_POST['Recovery'];

            //1st query retrieve admin id
            $sql = "SELECT * FROM adminaccount WHERE Username = '$Username'";
            $result = mysqli_query($Conn, $sql);
            if($fetch = mysqli_fetch_assoc($result)){
              $AdminID = $fetch['AdminID'];
              $_SESSION['AdminID'] = $fetch['AdminID'];
            
              //fetch all from authorizeadmin based on the Fetched AdminID
              $sql1 = "SELECT * FROM authorizeadmin WHERE AdminID = '$AdminID'";
              $result1 = mysqli_query($Conn, $sql1);
              if($row = mysqli_fetch_assoc($result1)){
                $Email = $row['Email'];
                $Code = $row['Code'];
                $SecretPin = $row['SecretPin'];
                $SecretPassword = $row['SecretPassword'];
                if($Recovery == $Email || $Recovery == $Code || $Recovery == $SecretPin || $Recovery == $SecretPassword){
                    header("Location:ChangePassword.php");
                }elseif(empty($Recovery)){
                    echo ("<Script>alert('ERROR: Please provide any account Secret Code')</Script>");
                }else{
                    echo ("<Script>alert('ERROR: Failed')</Script>");
                }
              }else{
                echo ("<Script>alert('ERROR: Recovery Email, Code, Pin, Password for admin $Username not found!')</Script>");
              }
        }else{
            echo ("<Script>alert('ERROR: Account with username $Username not found!')</Script>");
        }
        }

        if(isset($_POST['Back'])){
            header("Location: Login.php");
        }
        ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" class = "FContainer">
        <section class="forgotContainer">
            <div class="Container">
                <img src="img/goldlogo.png" alt="">
                <label for="Username">Password Recovery</label>
                <input type="text" name="Username" id="" placeholder="Admin Username" autocomplete="off">
                <input type="password" name="Recovery" id="" placeholder="Any Recovery Code">
                <div class="btnContainer">
                    <button class = "" name = "Back">Back</button>
                    <button class = "" name = "Check">Check</button>
                </div>
            </div>
        </section>
    </form>
</body>
</html>