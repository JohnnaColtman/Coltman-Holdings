<?php
require_once "scripts/db/database.php";
session_start();
$title = "Coltman Homes";


echo '
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$title.'</title>
    <link rel ="stylesheet" href ="styles/styles.css">
</head>


<body>

<div id ="Top">
       <p><b>Please Log In Or Sign Up To Continue</b></p>
       <div id ="LogL">
        <ul>
            <li style ="margin:-0.5% auto; background-color: white; border-radius: 15px; height:20px; width:100px; text-align: center; margin-right: 100px;"><a href ="./public/login.php">Log In</a></li>
            <li style ="margin:-0.5% auto; background-color: white; border-radius: 15px; height:20px; width:100px; text-align: center;margin-left: 100px;"><a href ="./public/signup.php">Sign up</a></li>
        </ul>
       </div>
</div>

     
   <div id="List">
    <ul>
        <li><b><u>About us</u></b></li>
        <li style ="color:grey">Properties</li>
       <li><image src="images/new logo final2.png" height="50px" width="70px" style = "margin:-25% auto; margin-right: 30px;"></image></li>
        <li style ="color:grey">Pay</li>
        <li style ="color:grey">Contact us</li>
    </ul>
   </div>  
    
   </div>
   <div id ="Background">   
    
    <image src="images/pexels-pixabay-4623312.jpg" width="100%"></image>
   </div>

   <div id = "Aboutus">
    <h1 style ="margin-left: 30px;"><b><u>About Us</u></b></h1>
    <p> </p>
    <p> </p>
    <p> </p>
   </div>

   <div id =AboutusP>
<h1 style ="text-align: center; margin-left: 10px; margin:5% auto;">Welcome to Coltman Holdings:</h1>
<p style ="font-size: 20px;">At Coltman Holdings, we believe in more than just bricks and mortar. We are a team of dedicated professionals committed to providing exceptional accommodation solutions. Let us introduce ourselves:</p>

   </div>
   <div id="Border1">

   </div>
   <h1 style = "text-align: center; margin-left: 50px;"><b><u>Meet The Owners</u></b></h1>
<div id ="OI">
<ul>
';

$owners = show_owners($conn);
foreach ($owners as $owner) {
    echo '<li><image src="images/'.$owner['image'].'" style="height:300px;"></image>'.$owner['name'].'</li>';
}


echo '</ul>
 </div>
 <div id ="Border2">
    
 </div>

 <div id ="paragraph">
    <h1 style ="text-align: center; margin-left: 30px; margin:15%px auto;"><b>Our Mission:</b></h1>
    <p style="margin-left: 30px; font-size: 20px;">We are not just landlords; we are partners in your journey. Our mission is simple:</p>
    <p style="margin-left: 30px; font-size: 20px;">We understand that everyone deserves a safe and comfortable place to call home. We are here to help.</p>
    <p style="margin-left: 30px; font-size: 20px;">Our properties are meticulously maintained, ensuring a high standard of living for our tenants.</p>
    <p style="margin-left: 30px; font-size: 20px;">We foster a sense of community within our properties. Whether you are a student, a professional, or a family, you will find a welcoming environment.</p>
    
    <h1 style ="text-align: center; margin-left: 30px;"><b>Our Portfolio:</b></h1>
    <p style="margin-left: 30px; font-size: 20px;">Our flagship property is nestled in the heart of Lenasia South, Gauteng, Johannesburg. It is more than just a building; it is a place where memories are made, dreams are pursued, and lives are enriched.</p>

    <h1 style ="text-align: center; margin-left: 30px; margin:15%px auto;"><b>Explore Our Services:</b></h1>
    <p style="margin-left: 30px; font-size: 20px;">Deposits: Easily manage your security deposits through our secure portal.</p> 
    <p style="margin-left: 30px; font-size: 20px;">Outstanding Balances: View your account status and outstanding balances anytime, anywhere.</p> 
    <p style="margin-left: 30px; font-size: 20px;">Property Listings: Curious about our other properties? Explore our portfolio and find your next home.</p> 
    
    <h1 style ="text-align: center; margin-left: 30px; margin:15%px auto;">Join Our Journey:</h1>
    <p style="margin-left: 30px; font-size: 20px;">Whether you are a tenant, an investor, or simply curious, we invite you to be part of the Coltman family. Let us build a brighter future together.</p>
    <h1 style ="text-align: center; margin-left: 30px; margin:15%px auto;">Welcome Home!</h1>
 </div>  

</body>
</html>
';
?>