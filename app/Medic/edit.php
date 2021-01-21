<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Editeaza Medic</h4>


<?php 
  //medic to display
  global $conn;

  $idMedic = $_REQUEST['idMedic'];
  $querySelect = sprintf("SELECT * FROM MEDIC WHERE IDMEDIC=%d", $idMedic);
  $resultSelect = oci_parse($conn, $querySelect);
  oci_execute($resultSelect);
  $rowPacient = oci_fetch_array($resultSelect, OCI_ASSOC+OCI_RETURN_NULLS);

  //for validation
  $valid = true;
  $errorNume = "";
  $errorPrenume = "";

   //edit action
   $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
   if($action == 'edit')
   {
    $nume = $_REQUEST['nume'];
    $prenume = $_REQUEST['prenume'];
    
    if($nume == null)
    {
        $errorNume = "Campul nume trebuie completat";
        $valid = false;
    }
    if($prenume == null)
    {
        $errorPrenume = "Campul prenume trebuie completat";
        $valid = false;
    }
    if($valid == true)
    {

        //update in database
        $queryUpdate = sprintf("UPDATE MEDIC SET NUME = '%s', PRENUME = '%s' WHERE IDMEDIC = %d",
        $nume, $prenume, $idMedic);
        $resultUpdate = oci_parse($conn, $queryUpdate);
        oci_execute($resultUpdate); 
        header("Location: http://localhost/HospitalWebApp/app/Medic/index.php");
    }
 
   }
?>

<div class="row">
    <div class="col-md-4">
        <form action="edit.php" method="get">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="idMedic" value="<?php echo $_REQUEST['idMedic']?>">
            <div class="form-group">
                <label for = "nume" class="control-label">Nume</label>
                <input class="form-control" type="text" id="nume" name = "nume" rows="3" value ="<?php echo $rowPacient['NUME']?>"> 
                <span style="color:red;" class="help-block"><?php echo $errorNume; ?></span>
            </div>
            <div class="form-group">
                <label for = "prenume" class="control-label">Prenume</label>
                <input class="form-control" type="text" id="prenume" name = "prenume" rows="3" value ="<?php echo $rowPacient['PRENUME']?>">
                <span style="color:red;" class="help-block"><?php echo $errorPrenume; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Editeaza" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

