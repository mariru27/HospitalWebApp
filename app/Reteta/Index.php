<?php
  include '../header.php';
  include_once "functions.php";
  include_once "test.php";

?>

<h4 class="display-4">Reteta</h4>

<?php
  $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
  if($action == 'delete')
  {
    //call delete function
    $idReteta = $_REQUEST['idReteta'];
    DeleteReteta1($idReteta);
  }
  AfiseazaRetete();
?>
