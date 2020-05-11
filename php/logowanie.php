<?php

    if(isset($_POST['submit']))
    {
        if($_POST['username'] == "admin" && $_POST['password'] == "admin")
        {
            header('LOCATION:panel_admin.php');
        }
    }

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Logowanie</title>
        <meta name="description" content="projekt">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/logowanie.css">
    </head>
    <body>     
        <main>

            <a href="../index.php"><button>Powrót</button></a>

            <div class="log-in--container">

            <form method="POST" action="#">
            
                <p> Logowanie się do panelu administratora </p>
                
                <input type="text" placeholder="Login" name="username">
                
                <input type="password" placeholder="Hasło" name="password">

                <input type="submit" value="Zaloguj się" name="submit">

            </form>

            </div>

        </main>
    </body>