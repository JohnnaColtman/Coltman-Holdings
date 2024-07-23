
<?php
include("../includes/header.php");
require_once "../scripts/db/database.php";

 echo'  <h1 style = "text-align: center; margin-left: 30px;color:black;"><u>Properties</u></h1> 
   <div id ="PropContainer" style ="height:2000px; width:900px;border-radius:30px;">
   
    <div class="slideshow-container">
        <div class="mySlides">
            <img src="../images/1.jpeg" alt="Image 1">
        </div>
        <div class="mySlides">
            <img src="../images/2.jpeg" alt="Image 2">
        </div>
        <div class="mySlides">
            <img src="../images/3.jpeg" alt="Image 3">
        </div>
        <div class="mySlides">
            <img src="../images/Nevada center.jpeg" alt="Image 4">
        </div>        
    </div>

    <script src="../scripts/script.js"></script>';

show_properties($conn);


  

     echo'   
     <center><h2>Book a Viewing</h2></center>
     <!-- Calendly inline widget begin -->
<div class="calendly-inline-widget" data-url="https://calendly.com/coltmanholdings/30min" style="min-width:320px;height:700px;"></div>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<!-- Calendly inline widget end -->

     </div>
    </div>
    </div>


</div>';
include("../includes//footer.php");
?>
    



    
  
