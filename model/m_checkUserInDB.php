<?php
function checkUserInDB($connexio, $email)
{
    $sql_email = "SELECT user_id, password AS password_hash FROM users WHERE email='$email'";
    //print("SQL Query: " . $sql_email . "\n");
    $query_user = pg_query($connexio, $sql_email);
    
    // Fetch rows
    $result_user_id = pg_fetch_assoc($query_user)['user_id']; //FIXME: In the table email must be unique;

    return ($result_user_id); 
  }
?>

