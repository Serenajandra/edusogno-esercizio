<?php

session_start();

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

// Prendo i dati inseriti dall'utente
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cripto la password
    $md5password = md5($password);

    // Preparo la query e applico la funzione di bind
    $stmt = $conn->prepare("SELECT * FROM `utenti` WHERE `email` = ? AND `password` = ?");
    // var_dump(($stmt));

    $stmt->bind_param("ss", $email, $md5password);

    // Eseguo la query
    $stmt->execute();

    // Recupero i risultati
    $result = $stmt->get_result();
    // var_dump($result);

    // Controllo il risultato della query
    if ($result && $result->num_rows > 0) {
        // L'utente è stato trovato nel database, registro i suoi dati nella sessione corrente
        $user = $result->fetch_assoc();
        $_SESSION["userId"] = $user["id"];
        $_SESSION["username"] = $user["nome"];
        $_SESSION["userSurname"] = $user["cognome"];
        $_SESSION["email"] = $user["email"];

        // Chiudo la connessione al DB
        mysqli_close($conn);
        header("Location: ../personal-page.php", true, 302);
    } else {
        // L'utente non è stato trovato nel database
        $_SESSION["userId"] = null;
        $_SESSION["username"] = "";
        // Chiudo la connessione al DB
        mysqli_close($conn);
        echo ' Non è stata trovata alcuna corrispondenza. Verifica le tue credenziali e <a href="../login-page.php">ritenta</a> oppure <a href="../register-page.php">Registrati</a>';
        // echo "<script>alert('Nessun utente trovato. Verifica le tue credenziali o vai alla pagina di registrazione');</script>";
        // header("Location: ../login-page.php", true, 302);
    }
}
