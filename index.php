<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bazy danych</title>
        <meta name="description" content="projekt">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/index.css">
    </head>
    <body>     
        <main>
            <a href="php/logowanie.php"><button class="log-in--button">Zaloguj sie</button></a>
            <form method="POST" action="php/page2.php">
                <div class="flight--container__start" id="flight_container_start">
                    <p class="flight--paragraph">Wybierz miejsce początkowe:</p>
                    <div class="flight--list__container">
                        <div class="flight--list">
                        <?php
                            include('php/connect.php');

                            $lotniska = [];
                            $result = oci_parse($conn, 'SELECT NAZWALOTNISKA FROM LOTNISKA');
                            oci_execute($result);

                            while ($row = oci_fetch_array($result, OCI_BOTH)):
                            array_push($lotniska,$row['NAZWALOTNISKA']);
                            ?>
                            <div class="radio--container"> <input type="radio" data-list="start" class="radio--button" name="airport" value="<?php echo $row['NAZWALOTNISKA'];?>">
                            <p><?php echo $row['NAZWALOTNISKA'];?></p></div>
                                
                            <?php endwhile;?>
                            <?php
                            oci_close($conn);
                            $_SESSION['lotniska'] = $lotniska;
                            ?>
                        </div>
                    </div>

                    <button type="submit" class="flight--button" id="flight_button_start" disabled data-list="start">Dalej</button>
                
                </div>
                </form>
            
        </main>

        <script src="assets/js/listSelect.js"></script>
    </body>
</html>