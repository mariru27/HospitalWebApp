<?php
  include_once "../../databaseConnection.php";

  function AfiseazaRetete()
  {
    global $conn;

    $query = sprintf("SELECT * FROM RETETA");
    $result = oci_parse($conn, $query);
    oci_execute($result);
    
    print("<a href=\"add.php\">Adauga Reteta</a> ");
    print("<br><br>");
    print("<table class=\"table\"><thead><tr>");
    print("<th>id</th>");
    print("<th>Cod Fiscal</th>");
    print("<th>Unitate medicala</th>");
    print("<th>Judet</th>");
    print("<th>Numar casa de asigurari</th>");
    print("</tr></thead><tbody>");



    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
      print("<tr>");
      foreach ($row as $item) {
          print "<td>" . $item . "</td>";
      }
      print("<td>");
      print("<a href=\"edit.php?idReteta=". $row['IDRETETA']  ."\">Edit</a> | ");
      print("<a href=\"Index.php?action=delete&idReteta=". $row['IDRETETA']  ."\">Delete</a>");
      print("</tr>");
      print("</td>");

    }

    print "</tbody></table>\n";

  }

  function DeleteReteta($idReteta)
  {
    global $conn;

    $queryDelete = sprintf("DELETE FROM RETETA WHERE IDRETETA=%d", $idReteta);
    $resultDelete = oci_parse($conn, $queryDelete);
    oci_execute($resultDelete);

  }
?>
