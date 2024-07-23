<?php
include("../includes/header.php");
require_once "../scripts/db/database.php";

if (isset($_POST["submit"])) {
   $Name = $_POST["username"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $confirmpassword = $_POST["confirmpassword"];
   $unitno =$_POST["unitno"];
   
   $passwordHash = password_hash($password, PASSWORD_DEFAULT);

   $errors = array();
   
   if (empty($Name) OR empty($email) OR empty($password) OR empty($confirmpassword) OR empty($unitno)) {
    array_push($errors,"All fields are required");
   }
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Email is not valid");
   }
   if (strlen($password)<8) {
    array_push($errors,"Password must be at least 8 charactes long");
   }
   if ($password!==$confirmpassword) {
    array_push($errors,"Password does not match");
   }
   require_once "../scripts/db/database.php";
   $sql = "SELECT * FROM tenants WHERE email = '$email'";
   $result = mysqli_query($conn, $sql);
   $rowCount = mysqli_num_rows($result);
   if ($rowCount>0) {
    array_push($errors,"Email already exists!");
   }
   if (count($errors)>0) {
    foreach ($errors as  $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
   }else{
    
    $sql = "INSERT INTO tenants (name, email, password,unitno) VALUES ( ?, ?, ? ,?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt,"ssss",$Name, $email,$passwordHash,$unitno);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>You have signed up successfully.</div>";        
        header("refresh:2; url=../public/login.php");
    }else{
        die("Something went wrong");
    }
   }
  

}

echo'
<div id = "container"><a href="../baba/">   
   <image src="../images/new-logo-final.png" height="150" width="200" style="justify-content: center; display:flex; margin: auto;"></image></a>
<form action="signup.php" method="post">
   <div id="heading">
    <b>Signup</b>    
   </div>
  
   <div id="uname">
    <input type = "text" class ="form-control" name ="username" required placeholder ="Enter your Name" Style = "border-radius:15px; width:500px;">
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="email" required placeholder="Enter your E-mail Address" style = "border-radius:15px; width: 500px; margin:2% auto;">
   </div>


   <div id="uname">
    <input type = "password" vlass ="form-control" name = "password" required placeholder="Enter your password" Style = "border-radius:15px; width:500px;">
   </div>
  
   <div id="uname">
    <input type = "password" class = "form-control" name = "confirmpassword" required placeholder = "Confirm your password" Style = "border-radius:15px; width:500px;">
   </div>

   <div id="uname">   
    <input type = "text" class = "form-control" name = "unitno" placeholder = "Enter Unit Number or type N/A" Style = "border-radius:15px; width:500px;">
   </div>
   <div id = "uname">
    <input type ="submit" name = "submit" value="Sign up">
   </div>

   </form>


</div>';  
include("../includes/footer.php");
  ?>  
