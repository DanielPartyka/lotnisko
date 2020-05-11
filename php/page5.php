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
        <link rel="stylesheet" href="../assets/css/page4.css">
    </head>
    <body>
        <main>
            <?php
                include('connect.php');
                //$pesel = $_SESSION['pesel'];
                $pesel = intval($_SESSION['pesel']);
                $place = $_SESSION['place'];
                $poj = oci_parse($conn, "begin :poj:= POJEMNOSCSAMOLOTU(:nazwalot); end;");
                oci_bind_by_name($poj,":nazwalot", $place);
                oci_bind_by_name($poj,":poj",$pojemnosc,9);
                oci_execute($poj);
                
                /*
                $curs = oci_new_cursor($conn);
                $pesel = $_SESSION['pesel'];
                $stid = oci_parse($conn, "begin BAGAZE_CURSOR(:pesel,:cursbv); end;");
                oci_bind_by_name($stid,":pesel",$pesel);
                oci_bind_by_name($stid,":cursbv", $curs, -1, OCI_B_CURSOR);
                oci_execute($stid);
                oci_execute($curs);
                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                    echo $row['IDPASAZERA'] . " ";
                }
                */
                $sqll = "SELECT IDPASAZERA FROM PASAZEROWIE WHERE PESEL=$pesel";
                $stmt = oci_parse($conn,$sqll);
                oci_execute($stmt);
                $row=oci_fetch_array($stmt);
                $_SESSION['idpasazera'] = $row[0];
                    
            ?>
            <!-- do atrybutu action trzeba dodać gdzie ostatnie dane mają się wysłać -->
            <?php
                if ($pojemnosc>0 || $pojemnosc==NULL):
            ?>
            <form method="POST" action="insertbagaze.php" class="client-data">         
                <h2>Uzupelnij dane o bagazu</h2>
                <h3><?php echo "Pojemność to samolotu to: " . $pojemnosc . " kg"?></h3>
                <label>
                    <input type="radio" name="bagaz" value="podręczny" required>
                    Podręczny
                </label>
                <label>
                    <input type="radio" name="bagaz" value="rejestrowany" required>
                    Rejestrowany
                </label>
                <input type="number" placeholder="Waga" step="0.1" name="waga" min="1" max="<?php
                if ($pojemnosc>30){
                    echo 30;
                }
                else{
                    echo $pojemnosc;
                } ?>"
                 required-title="Waga bagazu musi byc mniejsza niz 30kg" required>
                <button type="submitb">Zarezerwuj</button>        
            </form>
                <?php else:
                    header('Location: ../index.php');
                endif;
                    
                ?>
        </main>

    </body>
</html>