<?php
session_start();

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash della password
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

var_dump($name, $surname, $email, $password_hashed);

// Mi connetto al DB
$conn = mysqli_connect("localhost", "root", "root", "users");
// var_dump($conn);

// verifico la connessione
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Scrivo la query e la eseguo
$sql = "INSERT INTO utenti (nome, cognome, email, password)
        VALUES ('$name', '$surname', '$email', '$password_hashed')";
var_dump($sql);

// verifico l'sito dell'inserimento nel d
if ($conn->query($sql) === TRUE) {
    echo "Dati inseriti con successo!";
} else {
    echo "Errore: " . $sql . "<br>" . $conn->error;
}

// Chiudo la connessione al db
$conn->close();
