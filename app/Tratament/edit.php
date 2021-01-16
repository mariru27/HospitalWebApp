<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Editeaza Tratament</h4>

<?php 
  //diagnostic to display
  $query = sprintf("SELECT * FROM DIAGNOSTIC");
  $result = oci_parse($conn, $query);
  oci_execute($result);

  //tratament to display
  global $conn;
  $idTratament = $_REQUEST['idTratament'];

  $query2 = sprintf("SELECT * FROM TRATAMENT WHERE IDTRATAMENT=%d", $idTratament);
  $result2 = oci_parse($conn, $query2);
  oci_execute($result2);
  $rowTratament = oci_fetch_array($result2, OCI_ASSOC+OCI_RETURN_NULLS);

  //edit action
  $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
  if($action == 'edit')
  {
    $idTratament = $_REQUEST['idTratament'];
    $idDiagnostic = $_REQUEST['idDiagnostic'];
    $descriere = $_REQUEST['descriere'];

    echo $idTratament;
    echo $idDiagnostic;
    echo $descriere;

    //update in database
    $queryUpdate = sprintf("UPDATE TRATAMENT SET DESCRIERE = '%s', IDDIAGNOSTIC = '%s' WHERE IDTRATAMENT = '%d'",
                            $descriere, $idDiagnostic, $idTratament);
    $resultUpdate = oci_parse($conn, $queryUpdate);
    oci_execute($resultUpdate); 
  }


?>


<div class="row">
    <div class="col-md-4">
        <form action="edit.php" method="GET">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="idTratament" value="<?php echo $_REQUEST['idTratament']?>">
            <div class="form-group">
                <label for="idDiagnostic" class="control-label"></label>
                <select name="idDiagnostic" for="idDiagnostic" class ="form-control">
                <?php
                    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) 
                    {         
                        print("<option value = ". $row['IDDIAGNOSTIC'] . ">". $row['DENUMIRE'] ."</option>");
                    }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for = "descriere" class="control-label"></label>
                <input style="width:20cm; height:2cm" class="form-control" type="text" name = "descriere" value ="<?php echo $rowTratament['DESCRIERE']?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Editeaza" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

