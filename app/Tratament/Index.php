<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Tratament</h4>


<?php
  $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
  if($action == 'delete')
  {
    //call delete function
    $idTratament = $_REQUEST['idTratament'];
    DeleteTratament($idTratament);
  }

  AfiseazaTratamente();
?>
