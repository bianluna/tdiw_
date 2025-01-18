<?php
function connexionBD()
{
    $servidor = "127.0.0.1";
    $port = "5432";
    $DBnom = "tdiw-g6";
    $usuari = "tdiw-g6";
    $clau = "Web1112!";
    $connexio = pg_connect("host=$servidor port=$port dbname=$DBnom user=$usuari password=$clau") or die("Error connexio DB");
    return ($connexio);
}
?>