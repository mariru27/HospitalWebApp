<?php
  include_once "../../databaseConnection.php";

  function AfiseazaPacienti()
  {
    global $conn;

    $query = sprintf("SELECT * FROM PACIENT");
    $result = oci_parse($conn, $query);
    oci_execute($result);

    print("<a href=\"add.php\">Adauga Pacient</a> ");
    print("<br><br>");
    print("<table class=\"table\"><thead><tr>");
    print("<th>id</th>");
    print("<th>CNP</th>");
    print("<th>Nume</th>");
    print("<th>Prenume</th>");
    print("<th>Tip asigurare</th>");
    print("</tr></thead><tbody>");

    while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
      print("<tr>");
      foreach ($row as $item) {
          print "<td>" . $item . "</td>";
      }

      print("<td>");
      print("<a href=\"edit.php?idPacient=". $row['IDPACIENT']  ."\">Edit</a> | ");
      print("<a href=\"Index.php?action=delete&idPacient=". $row['IDPACIENT']  ."\">Delete</a>");
      print("</tr>");
      print("</td>");

    }
    print "</tbody></table>\n";
  }

?>
