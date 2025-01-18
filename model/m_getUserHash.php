<?php
function getUserHash($connection, $user_id)
{
    $sql_email = "SELECT password AS password_hash, name AS user_name FROM users WHERE user_id='$user_id'";
    $query_hash = pg_query($connection, $sql_email);
    
    $result_hash = pg_fetch_assoc($query_hash); 

    return ($result_hash);
  }
?>

