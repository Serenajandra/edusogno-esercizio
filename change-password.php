<?php
session_start();
include __DIR__ . "/scripts/password.php";
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
    <?php
    include('./partials/header.php');
    // Genero un token univoco
    // $token = uniqid();
    // creo il token
    // $length = 16; // Adjust length to fit your new paranoia level. 16 is probably a sane default and the same length as md5 (if you are migrating from a method that uses it)
    // $token = bin2hex(random_bytes($length)); // bin2hex output is url safe.
    // var_dump($token);
    ?>
    <main>
        <div class="wrapper">
            <h2 class="title">Reimposta la tua password:</h2>
            <div class="form-wrapper">
                <form method="post" action="scripts/password.php" onsubmit="return validaChangePassword(this)">
                    <div class="form-row">

                        <div class="form_group">
                            <label for="old_password" class="">Inserisci la vecchia password</label>
                            <input type="password" id="old_password" name="old_password" required>
                        </div>
                        <div class="form_group">
                            <label for="new_password" class="">Inserisci la nuova password</label>
                            <input type="password" id="new_password" name="new_password" required>
                        </div>
                        <div class="form_group">
                            <label for="password_confirm">Conferma la nuova password</label>
                            <input type="password" id="password_confirm" name="password_confirm" required>
                        </div>

                        <?php echo '<input type="hidden" name="token" value="' . $token . '">';

                        ?>

                        <div>
                            <button class="submit" type="submit">
                                Reimposta la password
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </main>
    <script src="./assets/js/script.js"></script>
</body>

</html>