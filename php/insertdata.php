<?php
    if (!isset($_POST['submitp']))
    {
        include('connect.php');
        $imie = $_POST['name'];
        $nazwisko = $_POST['surname'];
        $pesel = $_POST['id_number'];
        $_SESSION['pesel'] = $pesel;
        $kraj = $_POST['country'];
        $tel = $_POST['phone'];
        $stid = oci_parse($conn,"begin DODAJPASAZERA(:im,:nazw,:pes,:krajp,:nrtel,:idb); end;");
        oci_bind_by_name($stid,':im',$imie);
        oci_bind_by_name($stid,':nazw',$nazwisko);
        oci_bind_by_name($stid,':pes',$pesel);
        oci_bind_by_name($stid,':krajp',$kraj);
        oci_bind_by_name($stid,':nrtel',$tel);
        oci_bind_by_name($stid,':idb',$_SESSION['idbiletu']);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
        header('Location: page5.php');
    }
?>