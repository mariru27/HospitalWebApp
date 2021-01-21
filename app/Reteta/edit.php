<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Editeaza Reteta</h4>


<?php 
    //reteta to display
    global $conn;

    $idReteta = $_REQUEST['idReteta'];
    $querySelect = sprintf("SELECT * FROM RETETA WHERE IDRETETA=%d", $idReteta);
    $resultSelect = oci_parse($conn, $querySelect);
    oci_execute($resultSelect);
    $rowPacient = oci_fetch_array($resultSelect, OCI_ASSOC+OCI_RETURN_NULLS);

    //for validation
    $valid = true;
    $errorCodFiscal = "";
    $errorUnitateMedicala = "";
    $errorJudet = "";
    $errorNrCasa = "";

    //edit action
    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    if($action == 'edit')
    {
        $codFiscal = $_REQUEST['codFiscal'];
        $unitateMedicala = $_REQUEST['unitateMedicala'];
        $judet = $_REQUEST['judet'];
        $nrCasa = $_REQUEST['nrCasa'];

        if($codFiscal == null)
        {
            $errorCodFiscal = "Campul cod fiscal trebuie completat";
            $valid = false;
        }
        if($unitateMedicala == null)
        {
            $errorUnitateMedicala = "Campul unitatea medicala fiscal trebuie completat";
            $valid = false;
        }
        if($judet == null)
        {
            $errorJudet = "Campul judet trebuie completat";
            $valid = false;
        }
        if($nrCasa == null)
        {
            $errorNrCasa = "Campul numar casa de asigurari trebuie completat";
            $valid = false;
        }
        if($nrCasa != null && !is_numeric($nrCasa))
        {
            $errorNrCasa = "Campul numar casa de asigurari trebuie sa contina doar cifre";
            $valid = false;
        }
        if($valid == true)
        {
            //update in database
            $queryUpdate = sprintf("UPDATE RETETA SET CODFISCAL = '%s', UNITATEMEDICALA = '%s', JUDET = '%s', NR_CASA_ASIG_MEDIC = %d WHERE IDRETETA = %d",
                            $codFiscal, $unitateMedicala, $judet, $nrCasa, $idReteta);
            $resultUpdate = oci_parse($conn, $queryUpdate);
            oci_execute($resultUpdate); 
            header("Location: http://localhost/HospitalWebApp/app/Reteta/index.php");
        }
 
   }
?>

<div class="row">
    <div class="col-md-4">
        <form action="edit.php" method="get">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="idReteta" value="<?php echo $_REQUEST['idReteta']?>">
            <div class="form-group">
                <label for = "codFiscal" class="control-label">Cod fiscal</label>
                <input class="form-control" type="text" id="codFiscal" name = "codFiscal"  value ="<?php echo $rowPacient['CODFISCAL']?>"> 
                <span style="color:red;" class="help-block"><?php echo $errorCodFiscal; ?></span>
            </div>
            <div class="form-group">
                <label for = "unitateMedicala" class="control-label">Unitate medicala</label>
                <input class="form-control" type="text" id="unitateMedicala" name = "unitateMedicala"  value ="<?php echo $rowPacient['UNITATEMEDICALA']?>">
                <span style="color:red;" class="help-block"><?php echo $errorUnitateMedicala; ?></span>
            </div>
            <div class="form-group">
                <label for = "judet" class="control-label">Judet</label>
                <input class="form-control" type="text" id="judet" name = "judet"  value ="<?php echo $rowPacient['JUDET']?>">
                <span style="color:red;" class="help-block"><?php echo $errorJudet; ?></span>
            </div>
            <div class="form-group">
                <label for = "nrCasa" class="control-label">Numar casa de asigurari</label>
                <input class="form-control" type="text" id="nrCasa" name = "nrCasa"  value ="<?php echo $rowPacient['NR_CASA_ASIG_MEDIC']?>">
                <span style="color:red;" class="help-block"><?php echo $errorNrCasa; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Editeaza" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

