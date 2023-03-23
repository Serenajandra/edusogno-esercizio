<?php
session_start();

// Recupero i dati del form
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['password_confirm'];

// Mi connetto al DB
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "users");
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Creo la query
$userId = $_SESSION["userId"];
$sql = "SELECT password FROM utenti WHERE $userId = `id`";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// var_dump($userId, $row);
// die();

// Verifico che la vecchia password inserita corrisponda alla password attuale dell'utente
$old_md5password = md5($old_password);

if (!password_verify($old_md5password, $row['password'])) {
    $error = "La vecchia password inserita non è corretta.";
}

// Verifica che la nuova password e la conferma nuova password siano uguali e rispettino i requisiti di complessità della password
if ($new_password !== $confirm_password) {
    $error = "Le nuove password non coincidono.";
} else if (strlen($new_password) < 8 || !preg_match('/[A-Z]/', $new_password) || !preg_match('/[a-z]/', $new_password)) {
    $error = "La nuova password deve essere di almeno 8 caratteri e contenere almeno una lettera maiuscola e una lettera minuscola.";
}

// Se la nuova password supera la verifica, aggiorna la password dell'utente nel database
if (!isset($error)) {
    $new_md5password = md5($new_password);

    $sql = "UPDATE utenti SET password = '$new_md5password' WHERE $userId = `id`";
    $result = $conn->query($sql);
    mysqli_close($conn);
    echo "Modifica della password avvenuta con successo.";
}
var_dump($old_password, $new_password, $old_md5password, $new_md5password);
