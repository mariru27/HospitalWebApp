<?php
  include_once "../../databaseConnection.php";

  function AfiseazaPacienti()
  {
    global $conn;

    if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT id, description FROM mytab');
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_NUM)) != false) {
    echo $row[0] . "<br>\n";
    echo $row[1]->read(11) . "<br>\n"; // this will output first 11 bytes from DESCRIPTION
}

  //  $query = sprintf("SELECT * FROM PACIENTI");
    $result = oci_parse($conn, "SELECT * FROM PACIENTI");
    oci_execute($result);

    print "<table cols=5 border=1>\n";
    print "<th>CNP</th>\n";
  	print "<th>NUME</th>\n";
  	print "<th>PRENUME</th>\n";



    print "<table border='1'>\n";
        while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
        //print("<tr>\n");
        foreach ($row as $item) {
            print "    <td>" . $item . " : &nbsp;" . "</td>\n";
        }
        print "</tr>\n";
      }
    print "</table>\n";

//
//     $r = oci_execute($result);
//     if (!$r) {
//     $e = oci_error($result);
//     trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
//     }
//
//     print "<table border='1'>\n";
//     while ($row = oci_fetch_array($result, OCI_ASSOC+OCI_RETURN_NULLS)) {
//     print "<tr>\n";
//     foreach ($row as $item) {
//         print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
//     }
//     print "</tr>\n";
//   }
// print "</table>\n";
  }

?>
