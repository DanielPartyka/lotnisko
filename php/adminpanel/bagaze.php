<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../assets/css/page4.css">
    </head>
    <body>
        <main>
            <?php
                include('../connect.php');
                $curs = oci_new_cursor($conn);
                $idpasazera = intval($_SESSION['idPasa']); 
                $stid = oci_parse($conn, "begin MBAGAZE_CURSOR(:idpas,:cursbv); end;");
                oci_bind_by_name($stid,":cursbv", $curs, -1, OCI_B_CURSOR);
                oci_bind_by_name($stid,":idpas",$idpasazera);
                oci_execute($stid);
                oci_execute($curs);
                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false):        
            ?>
            <form method="POST" action="usunbagaz.php" class="client-data">         
                <h2>Bagaż Pasażera <?php echo $row['IMIE'] . " " . $row['NAZWISKO'];?></h2>
                <label>
                    <input type="hidden" name="idbagazu" value="<?php echo $row['IDBAGAZU'];?>">
                    <input type="radio" name="bagaz" value=" <?php echo $row['TYPBAGAZU'];?>" readonly>
                    <?php echo $row['TYPBAGAZU'];?>
                </label>
                <input type="number" placeholder=" <?php echo $row['WAGABAGAZU'];?>" readonly>
                 <?php endwhile;?>
                <button type="usunb" >Usuń Bagaż</button>
                <button type="modyfikujb" >Modyfikuj Bagaż</button>

            </form>
            
        </main>

    </body>
</html>