<?php 
include("../includes/header_admin.php");
include("../includes/prohibited.php");
include("../scripts/db/database.php");
$hidden_field = '<input type="hidden" name="tenantupdate" value="0" />';

//if the variable is set.

if(isset($_POST['name'])){

  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $unitno = $_POST['unitno'];
  $hidden = $_POST['tenantupdate'];

  if($hidden == '0'){
    create_tenant($conn,$name,$email,$unitno);
  }
  elseif($hidden == '1'){
    update_tenant($conn,$name,$email,$unitno,$id);
  }
  else {
  }
}
$contentMenu = (isset($_GET['action'])) ? $_GET['action']: 'help' ;
$tenants = show_tenants($conn);
if($contentMenu == "admin"){
    echo '
   <div align="center">
    <table>
    <caption>
      List of Tenants
    </caption>
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        <th scope="col">unitno</th>       
        <th colspan="2" scope="col">actions</th>
      </tr>
    </thead>
    <tbody>';
    
    foreach ($tenants as $tenant) {
        echo '
        <tr>
        <td scope="row">'.$tenant['name'].'</td>
        <td scope="row">'.$tenant['email'].'</td>
        <td scope="row">'.$tenant['unitno'].'</td>         
        <td scope="row"><a href="?action=update&id='.$tenant['ID'].'">edit</a></td>
        <td scope="row"><a href="delete_records.php?action=delete_tenant&id='.$tenant['ID'].'">delete</a></td>
        </tr>';
    }
    }
    elseif(isset($_GET['id'])){
    
    }
    else{
        $url = "./";
        $displaytime = '2';
        $message = "You performed a prohibited action. you are not welcome - bye.";
        redirectwithtime($url, $displaytime, $message);
    }
    echo '
</tbody>
</table>
</div>
';

if(isset($_GET['id'])){
    $form_submittext = "Update";
    $form_headingtext = "Update Tenants";
    $hidden_field = '<input type="hidden" name="tenantupdate" value="1" />';

    $tenant = show_tenant($conn, $_GET['id']);
    if(is_null($tenant)){
        $url = "../";
        $displaytime = '2';
        $message = "You performed a prohibited action. logging you out.";
        redirectwithtime($url, $displaytime, $message);
    }
    else{
      $idfield = $tenant['ID'];
    $namefield = $tenant['name'];
    $emailfield = $tenant['email'];  
    $unitfield = ['unitno']; 
    }



}
else{
    $form_submittext = "Submit New";
    $form_headingtext = "New ";
    $idfield = '0';
    $namefield = "name";
    $emailfield = "email";
    $unitfield = "unitno";
    
}

echo '
<hr/>
<div>
<form action="" method="post">
<input type="hidden" name="id" value="'.$idfield.'" />
   <div id="heading">
    <b>'.$form_headingtext.'</b>    
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="name" required value='.$namefield.' Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="email" required value='.$emailfield.' Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
   <input type="text" class="form-control" name="unitno" required value=" enter unit number" implode(', ', $unitfield); style="border-radius: 15px; width: 300px;">
   </div>
   
   <div id = "Submit">'.$hidden_field.'
    <input type ="submit" name = "submit" value="'.$form_submittext.'">
   </div>
   </form>
</div>
   ';

/*
$url = ".\index.php";
$timeout = "5";
redirectwithtime($url, $timeout);
*/
include('../includes/footer_admin.php');
?>