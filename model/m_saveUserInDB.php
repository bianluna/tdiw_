<?php
function saveUserInDB($connection, $name, $email, $password, $address,  $city,  $postal_code, $phone_number)
{
  $sql_user = "
        INSERT INTO users (name, email, password, address, city, postal_code, phone_number)
        VALUES ($1, $2, $3, $4, $5, $6, $7)
    ";

  // Hash the password securely before storing
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Execute the prepared statement
  $params = [$name, $email, $hashedPassword, $address,  $city,  strval($postal_code), $phone_number];
  $result = pg_query_params($connection, $sql_user, $params);


  if ($result) {
    return true; // Successfully inserted
  } else {
    // Log the error for debugging purposes
    error_log("Database insert error: " . pg_last_error($connection));
    echo pg_last_error($connection);
    return false; // Failed to insert
  }
}
?>