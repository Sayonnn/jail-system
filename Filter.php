<?php include 'Connection/Opencon.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.filterdashboard.com</title>
    <link rel="stylesheet" href="Style/Filter.css" type ="text/css">
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
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3"  style = "background-color:rgb(91, 91, 91);">
                    <div class="card-header" >
                        <a href="Search.php" style = "float:left;text-decoration:none;margin:.5rem; color:gold;">Previous</a>
                        <a href="Query.php"style = "float:right;text-decoration:none;margin:.5rem; color:gold;">Next</a>
                    </div>
                </div>
            </div>

            <div class="col-md-auto mb-3">
                <form action="" method="GET">
                <div class="card shadow mt-3" style = "background-color:rgb(91, 91, 91);">
                    <div class="card-header" style = "border-bottom:1px solid white;">
                        <h5 style = "color:black;">Case Filter
                            <button type="submit" class="btn btn-warning btn-sm float-end">Search</button>
                        </h5>
                    </div>
                    <div class="" style = "display:flex;margin:.5rem;flex-direction:row;flex-wrap:wrap;background-color:rgb(91, 91, 91);" >
                        <!-- <h6>Officers</h6> -->
                        <?php
                        $Officer_query = "SELECT * FROM officerinformation";
                        $Officer_query_run = mysqli_query($Conn, $Officer_query);

                        if(mysqli_num_rows($Officer_query_run) > 0){
                            foreach($Officer_query_run as $Officers)
                            {
                                $checked = []; //store the checked value to prevent reset when reloaded page
                                if(isset($_GET['Officers'])){
                                    $checked = $_GET['Officers'];
                                }
                                ?>
                            <div style = "margin:0 1rem;background-color:rgb(91, 91, 91);" >
                                <input  type="checkbox" name="Officers[]" value = "<?= $Officers['OfficerID'];?>"
                                <?php if(in_array($Officers['OfficerID'],$checked)){echo "checked";}?>
                                />
                                <?= $Officers['Name'];?>
                            </div>
                        <?php
                            }
                        }else{
                            echo "Officer has no Handle Cases";
                        }
                        ?>
                    </div>
                </div>
                </form>
            </div> 
            <!-- end of list -->
            <div class="cold-md-9">
                <div class="card" style ="background-color:rgb(91, 91, 91);border:none;">
                    <div class="card-body row" style="text-align:center;" >
                        <?php
                        if(isset($_GET['Officers']))
                        {
                                $Officerchk = []; //storage for checked officers
                                $Officerchk = $_GET['Officers']; //get officer id based on checked
                                foreach($Officerchk as $Officer)
                                {
                                    $cases = "SELECT * FROM casetable WHERE OfficerID IN ($Officer)";
                                    $query_cases_run = mysqli_query($Conn, $cases);
                                    if(mysqli_num_rows($query_cases_run) > 0)
                                    {
                                        foreach($query_cases_run as $cases):
                                            ?>
                                                <div class="col-md-4 mt-2" style = "text-align:center;">
                                                    <div style = "border:1px solid gray;padding:.5rem;">
                                                        <h6><?=$cases['CaseName']; ?></h6>
                                                    </div>
                                                </div>
                                            <?php
                                        endforeach;
                                    }
                                }
                        }else
                        {

                            $cases = "SELECT * FROM casetable ";
                            $query_cases_run = mysqli_query($Conn, $cases);
                            if(mysqli_num_rows($query_cases_run) > 0)
                            {
                                ?>
                                <center><h2 style = "font-size:25px;">Cases</h2></center>
                                <?php
                                foreach($query_cases_run as $cases):
                                    ?>
                                        <div class="col-md-4 mt-3">
                                            <div class="border p-2">
                                                <h6><?=$cases['CaseName']; ?></h6>
                                            </div>
                                        </div>
                                    <?php
                                endforeach;
                            }else
                            {
                                echo "Officer has no Handle Cases";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>