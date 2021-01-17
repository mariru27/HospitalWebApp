<?php
  include_once "../../databaseConnection.php";

  function AfiseazaMedici()
  {
    global $conn;

    $query = sprintf("SELECT * FROM MEDIC");
    $result = oci_parse($conn, $query);
    oci_execute($result);

    print("<a href=\"add.php\">Adauga Medic</a> ");
    print("<br><br>");
    print("<table class=\"table\"><thead><tr>");
    print("<th>id</th>");
    print("<th>Nume</th>");
    print("<th>Prenume</th>");
    print("</tr></thead><tbody>");

    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
        
      print("<tr>");
      foreach ($row as $item) {
          print "<td>" . $item . "</td>";
      }

      print("<td>");
      print("<a href=\"edit.php?idMedic=". $row['IDMEDIC']  ."\">Edit</a> | ");
      print("<a href=\"Index.php?action=delete&idMedic=". $row['IDMEDIC']  ."\">Delete</a>");
      print("</tr>");
      print("</td>");
    }

    print "</tbody></table>\n";

  }

  function DeleteMedic($idMedic)
  {
    global $conn;
    $queryDelete = sprintf("DELETE FROM MEDIC WHERE IDMEDIC=%d", $idMedic);
    $resultDelete = oci_parse($conn, $queryDelete);
    oci_execute($resultDelete);
  }

?>
