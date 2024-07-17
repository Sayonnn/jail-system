<?php include 'Connection/Opencon.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.mainpage.com</title>
    <link rel="stylesheet" href="Style/Main.css" type ="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="Script/Script.js"></script>
</head>
<body class = "body">
    <?php
        session_start();
        $checker = "";

        if(isset($_POST['officer'])){
            $checker = "officer";
            $_SESSION['checker'] = $checker;
            header("Location: Login.php");
        }elseif(isset($_POST['admin'])){
            $checker = "admin";
            $_SESSION['checker'] = $checker;
            header("Location: Login.php");
        }
    ?>
    <section class="cardContainer">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class = "container">
            <button class="card" name = "officer" id = "officer" onclick = "ChangeStyle()">
                <img src="img/bluelogo.png" alt="" class="officer">
                <h2 class="officer">Officer</h2>
            </button>
            <button class="card" name = "admin" id = "admin">
                <img src="img/goldlogo.png" alt="" class="admin">
                <h2 class="admin">Admin</h2>
            </button>
        </form> 
    </section>
</body>
</html>