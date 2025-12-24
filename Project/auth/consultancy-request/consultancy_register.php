<?php
include "../../db.php";

$name = $_POST['consultancy_name'];
$owner = $_POST['owner_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$municipality = $_POST['municipality'];


$services_array = $_POST['services']; 
$services = implode(", ", $services_array);


$document = $_FILES['document']['name'];
move_uploaded_file($_FILES['document']['tmp_name'], "uploads/" . $document);

$hashed = password_hash($password, PASSWORD_DEFAULT);


$check = "SELECT * FROM consultancies WHERE email='$email'";
$result = $conn->query($check);

if($result->num_rows > 0){

    header("Location: register.php?error=email_exists");
    exit;
} else {
    $sql = "INSERT INTO consultancies 
    (consultancy_name, owner_name, email, password, phone, municipality, services, document, status)
    VALUES
    ('$name','$owner','$email','$hashed','$phone','$municipality','$services','$document','pending')";

    if ($conn->query($sql)) {
        header("Location: register.php?msg=applied");
        exit;
    } else {
        header("Location: register.php?error=failed");
        exit;
    }
}
?>
