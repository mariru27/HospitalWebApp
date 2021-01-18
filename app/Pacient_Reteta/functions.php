<?php
  include_once "../../databaseConnection.php";

  function AfiseazaPacient_Reteta()
  {
    global $conn;

    $query = sprintf("SELECT * FROM PACIENTRETERA");
    $result = oci_parse($conn, $query);
    oci_execute($result);

    print("<a href=\"add.php\">Adauga Pacient-Reteta</a> ");
    print("<br><br>");
    print("<table class=\"table\"><thead><tr>");
    print("<th>idPacientReteta</th>");
    print("<th>idPacient</th>");
    print("<th>idReteta</th>");
    print("</tr></thead><tbody>");

    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
        
      print("<tr>");
      foreach ($row as $item) {
          print "<td>" . $item . "</td>";
      }

      print("<td>");
      print("<a href=\"edit.php?idMedic=". $row['IDPACIENTRETETA']  ."\">Edit</a> | ");
      print("<a href=\"Index.php?action=delete&idMedic=". $row['IDPACIENTRETETA']  ."\">Delete</a>");
      print("</tr>");
      print("</td>");
    }

    print "</tbody></table>\n";

  }

?>
