<?php 
include("../includes/header_admin.php");
include("../includes/prohibited.php");
include("../scripts/db/database.php");

$contentMenu = (isset($_GET['menu'])) ? $_GET['menu']: 'help' ;

switch ($contentMenu) {
    case 'owners':
        echo "<center><h1>Owners </h1>
            <p>Welcome! Choose admin actions belows</p>
            <p><a href='owners.php?action=admin'>Administer Owners</a></p></center>
            ";
        break;
    case 'properties':
        echo "<center><h1>Property Services</h1>";
        echo "<p>We offer a variety of services, including...</p>
        <p><a href='properties.php?action=admin'>Administer properties</a></p></center>";
        break;
    case 'tenants':
        echo "<center><h1>Tenants Services</h1>";
        echo "<p>We offer a variety of services, including...</p>
        <p><a href='tenants.php?action=admin'>Administer Tenants</a></p><center/>";
        
        break;
    default:
        echo "<center><h1>Welcome Admin</h1>";
        echo "<p>Clicks menu options above to start</p></center>";
}



$contentMenu = (isset($_GET['action'])) ? $_GET['action']: 'help' ;
$contactus = contactus($conn);


echo '
<div align="center">
<table>
<caption>
  Contact us form
</caption>
<thead>
  <tr>
    <th scope="col">name</th>
    <th scope="col">email</th>
    <th scope="col">description</th> 
    <th scope="col">phone</th> 
    <th colspan="2" scope="col">actions</th>   
  </tr>
</thead>
<tbody>';

foreach ($contactus as $contact) {
    echo '
    <tr>
    <td scope="row">'.$contact['name'].'</td>
    <td scope="row">'.$contact['email'].'</td>
    <td scope="row">'.$contact['description'].'</td> 
    <td scope="row">'.$contact['phone'].'</td>
    <td scope="row"><a href="delete_records.php?action=delete_contactus&id='.$contact['id'].'">delete</a></td>
    
    </tr>';
   
}


    




/*
if(logged in){
    show menu 
}
else{
    if(not logged in ){
        redirect to home page
    }
}
*/

/*
$url = ".\index.php";
$timeout = "5";
redirectwithtime($url, $timeout);
*/
include('../includes/footer_admin.php');
?>