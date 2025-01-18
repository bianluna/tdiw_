<?php
function connexionBD()
{
    $servidor = "127.0.0.1";
    $port = "5433";
    $DBnom = "postgres";
    $usuari = "postgres";
    $clau = "veronica";
    $connexio = pg_connect("host=$servidor port=$port dbname=$DBnom user=$usuari password=$clau") or die("Error connexio DB");
    return ($connexio);
}
?>