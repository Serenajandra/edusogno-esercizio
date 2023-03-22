<?php
session_start();
include __DIR__ . "./personal-page.php";

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "users");

// Mi connetto al DB
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
// var_dump($conn);

// Verifico la connessione
if ($conn && $conn->connect_error) {
    echo "Errore di connessione" . $conn->connect_error;
}

// Creo la query usando l'email inserita durante la sessione
$email = $_SESSION["email"];

$query = "SELECT * FROM `eventi` WHERE `attendees` LIKE '%$email%'";
$result = mysqli_query($conn, $query);

// Chiudo la connessione al DB
mysqli_close($conn);
