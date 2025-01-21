<?php
function saveUserInDB($connection, $name, $email, $password, $address,  $city,  $postal_code, $phone_number, $image)
{
  $sql_user = "
        INSERT INTO users (name, email, password, address, city, postal_code, phone_number, image_path)
        VALUES ($1, $2, $3, $4, $5, $6, $7, $8)
    ";

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $params = [$name, $email, $hashedPassword, $address,  $city,  strval($postal_code), $phone_number, $image];
  $result = pg_query_params($connection, $sql_user, $params);

  $user_id = pg_fetch_result(pg_query($connection, "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1"), 0);

  if ($result) {
    return true; 
  } else {
    error_log("Database insert error: " . pg_last_error($connection));
    echo pg_last_error($connection);
    return false; 
  }
}

function updateUserInDB($connection, $name, $email, $password, $address,  $city,  $postal_code, $phone_number, $image, $user_id)
{
  $sql_user = "
        UPDATE users
        SET name = $1, email = $2, password = $3, address = $4, city = $5, postal_code = $6, phone_number = $7, image_path = $8
        WHERE user_id = $9
    ";

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $params = [$name, $email, $hashedPassword, $address,  $city,  strval($postal_code), $phone_number, $image, $user_id];
  $result = pg_query_params($connection, $sql_user, $params);

  if ($result) {
    return true; 
  } else {
    error_log("Database insert error: " . pg_last_error($connection));
    echo pg_last_error($connection);
    return false;
  }

}

?>