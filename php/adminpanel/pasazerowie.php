<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    $_SESSION['place'] = $_POST['place'];

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../assets/css/pasazerowie.css">
        <style>
        table {
        border-collapse: collapse;
        }
        table {
        border: 1px solid black;
        }
        </style>
    
    </head>
    <body>
       
       <main>
           <form method="POST" action="usuwaniepasazera.php">
            <div class="flight--container__finish"  id="flight_container_finish">
                <p class="flight--paragraph">PANEL ZARZĄDZANIA PASAŻEREM</p>
                <div class="flight--list__container">
                    <div class="flight--list">
                        <?php
                            include('../connect.php');
                            $curs = oci_new_cursor($conn);
                            $lotniska = $_SESSION['place']; 
                            $stid = oci_parse($conn, "begin PASAZEROWIE_DANE_EDIT(:nazwalot,:cursbv); end;");
                            oci_bind_by_name($stid,":cursbv", $curs, -1, OCI_B_CURSOR);
                            oci_bind_by_name($stid,":nazwalot",$lotniska);
                            oci_execute($stid);
                            oci_execute($curs);

                      ?>      
                                <table>
                                <tr>
                                    <th>IDPASAZERA</th>
                                    <th>IMIE</th>
                                    <th>NAZWISKO</th>
                                    <th>PESEL</th>
                                    <th>KRAJ POCHODZENIA</th>
                                    <th>NRTELEFONU</th>
                                    <th>OPCJA</th>
                                </tr>
                                <?php
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false):
                                ?>
                                <tr>
                                    <td><?php echo $row['IDPASAZERA'];?></td>
                                    <td><?php echo $row['IMIE'];?><input type="hidden" name="imie" value="<?php echo $row['IMIE'];?>"></td>
                                    <td><?php echo $row['NAZWISKO'];?><input type="hidden" name="naz" value="<?php echo $row['NAZWISKO'];?>"></td>
                                    <td><?php echo $row['PESEL'];?><input type="hidden" name="pes" value="<?php echo $row['PESEL'];?>"></td>
                                    <td><?php echo $row['KRAJPOCHODZENIA'];?><input type="hidden" name="kp" value="<?php echo $row['KRAJPOCHODZENIA'];?>"></td>
                                    <td><?php echo $row['NRTELEFONU'];?><input type="hidden" name="nrtel" value="<?php echo $row['NRTELEFONU'];?>"></td>
                                    <td><input type="radio" name="id" value="<?php echo $row['IDPASAZERA'];?>" required></td>
                                    
                                </tr>
                                
                            <?php endwhile;?>             
                            </table>
                            <?php
                            oci_free_statement($stid);
                            oci_free_statement($curs);
                            oci_close($conn);        
                            ?>
                    </div>
                </div>
                <button type="submit" name="usun">Usuń Pasażera</button>
                <button type="submit" name="modyfikuj">Modyfikuj Pasażera</button>
                <button type="submit" name="bagaze">Przejdź do Bagaży</button>
                
            </div>
            </form>
            <a href="lotnisko.php"><button>Wróc</button></a>
       </main>
        
       <script src="../assets/js/listSelect.js"></script>
    </body>
</html>
