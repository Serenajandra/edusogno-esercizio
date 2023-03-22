<?php
session_start();
include __DIR__ . "/scripts/register.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Edusogno</title>
</head>

<body>

    <div class="container">
        <?php
        include __DIR__ . "./partials/header.php";
        ?>
        <main>

            <div class="wrapper">
                <h2 class="title">Crea il tuo account</h2>

                <div class="form-wrapper">
                    <form action="scripts/register.php" method="POST">
                        <div class="form-row">

                            <div class="form_group">
                                <label for="name" class="">Inserisci il nome</label>
                                <input type="text" name="name" id="name" class="">
                            </div>
                            <div class="form_group">
                                <label for="surname" class="">Inserisci il cognome</label>
                                <input type="text" name="surname" id="surname" class="">
                            </div>
                            <div class="form_group">
                                <label for="email" class="">Inserisci l'email</label>
                                <input type="email" name="email" id="email" class="">
                            </div>
                            <div class="form_group">
                                <label for="password" class="">Inserisci la password</label>
                                <input type="password" name="password" id="password" class="">
                            </div>
                            <div>
                                <button class="submit" type="submit">
                                    Registrati
                                </button>
                            </div>

                            <div class="account-link">
                                <a href="login-page.php">Hai già un account? Accedi</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>