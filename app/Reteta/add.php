<?php
  include '../header.php';
  include_once "functions.php";
?>

<h4 class="display-4">Adauga Reteta</h4>



<?php 
    //get medicament
    global $conn;
    $querySelect = sprintf("SELECT * FROM MEDICAMENT");
    $resultSelectMedicament = oci_parse($conn, $querySelect);
    oci_execute($resultSelectMedicament);

    //get pacienti
    $querySelectPacient = sprintf("SELECT * FROM PACIENT");
    $resultSelectPacient = oci_parse($conn, $querySelectPacient);
    oci_execute($resultSelectPacient);

    //get medici 
    $querySelectMedic = sprintf("SELECT * FROM MEDIC");
    $resultSelectMedic  = oci_parse($conn, $querySelectMedic);
    oci_execute($resultSelectMedic);



    $action = isset($_REQUEST['action'])? $_REQUEST['action']:"";
    if($action == 'add')
    {

        // $codFiscal = $_REQUEST['codFiscal'];
        // $unitateMedicala = $_REQUEST['unitateMedicala'];
        // $judet = $_REQUEST['judet'];
        // $nrCasa = $_REQUEST['nrCasa'];
        
        // $queryInsert = sprintf("INSERT INTO RETETA VALUES(seq_reteta.nextval,'%s', '%s','%s', %d)", $codFiscal, $unitateMedicala, $judet, $nrCasa);
        // $resultInsert = oci_parse($conn, $queryInsert);
        // oci_execute($resultInsert);

        //select next value from seq_reteta
         $querySelectSeq = sprintf("SELECT seq_reteta.nextval S FROM dual");
         $resultSelectSeq = oci_parse($conn, $querySelectSeq);
         oci_execute($resultSelectSeq);
         $rowSeq = oci_fetch_array($resultSelectSeq, OCI_ASSOC+OCI_RETURN_NULLS);

         //get next value, then decrement
         $seqValue = $rowSeq['S'];
         $IdReteta = $seqValue - 1;


        while ($row = oci_fetch_array($resultSelectMedicament, OCI_ASSOC+OCI_RETURN_NULLS)) 
        {
            $idMedicament = isset($_REQUEST[$row['IDMEDICAMENT']])?true:false;
            if($idMedicament)
            {
                //Store in MEDICAMENT-RETETA
                // echo $row['DENUMIRE'] . "<br>";
                $queryInsertMedicamentReteta = sprintf("INSERT INTO MEDICAMENTRETETA VALUES(seq_medicamentReteta.nextval, %d, %d)", $idMedicament, $IdReteta);
                $resultInsertMedicamentReteta = oci_parse($conn, $queryInsertMedicamentReteta);
                oci_execute($resultInsertMedicamentReteta);

            }

            // //Store in MEDIC-RETETA
            $idMedicRadio = isset($_REQUEST['idMedicRadio'])?true:false;
            if($idMedicRadio)
            {
                //Store in MEDICAMENT-RETETA
                // echo $row['DENUMIRE'] . "<br>";
               
                $queryInsertMedicReteta = sprintf("INSERT INTO MEDICRETETA VALUES(seq_medicReteta.nextval, %d, %d)", $idMedicRadio, $IdReteta);
                $resultInsertMedicReteta = oci_parse($conn, $queryInsertMedicReteta);
                oci_execute($resultInsertMedicReteta);

            // }

            // //Store in PACIENT-RETETA
            // $idPacientRadio = isset($_REQUEST['idPacientRadio'])?true:false;



        }

        // header("Location: http://localhost/HospitalWebApp/app/Reteta/index.php");
    }


?>



<div class="row">
    <div class="col-md-4">
        <form action="add.php" method="get">
        <input type="hidden" name="action" value="add">
        <h4>Alege medicamentele:</h4>
        <div >
        <?php
            while ($row = oci_fetch_array($resultSelectMedicament, OCI_ASSOC+OCI_RETURN_NULLS)) 
            {
        ?>

        <input type="checkbox" value="" name="<?php echo $row['IDMEDICAMENT'] ?>" id="<?php echo $row['IDMEDICAMENT'] ?>">
        <label for="<?php echo $row['IDMEDICAMENT'] ?>">
             <?php echo $row['DENUMIRE'] ?>
        </label>
        <br>
        <?php
            }
        
        ?>

        <h4>Alege medic:</h4>
        <div>
        <?php
            while ($row = oci_fetch_array($resultSelectMedic, OCI_ASSOC+OCI_RETURN_NULLS)) 
            {
        ?>

        <input type="radio" name="idMedicRadio" id="<?php echo $row['IDMEDIC'] ?>" value ="<?php echo $row['IDMEDIC'] ?>">
        <label for="<?php echo $row['IDMEDIC'] ?>">
            <?php echo $row['NUME'] ?>
        </label>
        <br>
        <?php
            }
        ?>
        </div>


        <h4>Alege pacient:</h4>
        <div>
        <?php
            while ($row = oci_fetch_array($resultSelectPacient, OCI_ASSOC+OCI_RETURN_NULLS)) 
            {
        ?>
        <input type="radio" name="idPacientRadio" id="<?php echo $row['IDPACIENT'] ?>" value ="<?php echo $row['IDPACIENT'] ?>">
        <label for="<?php echo $row['IDPACIENT'] ?>">
            <?php echo $row['NUME'] ?>
        </label>
        <br>
        <?php
            }
        ?>
        </div>


        <hr>
        
        </div>
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

