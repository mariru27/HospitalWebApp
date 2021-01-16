<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Editeaza pacient</h4>


<?php 
  //pacient to display
  global $conn;

  $idPacient = $_REQUEST['idPacient'];
  $querySelect = sprintf("SELECT * FROM PACIENT WHERE IDPACIENT=%d", $idPacient);
  $resultSelect = oci_parse($conn, $querySelect);
  oci_execute($resultSelect);
  $rowPacient = oci_fetch_array($resultSelect, OCI_ASSOC+OCI_RETURN_NULLS);

?>


<div class="row">
    <div class="col-md-4">
        <form action="edit.php" method="GET">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="idPacient" value="<?php echo $_REQUEST['idPacient']?>">
        <div class="form-group">
                <label for = "cnp" class="control-label">Cnp</label>
                <input class="form-control" type="text" id="cnp" name = "cnp" value ="<?php echo $rowPacient['CNP']?>"> 
            </div>
            <div class="form-group">
                <label for = "nume" class="control-label">Nume</label>
                <input class="form-control" type="text" id="nume" name = "nume" value ="<?php echo $rowPacient['NUME']?>" >
            </div>
            <div class="form-group">
                <label for = "prenume" class="control-label">Prenume</label>
                <input class="form-control" type="text" id="prenume" name = "prenume" value ="<?php echo $rowPacient['PRENUME']?>">
            </div>
            <div class="form-group">
                <label for = "tipAsigurare" class="control-label">Tip asigurare</label>
                <input class="form-control" type="text" id="tipAsigurare" name = "tipAsigurare" value ="<?php echo $rowPacient['TIP_ASIGURARE']?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Editeaza" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>