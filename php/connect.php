<?php

    try
    {
        $conn = oci_connect('danielpartyka','12345','localhost/orcl','AL32UTF8');
    }
    catch(Exception $e)
    {
        echo "Connection failed: ".$e->getMessege();
    }
    
?>