<?php
  include_once "../../databaseConnection.php";

  function AfiseazaPacienti()
  {
    global $conn;

    $query = sprintf("SELECT * FROM PACIENTI");
    $result = oci_parse($conn, $query);
    oci_execute($result);

    print("<table class=\"table\"><thead><tr>");
    print("<th>CNP</th>");
    print("<th>Nume</th>");
    print("<th>Prenume</th>");
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
