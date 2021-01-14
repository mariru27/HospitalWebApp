<?php
  include_once "../../databaseConnection.php";

  function AfiseazaMedicamente()
  {
    global $conn;

    $query = sprintf("SELECT * FROM MEDICAMENT");
    $result = oci_parse($conn, $query);
    oci_execute($result);

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
      print("<a href=\"index.php\">Edit</a> | ");
      print("<a href=\"index.php\">Delete</a>");
            print("</tr>");
      print("</td>");

    }

    print "</tbody></table>\n";

  }

?>
