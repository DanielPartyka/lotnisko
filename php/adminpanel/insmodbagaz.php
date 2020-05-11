<?php
    if (!isset($_POST['insertmodif'])){
        include('../connect.php');
        $stid = oci_parse($conn,"begin MODBAGAZE(:idb,:typb,:wagab); end;");
        $idbag = $_POST['insertmodif'];
        $wag = $_POST['waga'];
        $rbag = $_POST['bagaz'];
        oci_bind_by_name($stid,":idb",$idbag);
        oci_bind_by_name($stid,":typb",$rbag);
        oci_bind_by_name($stid,":wagab",$wag);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
        header('Location: lotnisko.php');
    }
?>