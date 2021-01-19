<?php
  include_once "../../databaseConnection.php";

  function AfiseazaMedic_Reteta()
  {
    global $conn;

    $query = sprintf("SELECT * FROM MEDICAMENTRETETA");
    $result = oci_parse($conn, $query);
    oci_execute($result);

    print("<br><br>");
    print("<table class=\"table\"><thead><tr>");
    print("<th>idMedicamentReteta</th>");
    print("<th>idMedicament</th>");
    print("<th>idReteta</th>");
    print("</tr></thead><tbody>");

    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
        
      print("<tr>");
      foreach ($row as $item) {
          print "<td>" . $item . "</td>";
      }

      print("</tr>");
    }

    print "</tbody></table>\n";

  }

?>
