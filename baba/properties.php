<?php 
include("../includes/header_admin.php");
include("../includes/prohibited.php");
include("../scripts/db/database.php");
$hidden_field = '<input type="hidden" name="propertyupdate" value="0" />';

if(isset($_POST['name'])){

  $id = $_POST['id'];
  $name = $_POST['name'];
  $location = $_POST['location'];
  $description = $_POST['description'];
  $vacancies = $_POST['vacancies'];
  $image = $_POST['image'];
  $hidden = $_POST['propertyupdate'];

  if($hidden == '0'){
    create_property($conn,$name,$location,$description,$vacancies,$image);
  }
  elseif($hidden == '1'){
    update_property($conn,$name,$location,$description,$vacancies,$image,$id);
  }
  else {
  }
}
$contentMenu = (isset($_GET['action'])) ? $_GET['action']: 'help' ;

$properties = show_property($conn);
if($contentMenu == "admin"){
    echo '
    <div align="center">
    <table>
    <caption>
      List of Properties
    </caption>
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">Location</th>
        <th scope="col">description</th>
        <th scope="col">vacancies</th>
        <th scope="col">image</th>
        <th colspan="2" scope="col">actions</th>
      </tr>
    </thead>
    <tbody>';
    
    foreach ($properties as $property) {
        echo '
        <tr>
        <td scope="row">'.$property['Name'].'</td>
        <td scope="row">'.$property['Location'].'</td>
        <td scope="row">'.$property['description'].'</td>
        <td scope="row">'.$property['vacancies'].'</td>
        <td scope="row">'.$property['image'].'</td>
        <td scope="row"><a href="?action=update&id='.$property['ID'].'">edit</a></td>
        <td scope="row"><a href="delete_records.php?action=delete_property&id='.$property['ID'].'">delete</a></td>
        </tr>';
    }
    }
    elseif(isset($_GET['id'])){
    
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
    $form_headingtext = "Update Property";
    $hidden_field = '<input type="hidden" name="propertyupdate" value="1" />';

    $property = show_prop($conn, $_GET['id']);
    if(is_null($property)){
        $url = "../";
        $displaytime = '2';
        $message = "You performed a prohibited action. logging you out.";
        redirectwithtime($url, $displaytime, $message);
    }
    else{
      $idfield = $property['ID'];
    $namefield = $property['Name'];
    $locationfield = $property['Location'];
    $descfield = $property['description'];
    $vacfield = $property['vacancies'];
    $imagenamefield = $property['image'];
    }



}
else{
    $form_submittext = "Submit New";
    $form_headingtext = "New Property";
    $idfield ='0';
    $namefield = "Name";
    $locationfield = "Location";
    $descfield = "Description";
    $vacfield = "Vacancies";
    $imagenamefield = "Filename";
}

echo '
<hr/>
<body style="background-image:url(../images/pexels-fotoaibe-1571460.jpg); background-size:cover;">

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
    <input type="text" class ="form-control" name="location" required value='.$locationfield.' Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="description" required value='.$descfield.' Style="border-radius:15px; width:300px;">
   </div>
   <div id="uname">
    <input type="text" class ="form-control" name="vacancies" required value='.$vacfield.' Style="border-radius:15px; width:300px;">
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
include('../includes/footer_admin.php');
?>
