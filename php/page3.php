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
        <link rel="stylesheet" href="../assets/css/page2.css">
    </head>
    <body>
       
       <main>
           <form method="POST" action="page4.php">
            <div class="flight--container__finish"  id="flight_container_finish">
                <p class="flight--paragraph">Wybierz miejsce końcowe:</p>
                <div class="flight--list__container">
                    <div class="flight--list">
                        <?php
                            include('connect.php');
                            $curs = oci_new_cursor($conn);
                            $lotniska = $_POST['place']; 
                            $stid = oci_parse($conn, "begin BILETY_CURSOR(:nazwalot,:cursbv); end;");
                            oci_bind_by_name($stid,":cursbv", $curs, -1, OCI_B_CURSOR);
                            oci_bind_by_name($stid,":nazwalot",$lotniska);
                            oci_execute($stid);
                            oci_execute($curs);

                            while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false):
                            ?>
                                
                                <div class="radio--container"> <input type="radio" name="rodzajbiletu" value="<?php echo $row['RODZAJBILETU'];?>"><?php echo '<p class="ticket">'.$row['RODZAJBILETU'].'</p>'
                                .'<p class="price"> Cena biletu: '.$row['CENABILETU'].'</p>'?></div>

                            <?php endwhile;?>             
                            <?php
                            oci_free_statement($stid);
                            oci_free_statement($curs);
                            oci_close($conn);        
                            ?>
                    </div>
                </div>
                <button class="flight--button" id="flight_button_finish" disabled>Dalej</button> <p></p>
            </div>
            </form>
       </main>
        
        <script src="../assets/js/listSelect.js"></script>
    </body>
</html>

