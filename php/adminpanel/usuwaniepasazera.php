<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['idPasa'] = $_POST['id'];
    $_SESSION['iMie'] = $_POST['imie'];
    $_SESSION['nazw'] = $_POST['naz'];
    $_SESSION['pesel'] = $_POST['pes'];
    $_SESSION['numertel'] = $_POST['nrtel'];
    $_SESSION['Krajp'] = $_POST['kp'];
    if (isset($_POST['usun']))
    {
        include('../connect.php');
        $stid = oci_parse($conn,"begin DELETEPASAZER(:idp); end;");
        oci_bind_by_name($stid,":idp",$_SESSION['idPasa']);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
        header('Location: lotnisko.php');
        session_destroy();

    }
    else if (!isset($_POST['modyfikuj']))
    {
        header('Location: bagaze.php');
    }
    else{
        header('Location: modyfikacjapasazera.php');
    }

?>