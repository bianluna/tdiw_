<?php
require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_saveUserInDB.php';

$connection = connexionBD();
session_start();

$image = "path";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
if (isset($_SESSION['image_path']) && $_SESSION['image_path'] != "path") {
    $image = $_SESSION['image_path'];
} else if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image'])) {

    $file = $_FILES['profile_image'];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    $filesAbsolutePath = '/home/TDIW/tdiw-g6/public_html/uploadedFiles/';
    $fileName = preg_replace('/[^a-zA-Z0-9_-]/', '', basename($file['name']));

    $destinationPath = $filesAbsolutePath . uniqid() . '_' . $fileName;
    $image = $destinationPath;

    if (!in_array($file['type'], $allowedTypes)) {
        die("Error: Solo se permiten imágenes (JPG, PNG, GIF).");
    }
    if (move_uploaded_file($file['tmp_name'], $destinationPath)) {
        echo "Fitxer desat correctament!";
    } else {
        echo "Error al moure el fitxer.";
    }
} else {
    echo "Error al pujar el fitxer.";
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];

echo "Nombre: $name, Correo: $email<br>";

$result_insert = updateUserInDB($connection, $name, $email, $password, $address, $city, $postal_code, $phone_number, $image, $user_id);

if ($result_insert) {
    echo "<script>alert('Cuenta actualizada con éxito');</script>";
    $_SESSION['image_path'] = $image;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_address'] = $address;
    $_SESSION['user_city'] = $city;
    $_SESSION['user_postal_code'] = $postal_code;
    $_SESSION['user_phone_number'] = $phone_number;
} else {
    echo "<script>alert('Error al actualizar la cuenta');</script>";
}

pg_close($connection);

header('Location: ../index.php');
exit;

?>