<?php
// controller/saveUser.php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_saveUserInDB.php';

$connection = connexionBD();

// Recoger los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];

// Mostrar datos para depuración (opcional, eliminar en producción)
echo "Nombre: $name, Correo: $email<br>";

// Insertar usuario en la base de datos
$result_insert = saveUserInDB($connection, $name, $email, $password, $address,  $city, $postal_code, $phone_number);
echo "<script>alert('Cuenta creada con éxito');</script>";
// Mostrar resultado de la inserción (opcional, eliminar en producción)
echo "Resultado de la inserción: ";
print_r($result_insert);



// Cerrar conexión
pg_close($connection);

?>
