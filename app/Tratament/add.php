<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Tratament</h4>

<?php 
    //diagnostic
    global $conn;
    $query = sprintf("SELECT * FROM DIAGNOSTIC");
    $result = oci_parse($conn, $query);
    oci_execute($result);

    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    if($action == 'add')
    {
        $categorie_id = $_REQUEST['idDiagnostic'];
        $descriere = $_REQUEST['descriere'];

        $query2 = sprintf("INSERT INTO TRATAMENT VALUES(seq_tratament.nextval,'%s', %d)", $descriere, $categorie_id);
        $result2 = oci_parse($conn, $query2);
        oci_execute($result2);
        header("Location: http://localhost/HospitalWebApp/app/Tratament/index.php");
    }
?>

<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="POST">
        <input type="hidden" name="action" value="add">
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
                <textarea class="form-control" id="descriere" name = "descriere" rows="3"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Adauga" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

