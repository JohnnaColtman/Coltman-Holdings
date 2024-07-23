<?php
$title = "Coltman Homes login";
include('../includes/header.php');
require_once "../scripts/db/database.php";
//session_start();
 
if (isset($_POST["Submit"])) {
    $email = $_POST["Email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM tenants WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<div class='alert alert-danger'>SQL statement failed</div>";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $passwordCheck = password_verify($password, $row['password']);
            if ($passwordCheck == false) {
                echo "<div class='alert alert-danger'>Wrong password</div>";
            } elseif ($passwordCheck == true) {
                $_SESSION['user'] = $row['email'];
                $_SESSION["login_time_stamp"] = time(); 
                $_SESSION['page_title'] = "Welcome";
                header("Location: ../connected");
                exit();
            }
        } else {
            echo "<div class='alert alert-danger'>No user found with this email</div>";
        }
    }
}
?>
<div id = "container"><a href="../baba/">   
   <image src="../images/new-logo-final.png" height="150" width="200" style="justify-content: center; display:flex; margin: auto;"></image></a>
<form action="login.php" method="post">
   <div id="heading">
    <b>Login</b>
   
   </div>
   <div id = logf>
    
    <input type ="text"  class ="form-control" name ="Email" required placeholder="Enter your E-mail Address" Style = "border-radius:15px; width:500px;">
   
    <input type ="Password" class = "form-control" name = "password" required placeholder ="Enter your Password"Style = "border-radius:15px; width:500px; margin:2% auto;">
    <input  style ="margin:5% auto; width:100px" type ="Submit" name = "Submit" value ="Log In">
   </div>

<?php
include('../includes/footer.php');
?>