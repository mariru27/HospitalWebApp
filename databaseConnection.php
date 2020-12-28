<?php
// Create connection to Oracle
global $conn;

$conn = oci_pconnect("student", "stud", "//localhost:1521/xe");

if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
// Close the Oracle connection
// oci_close($conn);
?>
