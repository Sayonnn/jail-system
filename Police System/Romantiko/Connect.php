<?php
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {  
    echo 'We don\'t have mysqli!!!';  
} else {  
 echo 'mysqli is installed';
}  

$Connection = new mysqli('localhost','root','','dbromantiko');
     
         if (isset($_POST['submit'])){
             $Fname = $_POST['Fname'];
             $Lname = $_POST['Lname'];
             $Mname = $_POST['Mname'];
             $Age = $_POST['Age'];
             $Gender = $_POST['Gender'];
             $Address = $_POST['Address'];
             $Occupation = $_POST['Occupation'];
             $Birthday = date('Y-m-d', strtotime($_POST['Birthday']));
     
     
         $Query = "insert into tblRomantiko(First_Name,Last_Name,Middle_Name,Age,Gender,Address,Occupation,Birthday) 
         Values('$Fname','$Lname','$Mname','$Age','$Gender','$Address','$Occupation','$Birthday')";
     
         if(mysqli_query($Connection,$Query)){
             echo "<script> alert('new record inserted successfully!')</script>";
         }else{
             echo "error:".mysqli_error($Connection);
         }
         mysqli_close($Connection);
         
    }else{
        echo "<script> alert('new record inserted successfully!')</script>";
        
    }

?>





