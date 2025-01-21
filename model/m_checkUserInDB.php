<?php
function checkUserInDB($connexio, $email)
{
  $sql_email = "SELECT user_id, password AS password_hash FROM users WHERE email='$email'";
  $query_user = pg_query($connexio, $sql_email);

  $result_user_id = pg_fetch_assoc($query_user)['user_id']; 

  return ($result_user_id);
}

function getUserData($connexio, $user_id)
{
  $sql_user = "SELECT * FROM users WHERE user_id='$user_id'";
  $query_user = pg_query($connexio, $sql_user);

  $result_user = pg_fetch_assoc($query_user);

  return ($result_user);
}
?>