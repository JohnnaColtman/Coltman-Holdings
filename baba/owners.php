<?php 
include("../includes/header_admin.php");
include("../includes/prohibited.php");
include("../scripts/db/database.php");
$hidden_field = '<input type="hidden" name="ownerupdate" value="0" />';

//if the variable is set.

if(isset($_POST['name'])){

  $id = $_POST['id'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $description = $_POST['description'];
  $image = $_POST['image'];
  $hidden = $_POST['ownerupdate'];

  if($hidden == '0'){
    create_owner($conn,$name, $surname,$description,$image);
  }
  elseif($hidden == '1'){
    update_owner($conn,$name, $surname,$description,$image,$id);
  }
  else {
  }
}


$contentMenu = (isset($_GET['action'])) ? $_GET['action']: 'help' ;
$owners = show_owners($conn);

if($contentMenu == "admin"){
echo '
<div align="center">
<table>
<caption>
  List of Owners
</caption>
<thead>
  <tr>
    <th scope="col">name</th>
    <th scope="col">surname</th>
    <th scope="col">description</th>
    <th scope="col">image</th>
    <th colspan="2" scope="col">actions</th>
  </tr>
</thead>
<tbody>';

foreach ($owners as $owner) {
    echo '
    <tr>
    <td scope="row">'.$owner['name'].'</td>
    <td scope="row">'.$owner['surname'].'</td>
    <td scope="row">'.$owner['description'].'</td>
    <td scope="row">'.$owner['image'].'</td>
    <td scope="row"><a href="?action=update&id='.$owner['id'].'">edit</a></td>
    <td scope="row"><a href="delete_records.php?action=delete_owner&id='.$owner['id'].'">delete</a></td>
    </tr>';
}
}
elseif(isset($_GET['id'])) {

}
else{
    $url = "../";
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
    $form_headingtext = "Update Owner";
    $hidden_field = '<input type="hidden" name="ownerupdate" value="1" />';

    $owner = show_owner($conn, $_GET['id']);
    if(is_null($owner)){
        $url = "../";
        $displaytime = '2';
        $message = "You performed a prohibited action. logging you out.";
        redirectwithtime($url, $displaytime, $message);
    }
    else{
    $idfield = $owner['id'];
    $namefield = $owner['name'];
    $surnamefield = $owner['surname'];
    $descfield = $owner['description'];
    $imagenamefield = $owner['image'];
    }
}
else{
    $form_submittext = "Submit New";
    $form_headingtext = "New Owner";
    $idfield = '0';
    $namefield = "Name";
    $surnamefield = "Surname";
    $descfield = "Description";
    $imagenamefield = "Filename";
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
    <input type="text" class ="form-control" name="surname" required value='.$surnamefield.' Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="description" required value='.$descfield.' Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
    <input type = "text" class = "form-control" name = "image" required value='.$imagenamefield.' Style="border-radius:15px; width:300px;">
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
include('../includes//footer_admin.php');
?>