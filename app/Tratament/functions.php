<?php
  include_once "../../databaseConnection.php";

  function AfiseazaTratamente()
  {
    global $conn;

    $query = sprintf("SELECT * FROM TRATAMENT");
    $result = oci_parse($conn, $query);
    oci_execute($result);
    print("<a href=\"add.php\">Adauga tratament</a> ");
    print("<br><br>");
    print("<table class=\"table\"><thead><tr>");
    print("<th>id</th>");
    print("<th>Descriere</th>");
    print("<th>id diagnostic</th>");
    print("</tr></thead><tbody>");

    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
      print("<tr>");
      foreach ($row as $item) {
          print "<td>" . $item . "</td>";
      }
      print("<td>");
      print("<a href=\"edit.php?idTratament=". $row['IDTRATAMENT']  ."\">Edit</a> | ");
      print("<a href=\"Index.php?action=delete&idTratament=". $row['IDTRATAMENT']  ."\">Delete</a>");
      print("</tr>");
      print("</td>");
    }

    print "</tbody></table>\n";

  };

  function DeleteTratament($idTratament)
  {
    global $conn;

    $queryDelete = sprintf("DELETE FROM TRATAMENT WHERE IDTRATAMENT=%d", $idTratament);
    $resultDelete = oci_parse($conn, $queryDelete);
    oci_execute($resultDelete);

  }

?>
