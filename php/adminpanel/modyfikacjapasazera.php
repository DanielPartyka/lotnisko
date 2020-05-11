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
        <form method="POST" action="aktualizacjapasazera.php" class="client-data">
                        
                <h2><?php echo $_SESSION['iMie']  . " " . $_SESSION['nazw'];?></h2>
                <p>Możesz zmodyfikować dane</p>

                <input type="hidden" placeholder="id" name="id" value="<?php echo $_SESSION['idPasa']?>">

                <input type="text" placeholder="Imie" name="name" value="<?php echo $_SESSION['iMie']?>" required-title="Podaj poprawne imie" required>

                <input type="text" placeholder="Nazwisko" name="surname" value="<?php echo $_SESSION['nazw']?>" required required-title="Podaj poprawne nazwisko" required>

                <input type="text" placeholder="Pesel" name="id_number" value="<?php echo $_SESSION['pesel']?>" pattern=".{11}" required-title="Pesel musi mieć 11 cyfr" required>

                <input type="text" placeholder="Kraj pochodzenia" name="country" value="<?php echo $_SESSION['Krajp']?>" required-title="Podaj odpowiedni kraj" required>

                <input type="text" placeholder="Numer kontaktowy" name="phone" value="<?php echo $_SESSION['numertel']?>" pattern=".{9}" required-title="Numer telefonu ma 9 cyfr" required>

                <button type="aktup">Akutalizuj</button>
                    
            </form>
        </main>

    </body>
</html>