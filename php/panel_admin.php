<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Panel administratora</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/panel_admin.css">
    </head>
    <body>

        <div class="panel--container">
                <ul class="panel--list">
                    <li class="flights">
                        <p>Loty</p>
                        <form method="POST" action="#">
                            <div class="flight--container">
                                <?php
                                    include('connect.php');
                                    $result = oci_parse($conn, 'SELECT NRLOTU FROM LOTY');
                                    oci_execute($result);
                                    //$query = oci_parse($conn,$sql);
                                    //oci_execute($query);
                                    
                                    $amount = 0;
                                    while ($row = oci_fetch_array($result, OCI_BOTH))
                                    {
                                        echo '<label>'.$row['NRLOTU'].'<input type="radio" name="lot" value="'.$amount.'"></label>';
                                        $amount++;
                                    }
                                ?>
                                <button type="submit">Pokaż</button>
                            </div>
                            
                        </form>
                    </li>
                    <li class="airports"> 
                        <p>Lotniska</p>
                        <form method="POST" action="#">
                            <div class="airports--container">
                                <?php
                                    include('connect.php');
                                    $result = oci_parse($conn, 'SELECT NAZWALOTNISKA FROM LOTNISKA');
                                    oci_execute($result);
                                    $amount = 0;
                                    while ($row = oci_fetch_array($result, OCI_BOTH))
                                    {
                                        echo '<label>'.$row['NAZWALOTNISKA'].'<input type="radio" name="lotnisko" value="'.$amount.'"></label>';
                                        $amount++;
                                    }
                                ?>
                                <button type="submit">Pokaż</button>
                            </div>
                        </form>
                    </li>
                    <li class="passengers">
                    <p>Pasażerowie</p>
                    <form method="POST" action="#">
                        <div class="passengers--container">
                            <?php
                                include('connect.php');
                                $result = oci_parse($conn, 'SELECT IMIE,NAZWISKO FROM PASAZEROWIE');
                                oci_execute($result);
                                $amount = 0;
                                while ($row = oci_fetch_array($result, OCI_BOTH))
                                {
                                    echo '<label>'.$row['IMIE']." ".$row['NAZWISKO'].'<input type="radio" name="pasazerowie" value="'.$amount.'"></label>';
                                    $amount++;
                                   
                                }
                            ?>
                            <button type="submit">Pokaż</button>
                        </div>
                            </form>
                    </li>
                    <li class="employees">
                        <p>Pracownicy</p>
                        <form method="POST" action="#">
                        <div class="employees--container">
                            <?php
                                include('connect.php');
                                $result = oci_parse($conn, 'SELECT IMIE,NAZWISKO FROM PRACOWNICY');
                                oci_execute($result);
                                $amount = 0;
                                while ($row = oci_fetch_array($result, OCI_BOTH))
                                {
                                    echo '<label>'.$row['IMIE']." ".$row['NAZWISKO'].'<input type="radio" name="pracownicy" value="'.$amount.'"></label>';
                                    $amount++;
                                }
                            ?>
                            <button type="submit">Pokaż</button>
                        </div>
                            </form>
                    </li>
                    <li class="airplanes">
                        <p>Samoloty</p>
                        <form method="POST" action="#">
                        <div class="airplanes--container">
                            <?php
                                include('connect.php');
                                $result = oci_parse($conn, 'SELECT NAZWASAMOLOTU FROM SAMOLOTY');
                                oci_execute($result);
                                $amount = 0;
                                while ($row = oci_fetch_array($result, OCI_BOTH))
                                {
                                    echo '<label>'.$row['NAZWASAMOLOTU'].'<input type="radio" name="samoloty" value="'.$amount.'"></label>';
                                    $amount++;
                                   
                                }
                            ?>
                            <button type="submit">Pokaż</button>
                        </div>
                            </form>
                    </li>
                </ul>
            
            <div class="panel--graph">
                <div class="flights">
                        <ul class="flight--container">
                            <?php
                                if(isset($_POST['lot']))
                                {
                                    include('connect.php');
                                    $result = oci_parse($conn, 'SELECT * FROM LOTY');
                                    oci_execute($result);
                                    $amount = -1;
                                    while ($row = oci_fetch_array($result, OCI_BOTH))
                                    {
                                        $amount++;
                                        if($amount!=$_POST['lot'])
                                            continue;
                                        echo '<li>'."<p>Numer lotu: ".$row['NRLOTU']."</p><p> Data startu: ".$row['DATASTARTU']."</p><p> Godzina odlotu: ".$row['GODZINAODLOTU']."</p><p> Miejsce docelowe: ".$row['MIEJSCEDOCELOWE']."</p><p> Liczba miejsc: ".$row['LICZBAMIEJSC']."</p><p> Dostepnosc: ".$row['DOSTEPNOSC'].'</p></li>';
                                    }
                                }
                            ?>
                        </ul>
                          
                </div>
                <div class="airports">
                        <ul class="airports--container">
                            <?php
                                if(isset($_POST['lotnisko']))
                                {
                                    include('connect.php');
                                    $result = oci_parse($conn, 'SELECT * FROM LOTNISKA');
                                    oci_execute($result);
                                    $amount = -1;
                                    while ($row = oci_fetch_array($result, OCI_BOTH))
                                    {
                                        $amount++;
                                        if($amount!=$_POST['lotnisko'])
                                            continue;
                                        echo '<li><p> Nazwa lotniska: '.$row['NAZWALOTNISKA']."</p><p> Miejscowosc: ".$row['MIEJSCOWOSC']."</p><p> Zarzadca: ".$row['ZARZADCA'].'</p></li>';
                                    }
                                }
                            ?>
                        </ul>
                          
                </div>
                <div class="passager">
                        <ul class="passager--container">
                            <?php
                                if(isset($_POST['pasazerowie']))
                                {
                                    include('connect.php');
                                    $result = oci_parse($conn, 'SELECT * FROM PASAZEROWIE');
                                    oci_execute($result);
                                    $amount = -1;
                                    while ($row = oci_fetch_array($result, OCI_BOTH))
                                    {
                                        $amount++;
                                        if($amount!=$_POST['pasazerowie'])
                                            continue;
                                        echo '<li><p> Id pasazera: '.$row['IDPASAZERA']."</p><p> Imie: ".$row['IMIE']."</p><p> Nazwisko: ".$row['NAZWISKO']."</p><p> Pesel:  ".$row['PESEL']."</p><p> Kraj pochodzenia: ".$row['KRAJPOCHODZENIA']."</p><p> Numer telefonu: ".$row['NRTELEFONU'].'</p></li>';
                                    }
                                }
                            ?>
                        </ul>
                          
                </div>
                <div class="employees">
                        <ul class="employees--container">
                            <?php
                                if(isset($_POST['pracownicy']))
                                {
                                    include('connect.php');
                                    $result = oci_parse($conn, 'SELECT * FROM PRACOWNICY');
                                    oci_execute($result);
                                    $amount = -1;
                                    while ($row = oci_fetch_array($result, OCI_BOTH))
                                    {
                                        $amount++;
                                        if($amount!=$_POST['pracownicy'])
                                            continue;
                                        echo '<li><p> Id pracownika: '.$row['IDPRACOWNIKA']."</p><p> Imie: ".$row['IMIE']."</p><p> Nazwisko: ".$row['NAZWISKO']."</p><p> Pesel: ".$row['PESEL']."</p><p> Specjalizacja: ".$row['SPECJALIZACJAPRACOWNIKA']."</p><p> Numer telefonu: ".$row['NRTELEFONU'].'</p></li>';
                                    }
                                }
                            ?>
                        </ul>
                          
                </div>
                <div class="airplanes">
                        <ul class="airplanes--container">
                            <?php
                                if(isset($_POST['samoloty']))
                                {
                                    include('connect.php');
                                    $result = oci_parse($conn, 'SELECT * FROM SAMOLOTY');
                                    oci_execute($result);
                                    $amount = -1;
                                    while ($row = oci_fetch_array($result, OCI_BOTH))
                                    {
                                        $amount++;
                                        if($amount!=$_POST['samoloty'])
                                            continue;
                                        echo '<li><p> Id samolotu: '.$row['IDSAMOLOTU']."</p><p> Rodzaj samolotu: ".$row['RODZAJSAMOLOTU']."</p><p> Nazwa samolotu: ".$row['NAZWASAMOLOTU']."</p><p> Liczba miejsc: ".$row['LICZBAMIEJSC']."</p><p> Pojemosc bagazy: ".$row['POJEMNOSCBAGAZY'].'</p></li>';
                                    }
                                }
                            ?>
                        </ul>
                          
                </div>

            </div>
        </div>
        <form action="adminpanel/lotnisko.php">
        <input type="submit" value="Do zarządzania Pasazerami i biletami" />
        </form>
        <form action="../index.php">
        <input type="submit" value="Do kupna biletów" />
        </form>
       

        <script src="../assets/js/showMenu.js"></script>
    </body>

    </html>