<?php
    if (!isset($_POST['submitb']))
    {
        include('connect.php');

        $rodzajbagazu = $_POST['bagaz'];
        $wagabagazu = $_POST['waga'];
        $idpasazera = $_SESSION['idpasazera'];
        $stid = oci_parse($conn,"begin DODAJBAGAZE(:typb,:wb,:pid); end;");
        oci_bind_by_name($stid,':typb',$rodzajbagazu);
        oci_bind_by_name($stid,':wb',$wagabagazu);
        oci_bind_by_name($stid,':pid',$idpasazera);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
        session_destroy();
        header('Location: ../index.php');
    }

?>