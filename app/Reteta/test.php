<?php

function DeleteReteta1($idReteta)
{
  global $conn;

  $queryDelete = sprintf("DELETE FROM RETETA WHERE IDRETETA=%d", $idReteta);
  $resultDelete = oci_parse($conn, $queryDelete);
  oci_execute($resultDelete);

}
?>