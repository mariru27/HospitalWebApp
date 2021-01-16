<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Pacient</h4>



<?php 
    //pacient
    global $conn;

    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    if($action == 'add')
    {
        $cnp = $_REQUEST['cnp'];
        $nume = $_REQUEST['nume'];
        $prenume = $_REQUEST['prenume'];
        $tipAsigurare = $_REQUEST['tipAsigurare'];

        //echo $cnp . " " . $nume . " " . $prenume . " " . $tipAsigurare;
        $queryInsert = sprintf("INSERT INTO PACIENT VALUES(seq_pacient.nextval, %d, '%s', '%s', '%s')", $cnp, $nume, $prenume, $tipAsigurare);
        $resultInsert = oci_parse($conn, $queryInsert);
        oci_execute($resultInsert);
        header("Location: http://localhost/HospitalWebApp/app/Pacient/index.php");
    }
?>

<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="get">
        <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for = "cnp" class="control-label">Cnp</label>
                <input class="form-control" type="text" id="cnp" name = "cnp" rows="3"> 
            </div>
            <div class="form-group">
                <label for = "nume" class="control-label">Nume</label>
                <input class="form-control" type="text" id="nume" name = "nume" rows="3">
            </div>
            <div class="form-group">
                <label for = "prenume" class="control-label">Prenume</label>
                <input class="form-control" type="text" id="prenume" name = "prenume" rows="3">
            </div>
            <div class="form-group">
                <label for = "tipAsigurare" class="control-label">Tip asigurare</label>
                <input class="form-control" type="text" id="tipAsigurare" name = "tipAsigurare" rows="3">
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

