<?php
  include_once "../../databaseConnection.php";

  function AfiseazaMedicamente()
  {
    global $conn;

    $query = sprintf("SELECT * FROM MEDICAMENT");
    $result = oci_parse($conn, $query);
    oci_execute($result);

    print("<a href=\"add.php\">Adauga Medicament</a> ");
    print("<br><br>");
    print("<table class=\"table\"><thead><tr>");
    print("<th>id</th>");
    print("<th>Denumire</th>");
    print("<th>Cantitate</th>");
    print("</tr></thead><tbody>");


    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
      print("<tr>");
      foreach ($row as $item) {
          print "<td>" . $item . "</td>";
      }
      print("<td>");
      print("<a href=\"edit.php?idMedicament=". $row['IDMEDICAMENT']  ."\">Edit</a> | ");
      print("<a href=\"Index.php?action=delete&idMedicament=". $row['IDMEDICAMENT']  ."\">Delete</a>");
      print("</tr>");
      print("</td>");
    }
    print "</tbody></table>\n";
  }

  function DeleteMedicament($idMedicament)
  {
    global $conn;
    $queryDelete = sprintf("DELETE FROM MEDICAMENT WHERE IDMEDICAMENT=%d", $idMedicament);
    $resultDelete = oci_parse($conn, $queryDelete);
    oci_execute($resultDelete);
  }

?>
