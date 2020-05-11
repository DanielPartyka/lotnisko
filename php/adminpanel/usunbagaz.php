<?php
    if (isset($_POST['usunb']))
    {
        include('../connect.php');
        $idbag = $_POST['idbagazu'];
        $stid = oci_parse($conn,"begin USUNBAGAZ(:idp); end;");
        oci_bind_by_name($stid,":idp",$idbag);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
        header('Location: lotnisko.php');
    }
    else{
        header('Location: modbagaz.php');
    }

?>