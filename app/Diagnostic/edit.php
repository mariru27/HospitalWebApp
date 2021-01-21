<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Editeaza Diagnostic</h4>


<?php 
  //diagnostic to display
  global $conn;

  $idDiagnostic = $_REQUEST['idDiagnostic'];
  $querySelect = sprintf("SELECT * FROM DIAGNOSTIC WHERE IDDIAGNOSTIC=%d", $idDiagnostic);
  $resultSelect = oci_parse($conn, $querySelect);
  oci_execute($resultSelect);
  $rowPacient = oci_fetch_array($resultSelect, OCI_ASSOC+OCI_RETURN_NULLS);


  $errorDenumire = "";
  $errorTip = "";
  $valid = true; 

   //edit action
   $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
   if($action == 'edit')
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

     //update in database
     $queryUpdate = sprintf("UPDATE DIAGNOSTIC SET DENUMIRE = '%s', TIP = '%s' WHERE IDDIAGNOSTIC = %d",
                             $denumire, $tip, $idDiagnostic);
     $resultUpdate = oci_parse($conn, $queryUpdate);
     oci_execute($resultUpdate); 
     header("Location: http://localhost/HospitalWebApp/app/Diagnostic/index.php");
    }
 
   }
?>


<div class="row">
    <div class="col-md-4">
        <form action="edit.php" method="get">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="idDiagnostic" value="<?php echo $_REQUEST['idDiagnostic']?>">
            <div class="form-group">
                <label for = "denumire" class="control-label">Denumire</label>
                <input class="form-control" type="text" id="denumire" name = "denumire"  value ="<?php echo $rowPacient['DENUMIRE']?>"> 
                <span style="color:red;" class="help-block"><?php echo $errorDenumire; ?></span>
            </div>
            <div class="form-group">
                <label for = "tip" class="control-label">Tip</label>
                <input class="form-control" type="text" id="tip" name = "tip" value ="<?php echo $rowPacient['TIP']?>">
                <span style="color:red;" class="help-block"><?php echo $errorTip; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Editeaza" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>