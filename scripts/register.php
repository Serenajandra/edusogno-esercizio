<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mi connetto al DB
    $conn = mysqli_connect("localhost", "root", "root", "users");
    // var_dump($conn);

    // verifico la connessione
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Hash della password
        // $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $md5password = md5($password);

        // Imposto il costo del lavoro per la funzione di hash bcrypt (10 è un valore ragionevole per la maggior parte delle applicazioni)
        // $cost = 10;

        // Genero un salt casuale (nota che bcrypt genera il salt in modo automatico, ma è comunque una buona pratica generarne uno in modo esplicito)
        // $salt = strtr(base64_encode(random_bytes(16)), '+', '.');

        // Concateno il salt alla password inserita dall'utente
        // $hashed_password = crypt($password, '$2y$' . $cost . '$' . $salt);
        // var_dump($name, $surname, $email, $password_hashed);


        // Verifica se l'indirizzo e-mail è già presente nel database
        $sqlMail = "SELECT * FROM `utenti` WHERE `email` = '$email'";
        $resultMail = mysqli_query($conn, $sqlMail);

        if (mysqli_num_rows($resultMail) > 0) {
            // L'indirizzo e-mail è già presente nel database
            // Mostra un messaggio di errore all'utente
            echo 'L`indirizzo e-mail inserito è già in uso. Torna alla pagina di <a href="../register-page.php">registrazione</a> e scegline un altro.';
            return;
        }
        // Scrivo la query e la eseguo
        $sql = "INSERT INTO utenti (nome, cognome, email, password)
        VALUES ('$name', '$surname', '$email', '$md5password')";
        // var_dump($sql);

        // verifico l'esito dell'inserimento nel db
        if ($conn->query($sql) === TRUE) {
            $num_rows = $conn->affected_rows;
            if ($num_rows > 0) {
                echo 'Dati inseriti correttamente nel database. Ora puoi andare alla pagina di <a href="../login-page.php">Login</a>';
            } else {
                echo "Errore durante l'inserimento dei dati: nessuna riga è stata inserita";
            }
        } else {
            echo "Errore durante l'inserimento dei dati: " . $conn->error;
        }
        // header("Location: ./login-page.php", true, 302);
        // Chiudo la connessione al db
        $conn->close();
    }
}
