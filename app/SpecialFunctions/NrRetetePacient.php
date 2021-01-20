<?php
  include '../header.php';
  include_once "../../databaseConnection.php";

?>

<h4 class="display-4">Numarul de retete pentru fiecare pacient</h4>

<?php 
  global $conn;

  $querySelectPacient = sprintf("SELECT * FROM PACIENT");
  $resultSelectPacient= oci_parse($conn, $querySelectPacient);
  oci_execute($resultSelectPacient);
  ?>

<?php
  while ($row = oci_fetch_array($resultSelectPacient, OCI_ASSOC+OCI_RETURN_NULLS)) {
    print("<ul><li >IdPacient:". $row['IDPACIENT'] . "</li>");
    print("<li >Nume:". $row['NUME'] . "</li>");

    $idPacient = $row['IDPACIENT'];
    
    $querySelectPacientReteta = sprintf("SELECT Pacient.idpacient ,Pacient.nume, Pacient.cnp, pacientretera.idreteta
    FROM Pacient, PACIENTRETERA
    Where pacientretera.idpacient = %d AND pacient.idpacient = %d", $idPacient, $idPacient);
    $resultSelectPacientReteta= oci_parse($conn, $querySelectPacientReteta);
    oci_execute($resultSelectPacientReteta);

    $nrMedicamente = 0;
    while ($rowMedicament = oci_fetch_array($resultSelectPacientReteta, OCI_ASSOC+OCI_RETURN_NULLS)) {

      $nrMedicamente++;
    }
    echo "Numarul de retete pentru pacient: " . $nrMedicamente;

    print("</ul>");

  }

  print "</tbody></table>\n";

    
?>