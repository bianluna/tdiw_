<?php

require_once __DIR__ . '/../model/conectarBD.php';
require_once __DIR__ . '/../model/m_saveUserInDB.php';

$connection = connexionBD();

$image="path";

if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image'])) {

    $file=$_FILES['profile_image'];
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



$result_insert = saveUserInDB($connection, $name, $email, $password, $address,  $city, $postal_code, $phone_number, $image);
echo "<script>alert('Cuenta creada con éxito');</script>";

pg_close($connection);

header('Location: ../index.php');
exit;


?>
