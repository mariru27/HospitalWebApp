<?php
  include '../header.php';
  include_once "../../databaseConnection.php";

?>

<h4 class="display-4">Consumul de medicamente</h4>

<?php 
  global $conn;

  $querySelectMedic = sprintf("SELECT * FROM MEDIC");
  $resultSelectMedic= oci_parse($conn, $querySelectMedic);
  oci_execute($resultSelectMedic);
  ?>

<?php
  while ($row = oci_fetch_array($resultSelectMedic, OCI_ASSOC+OCI_RETURN_NULLS)) {
    print("<ul><li >IdMedic:". $row['IDMEDIC'] . "</li>");
    print("<li >Nume:". $row['NUME'] . "</li>");

    $idMedic = $row['IDMEDIC'];
    
    $querySelectMedicament = sprintf("SELECT MEDICAMENT.denumire, MEDICAMENT.cantitate
    FROM MEDICAMENT, MEDICRETETA, MEDICAMENTRETETA
    WHERE medicreteta.idmedic = %d AND medicreteta.idretetamedicfk = medicamentreteta.idreteta_medicament AND medicament.idmedicament = medicamentreteta.idmedicament_reteta", $idMedic);
    $resultSelectMedicament= oci_parse($conn, $querySelectMedicament);
    oci_execute($resultSelectMedicament);

    $nrMedicamente = 0;
    while ($rowMedicament = oci_fetch_array($resultSelectMedicament, OCI_ASSOC+OCI_RETURN_NULLS)) {
      print("<ul><li >Denumire medicament:". $rowMedicament['DENUMIRE'] . "</li>");
      print("<li >Cantitate medicament:". $rowMedicament['CANTITATE'] . "</li>");
      print("</ul><br>");
      $nrMedicamente++;
    }
    echo "Numarul de medicamente consumate(eliberate de medic): " . $nrMedicamente;

    print("</ul>");

  }

  print "</tbody></table>\n";

    
?>
