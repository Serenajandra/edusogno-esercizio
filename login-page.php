<?php
session_start();
include('scripts/login.php');
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
                <h2 class="title">Hai già un account?</h2>

                <div class="form-wrapper">
                    <form action="scripts/login.php" method="POST">
                        <div class="form-row">

                            <div class="form_group">
                                <label for="email" class="">Inserisci l'e-mail</label>
                                <input type="email" name="email" id="email" class="">
                            </div>
                            <div class="form_group">
                                <label for="password" class="">Inserisci la password</label>
                                <input type="password" name="password" id="password" class="">
                            </div>
                            <div>
                                <button class="submit" type="submit">
                                    Accedi
                                </button>
                            </div>

                            <div class="account-link">
                                <a href="register-page.php">Non hai un profilo? Registrati</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>