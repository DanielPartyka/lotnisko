<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    $_SESSION['rodzajbiletu'] = $_POST['rodzajbiletu'];
    //Wszystkie wybory użytkownika są w zmiennych $_SESSION
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/page4.css">
    </head>
    <body>
        <main>
            <?php
                include('connect.php'); 
                $curs = oci_new_cursor($conn);
                $bilet = $_POST['rodzajbiletu'];
                $place = $_SESSION['place']; 
                $stid = oci_parse($conn, "begin ID_BILETU(:lot,:rb,:cursbv); end;");
                oci_bind_by_name($stid,":lot",$place);
                oci_bind_by_name($stid,":rb",$bilet);
                oci_bind_by_name($stid,":cursbv", $curs, -1, OCI_B_CURSOR);
                oci_execute($stid);
                oci_execute($curs);
                $row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS);
                $_SESSION['idbiletu'] = $row['IDBILETU'];
                

            ?>
            <!-- do atrybutu action trzeba dodać gdzie ostatnie dane mają się wysłać -->
            <form method="POST" action="insertdata.php" class="client-data">
                        
                <h2><?php echo $_POST['rodzajbiletu'];?></h2>
                <h2><?php echo  "Numer twojego biletu to: " .  $_SESSION['idbiletu'];?></h2>
                <p>Proszę uzupełnić dane</p>

                <input type="text" placeholder="Imie" name="name" required-title="Podaj poprawne imie" required>

                <input type="text" placeholder="Nazwisko" name="surname" required required-title="Podaj poprawne nazwisko" required>

                <input type="text" placeholder="Pesel" name="id_number" pattern=".{11}" required-title="Pesel musi mieć 11 cyfr" required>

                <input type="text" placeholder="Kraj pochodzenia" name="country" required-title="Podaj odpowiedni kraj" required>

                <input type="text" placeholder="Numer kontaktowy" name="phone" pattern=".{9}" required-title="Numer telefonu ma 9 cyfr" required>

                <button type="submitp">Zarezerwuj</button>
                    
            </form>
            <?php
                oci_free_statement($stid);
                oci_free_statement($curs);
                oci_close($conn);        
            ?>
        </main>

    </body>
</html>