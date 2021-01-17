<?php
  include_once "../../databaseConnection.php";

  function AfiseazaDiagnostice()
  {
    global $conn;

    $query = sprintf("SELECT * FROM DIAGNOSTIC");
    $result = oci_parse($conn, $query);
    oci_execute($result);

    print("<a href=\"add.php\">Adauga Diagnostic</a> ");
    print("<br><br>");
    print("<table class=\"table\"><thead><tr>");
    print("<th>id</th>");
    print("<th>Denumire</th>");
    print("<th>Tip</th>");
    print("</tr></thead><tbody>");


    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
      print("<tr>");
      foreach ($row as $item) {
          print "<td>" . $item . "</td>";
      }

      print("<td>");
      print("<a href=\"edit.php?idDiagnostic=". $row['IDDIAGNOSTIC']  ."\">Edit</a> | ");
      print("<a href=\"Index.php?action=delete&idDiagnostic=". $row['IDDIAGNOSTIC']  ."\">Delete</a>");
      print("</tr>");
      print("</td>");

    }

    print "</tbody></table>\n";
  }

  function DeleteDignostic($idDiagnostic)
  {
    global $conn;

    $queryExistDiagnostic = sprintf("SELECT * FROM TRATAMENT WHERE IDDIAGNOSTIC=%d", $idDiagnostic);
    $resultExistDiagnostic = oci_parse($conn, $queryExistDiagnostic);
    oci_execute($resultExistDiagnostic);

    if(oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS) != null)
      echo "Trebuie sa stergi tratamentele care se refera la acest diagnostic";
    else
    {
      $queryDelete = sprintf("DELETE FROM DIAGNOSTIC WHERE IDDIAGNOSTIC=%d", $idDiagnostic);
      $resultDelete = oci_parse($conn, $queryDelete);
      oci_execute($resultDelete);
    }

  }

?>
