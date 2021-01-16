<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Diagnostic</h4>

<?php
  $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
  if($action == 'delete')
  {
    //call delete function
    $idDiagnostic = $_REQUEST['idDiagnostic'];
    DeletePacient($idDiagnostic);
  }
  AfiseazaDiagnostice();
?>
