<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Reteta</h4>



<?php 
    //medic
    global $conn;

    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    if($action == 'add')
    {
        $codFiscal = $_REQUEST['codFiscal'];
        $unitateMedicala = $_REQUEST['unitateMedicala'];
        $judet = $_REQUEST['judet'];
        $nrCasa = $_REQUEST['nrCasa'];
        
        $queryInsert = sprintf("INSERT INTO RETETA VALUES(seq_reteta.nextval,'%s', '%s','%s', %d)", $codFiscal, $unitateMedicala, $judet, $nrCasa);
        $resultInsert = oci_parse($conn, $queryInsert);
        oci_execute($resultInsert);
        header("Location: http://localhost/HospitalWebApp/app/Reteta/index.php");
    }
?>

<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="get">
        <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for = "codFiscal" class="control-label">Cod fiscal</label>
                <input class="form-control" type="text" id="codFiscal" name = "codFiscal" rows="3"> 
            </div>
            <div class="form-group">
                <label for = "unitateMedicala" class="control-label">Unitate medicala</label>
                <input class="form-control" type="text" id="unitateMedicala" name = "unitateMedicala" rows="3">
            </div>
            <div class="form-group">
                <label for = "judet" class="control-label">Judet</label>
                <input class="form-control" type="text" id="judet" name = "judet" rows="3">
            </div>
            <div class="form-group">
                <label for = "nrCasa" class="control-label">Numar casa de asigurari</label>
                <input class="form-control" type="text" id="nrCasa" name = "nrCasa" rows="3">
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
