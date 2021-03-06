<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Medic</h4>



<?php 
    //medic
    global $conn;

    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    $valid = true;
    $errorNume = "";
    $errorPrenume = "";

    if($action == 'add')
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

            $queryInsert = sprintf("INSERT INTO MEDIC VALUES(seq_medic.nextval,'%s', '%s')", $nume, $prenume);
            $resultInsert = oci_parse($conn, $queryInsert);
            oci_execute($resultInsert);
            header("Location: http://localhost/HospitalWebApp/app/Medic/index.php");
        }
    }
?>

<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="get">
        <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for = "nume" class="control-label">Nume</label>
                <input class="form-control" type="text" id="nume" name = "nume" rows="3"> 
                <span style="color:red;" class="help-block"><?php echo $errorNume; ?></span>
            </div>
            <div class="form-group">
                <label for = "prenume" class="control-label">Prenume</label>
                <input class="form-control" type="text" id="prenume" name = "prenume" rows="3">
                <span style="color:red;" class="help-block"><?php echo $errorPrenume; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

