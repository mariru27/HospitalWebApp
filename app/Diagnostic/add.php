<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Diagnostic</h4>

<?php 
    //diagnostic
    global $conn;

    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    $errorDenumire = "";
    $errorTip = "";
    $valid = true;

    if($action == 'add')
    {
        $denumire = $_REQUEST['denumire'];
        $tip = $_REQUEST['tip'];
        
        if($denumire == null)
        {
            $errorDenumire = "Campul denumire trebuie completat";
            $valid = false;
        }
        if($tip == null)
        {
            $errorTip = "Campul tip trebuie completat";
            $valid = false;
        }
        if($valid == true)
        {
            $queryInsert = sprintf("INSERT INTO DIAGNOSTIC VALUES(seq_diagnostic.nextval,'%s', '%s')", $denumire, $tip);
            $resultInsert = oci_parse($conn, $queryInsert);
            oci_execute($resultInsert);
            header("Location: http://localhost/HospitalWebApp/app/Diagnostic/index.php");
        }

    }
?>

<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="get">
        <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for = "denumire" class="control-label">Denumire</label>
                <input class="form-control" type="text" id="denumire" name = "denumire" rows="3"> 
                <span style="color:red;" class="help-block"><?php echo $errorDenumire; ?></span>

            </div>
            <div class="form-group">
                <label for = "tip" class="control-label">Tip</label>
                <input class="form-control" type="text" id="tip" name = "tip" rows="3">
                <span style="color:red;" class="help-block"><?php echo $errorTip; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>