<?php
    if (!isset($_POST['aktup'])){
        include('../connect.php');
        $stid = oci_parse($conn,"begin UPDATEPASAZER(:idpas,:im,:nazw,:pes,:kraj,:tel); end;");
        
        oci_bind_by_name($stid,":idpas",$_POST['id']);
        oci_bind_by_name($stid,":im",$_POST['name']);
        oci_bind_by_name($stid,":nazw",$_POST['surname']);
        oci_bind_by_name($stid,":pes",$_POST['id_number']);
        oci_bind_by_name($stid,":kraj",$_POST['country']);
        oci_bind_by_name($stid,":tel",$_POST['country']);
        oci_bind_by_name($stid,":tel",$_POST['phone']);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
        session_destroy();
        header('Location: lotnisko.php');
    }
?>