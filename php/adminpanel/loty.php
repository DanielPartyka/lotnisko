<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    $_SESSION['airport_1'] = $_POST['airport'];

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../assets/css/page2.css">
    </head>
    <body>
       
       <main>
           <form method="POST" action="pasazerowie.php">
            <div class="flight--container__finish"  id="flight_container_finish">
                <p class="flight--paragraph">Wybierz Miejsce Końcowe</p>
                <div class="flight--list__container">
                    <div class="flight--list">
                        <?php
                            include('../connect.php');
                            $curs = oci_new_cursor($conn);
                            $lotniska = $_POST['airport']; 
                            $lb = oci_parse($conn, "begin :lmiejsc:= LICZBABILETOW(:nazwalot); end;");
                            $stid = oci_parse($conn, "begin LOTNISKO_CURSOR(:nazwalot,:cursbv); end;");
                            oci_bind_by_name($stid,":cursbv", $curs, -1, OCI_B_CURSOR);
                            oci_bind_by_name($stid,":nazwalot",$lotniska);
                            oci_execute($stid);
                            oci_execute($curs);

                            while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false):
                                $miejscedocelowe = $row['MIEJSCEDOCELOWE'];
                                oci_bind_by_name($lb,":nazwalot", $miejscedocelowe);
                                oci_bind_by_name($lb,":lmiejsc",$lmiejsc,6);
                                oci_execute($lb);
                            ?>
                                <?php
                                    if ($lmiejsc>0):
                                ?>
                                <div class="radio--container"> <input type="radio" name="place" value="<?php echo $row['MIEJSCEDOCELOWE'];?>">
                                <?php echo '<p class="destination">'.$row['MIEJSCEDOCELOWE'].'</p>'. 
                                '<p class="start_date">Data '.$row['DATASTARTU'].'</p>'.
                                '<p class="free_place">Liczba dostępnych miejsc '.$lmiejsc.'</p>'?></div>

                                    <?php endif;?>
                            <?php endwhile;?>             
                            <?php
                            oci_free_statement($stid);
                            oci_free_statement($curs);
                            oci_free_statement($lb);
                            oci_close($conn);        
                            ?>
                    </div>
                </div>
                <a href="../index.php"><button type="button" class="flight--button__back">Powrót</button></a>
                <button class="flight--button" id="flight_button_finish" disabled>Dalej</button> 
            </div>
            </form>
       </main>
        
       <script src="../../assets/js/listSelect.js"></script>
    </body>
</html>