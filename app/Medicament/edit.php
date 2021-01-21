<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Editeaza Medicament</h4>


<?php 
    //medicament to display
    global $conn;

    $idMedicament = $_REQUEST['idMedicament'];
    $querySelect = sprintf("SELECT * FROM MEDICAMENT WHERE IDMEDICAMENT=%d", $idMedicament);
    $resultSelect = oci_parse($conn, $querySelect);
    oci_execute($resultSelect);
    $rowPacient = oci_fetch_array($resultSelect, OCI_ASSOC+OCI_RETURN_NULLS);

    //for validation
    $valid = true;
    $errorDenumire = "";
    $errorCantitate = "";

    //edit action
    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    if($action == 'edit')
    {
        $denumire = $_REQUEST['denumire'];
        $cantitate = $_REQUEST['cantitate'];
        if($denumire == null)
        {
            $errorDenumire = "Campul denumire trebuie completat";
            $valid = false;
        }
        if($cantitate == null)
        {
            $errorCantitate = "Campul tip trebuie completat";
            $valid = false;
        }
        if(!is_numeric($cantitate) && $cantitate != null)
        {
            $errorCantitate = "Campul trebuie sa contina doar numere";
            $valid = false;
        }

        if($valid == true)
        {
            //update in database
            $queryUpdate = sprintf("UPDATE MEDICAMENT SET DENUMIRE = '%s', CANTITATE = %d WHERE IDMEDICAMENT = %d",
                                    $denumire, $cantitate, $idMedicament);
            $resultUpdate = oci_parse($conn, $queryUpdate);
            oci_execute($resultUpdate); 
            header("Location: http://localhost/HospitalWebApp/app/Medicament/index.php");
        }

    }
?>

<div class="row">
    <div class="col-md-4">
        <form action="edit.php" method="get">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="idMedicament" value="<?php echo $_REQUEST['idMedicament']?>">
            <div class="form-group">
                <label for = "denumire" class="control-label">Denumire</label>
                <input class="form-control" type="text" id="denumire" name = "denumire" value ="<?php echo $rowPacient['DENUMIRE']?>"> 
                <span style="color:red;" class="help-block"><?php echo $errorDenumire; ?></span>
            </div>
            <div class="form-group">
                <label for = "cantitate" class="control-label">Cantitate</label>
                <input class="form-control" type="text" id="cantitate" name = "cantitate" value ="<?php echo $rowPacient['CANTITATE']?>">
                <span style="color:red;" class="help-block"><?php echo $errorCantitate; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Editeaza" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

