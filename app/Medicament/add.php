<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Medicament</h4>



<?php 
    //medicament
    global $conn;

    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    if($action == 'add')
    {
        $denumire = $_REQUEST['denumire'];
        $cantitate = $_REQUEST['cantitate'];

        $queryInsert = sprintf("INSERT INTO MEDICAMENT VALUES(seq_medicament.nextval,'%s', '%s')", $denumire, $cantitate);
        $resultInsert = oci_parse($conn, $queryInsert);
        oci_execute($resultInsert);
        header("Location: http://localhost/HospitalWebApp/app/Medicament/index.php");
    }
?>

<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="get">
        <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for = "denumire" class="control-label">Denumire</label>
                <input class="form-control" type="text" id="denumire" name = "denumire" rows="3"> 
            </div>
            <div class="form-group">
                <label for = "cantitate" class="control-label">Cantitate</label>
                <input class="form-control" type="text" id="cantitate" name = "cantitate" rows="3">
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

