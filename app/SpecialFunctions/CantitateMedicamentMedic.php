<?php
  include_once "../../databaseConnection.php";
  include '../header.php';
?>

<h4 class="display-4">Cantitate medicamente eliberate de medici</h4>


<?php 
  global $conn;

  $querySelectMedic = sprintf("SELECT * FROM MEDIC");
  $resultSelectMedic= oci_parse($conn, $querySelectMedic);
  oci_execute($resultSelectMedic);
  ?>
<!-- <ul class="list-group list-group-flush">
  <li class="list-group-item">Cras justo odio
  <ul>
      <li>Black tea</li>
      <li>Green tea</li>
    </ul></li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul> -->
<?php
  // print("<br><br>");
  // print("<table class=\"table\"><thead><tr>");
  // print("<th>id</th>");
  // print("<th>Nume</th>");
  // print("<th>Prenume</th>");
  // print("</tr></thead><tbody>");



  while ($row = oci_fetch_array($resultSelectMedic, OCI_ASSOC+OCI_RETURN_NULLS)) {
    print("<ul><li class=\"list-group-item\">IdMedic:". $row['IDMEDIC'] . "</li>");
    print("<li class=\"list-group-item\">Nume:". $row['NUME'] . "</li>");
    print("</ul>");

  }

  print "</tbody></table>\n";

    
?>
