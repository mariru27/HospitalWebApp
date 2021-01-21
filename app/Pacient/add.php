<?php
  include '../header.php';
  include_once "functions.php";
  include_once "../../databaseConnection.php";

?>

<h4 class="display-4">Adauga Pacient</h4>



<?php 
    //pacient
    global $conn;

    //for validation
    $valid = true;
    $errorCnp = "";
    $errorNume = "";
    $errorPrenume = "";
    $errorTipAsigurare = "";

    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    if($action == 'add')
    {
        $cnp = $_REQUEST['cnp'];
        $nume = $_REQUEST['nume'];
        $prenume = $_REQUEST['prenume'];
        $tipAsigurare = $_REQUEST['tipAsigurare'];


        if($cnp == null)
        {
            $errorCnp = "Campul cnp trebuie completat";
            $valid = false;
        }
        if(!is_numeric($cnp) && $cnp != null)
        {
            $errorCnp = "Campul cnp trebuie sa contina cifre";
            $valid = false;
        }

        if(is_numeric($cnp) && strlen($cnp) != 13)
        {
            $errorCnp = "Campul cnp trebuie sa contina 13 cifre";
            $valid = false;


        }
        $querySelect = sprintf("SELECT * FROM PACIENT WHERE pacient.cnp = %d", $cnp);
        $resultSelect = oci_parse($conn, $querySelect);
        oci_execute($resultSelect);   

        if(is_numeric($cnp) && strlen($cnp) == 13 && oci_fetch_row ($resultSelect) != null)
        {
            $errorCnp = "Acest cnp exista deja in baza de date";
            $valid = false;
        }

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
        if($tipAsigurare == null)
        {
            $errorTipAsigurare = "Campul tip asigurare trebuie completat";
            $valid = false;
        }
        if($valid == true)
        {
            $queryInsert = sprintf("INSERT INTO PACIENT VALUES(seq_pacient.nextval, %d, '%s', '%s', '%s')", $cnp, $nume, $prenume, $tipAsigurare);
            $resultInsert = oci_parse($conn, $queryInsert);
            oci_execute($resultInsert);
            header("Location: http://localhost/HospitalWebApp/app/Pacient/index.php");
        }
    }
?>

<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="get">
        <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for = "cnp" class="control-label">Cnp</label>
                <input class="form-control" type="text" id="cnp" name = "cnp" rows="3"> 
                <span style="color:red;" class="help-block"><?php echo $errorCnp; ?></span>
            </div>
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
                <label for = "tipAsigurare" class="control-label">Tip asigurare</label>
                <input class="form-control" type="text" id="tipAsigurare" name = "tipAsigurare" rows="3">
                <span style="color:red;" class="help-block"><?php echo $errorTipAsigurare; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

