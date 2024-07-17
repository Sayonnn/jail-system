<?php include 'Connection/Opencon.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.Criminal-Records.com</title>
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
        
        //Creating variables to store datas 

        $Email = $Code = $Pin = $Secret = '';
        $EmailErr = $CodeErr = $PinErr = $SecretErr = $PrimaryErr = '';
        $EmailErr = "Email does not match the User Email for Authentication!";
        $CodeErr = "Code does not match the User Code for Authentication!";
        $PinErr = "Secret Pin does not match the User Secret Pin for Authentication!";
        $SecretErr = "Secret Password does not match the User Secret Password for Authentication!";
        $PrimaryErr = "Authentication Error: User Account did not provide any Secret Authenticator!";

        //assingning input value into php variables to access all over the page

        $ID = $_SESSION['AdminID'];
        $Email = $_POST['Email'];
        $Code = $_POST['Code'];
        $Pin = $_POST['Pin'];
        $Secret = $_POST['Secret'];

        //Code when Athorize button is clicked

        if(isset($_POST['Authorize'])){

           // echo ("<Script>alert('$ID')</Script>");
           // checking the database for the values associated with the UserID from Login page

           $sql = "SELECT * FROM authorizeadmin WHERE AdminID = '$ID'";
           $result = mysqli_query($Conn, $sql);

            if(!empty($Email) || !empty($Code) || !empty($Pin) || !empty($Secret) ){
                if ($row = mysqli_fetch_array($result)) {
                    
                    //conditions to follow whenever the inputs are not accurate

                    if($Email != $row['Email']){
                        echo ("<Script>alert('$EmailErr')</Script>");
                    }elseif ($Code != $row['Code']) {
                        echo ("<Script>alert('$CodeErr')</Script>");
                    }elseif ($Pin != $row['SecretPin']) {
                        echo ("<Script>alert('$PinErr')</Script>");
                    }elseif ($Secret != $row['SecretPassword']){
                        echo ("<Script>alert('$SecretErr')</Script>");
                    }elseif($ID != $row['AdminID']){
                        echo ("<Script>alert('$PrimaryErr')</Script>");
                    }else{
                        header("Location: Dashboard.php");
                    }
                 // echo ("<Script>alert('$ID')</Script>");
                }else{
                    echo ("<Script>alert('$PrimaryErr')</Script>");
                }
            }else{
                echo ("<Script>alert('All Fields are Required!')</Script>");
            }
        }
    ?>
    
    <?php
        //process back button whenever clicked go back to the login page
        if(isset($_POST['Back'])){header("Location: Login.php");}
    ?>

    <div class = "Container">
    <section class = "Log-Container">
    <center><h2 id="Name" class="Name">Advanced Database Management System</h2></center>
        <img src="img/goldlogo.png"  alt="" id="Alogo" class="Alogo">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" id = "Registration">
            <input type="text" name="Email" autocomplete="off" id="Email" placeholder="Enter Email">
            <input type="text" name="Code" autocomplete="off" id="Code" placeholder="Enter Code">
            <input type="password" name="Pin" autocomplete="off" id="Pin" placeholder="Enter Secret Pin">
            <input type="password" name="Secret" autocomplete="off" id="Secret" placeholder="Enter Secret Password">
            <div id="btnContainer">
                <button type = "submit" onclick="" name = "Back">Back</button>
                <button type = "submit" onclick="" name = "Authorize">Authorize</button>
            </div>
        </form>
        
    </section>
    </div>
</body>
</html>


