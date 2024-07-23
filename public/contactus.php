<?php
include("../includes/header.php");
include("../includes/prohibited.php");
include("../scripts/db/database.php");

if (isset($_POST["submit"])) {
     $name = $_POST["name"];
     $email = $_POST["email"];
     $description = $_POST["description"];  
     $phone = $_POST['phone'] ;
     $errors = array();
    
     
     if (empty($name) OR empty($email) OR empty($description)) {
      array_push($errors,"All fields are required");
     }
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is not valid");
     }     
     require_once "../scripts/db/database.php";
     $sql = "SELECT * FROM contactus WHERE email = '$email'";
     $result = mysqli_query($conn, $sql);
     $rowCount = mysqli_num_rows($result);
     if ($rowCount>0) {
      //array_push($errors,"Email already exists!");
     }
     if (count($errors)>0) {
      foreach ($errors as  $error) {
          echo "<div class='alert alert-danger'>$error</div>";
      }
     }else{
      
      $sql = "INSERT INTO contactus (name, email, description,phone) VALUES ( ?, ?, ?,?)";
      $stmt = mysqli_stmt_init($conn);
      $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
      if ($prepareStmt) {
          mysqli_stmt_bind_param($stmt,"ssss",$name, $email,$description,$phone);
          mysqli_stmt_execute($stmt);
          echo "<div class='alert alert-success'>You have requested the owners to contact you.</div>";        
          header("refresh:2; url=contactus.php");
      }else{
          die("Something went wrong");
      }
     }
    
  
  }
 


echo'
   <h1 style = "text-align: center; margin-left: 30px;"><u>Contact us</u></h1> 
   <div id ="OI2">
    <ul>
    ';
   
    echo '
    </ul>
     </div>
     <form action="contactus.php" method="post">
     <div id = "form">
   <div id="heading">
    <center><b>Having Problems? Let us know below</b></center>    
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="name" placeholder = "Enter Name" required  Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="email" placeholder = "Enter Email" required Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="description" placeholder = "Enter description" required Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="phone" placeholder = "Enter Phone No." required Style="border-radius:15px; width:300px;">
   </div>
   <div id = "Submit">
    <input type ="submit" name = "submit" value="Submit">
   </div>
   </div>
   </form>
</div>    
     <div id = "Bottom">
     <center>
<image src="../images/email.png" Style = "height:70px; width:auto; margin-right: 500px;"></image>

<p style ="margin:-2% auto;">Email: ColtmanHoldings@gmail.com</p>
<p style ="margin:-5% auto;">Contact No.: 072-391-0648</p>
</center>
     </div>';
     include("../includes/footer.php");
?>
    



    
  
