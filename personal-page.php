<?php
session_start();
include __DIR__ . "/scripts/personal.php";
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
    <div class="container">
        <?php
        include('./partials/header.php');
        ?>
        <main>
            <div class="dashboard">
                <ul>
                    <li>
                        <div>
                            <form method="POST" action="scripts/send-mail.php">
                                <input type="hidden" value="<?php echo $_SESSION["email"]; ?>" name="email">
                                <button class="submit" type="submit" name="send_email">Richiedi modifica password</button>
                            </form>

                        </div>
                    </li>
                    <!-- <li><a href="change-password.php">Reimposta la tua password</a></li> -->
                    <li> <a class="dashboard-link" href="logout.php">Logout</a></li>
                    <!-- <li><a class="submit" href=""></a>Altri eventi</li> -->

                </ul>
            </div>
            <div class="wrapper">
                <h2 class="title text-center">
                    Ciao <?php
                            echo $_SESSION["username"];
                            ?>

                    <?php echo $_SESSION["userSurname"];
                    ?>, ecco i tuoi eventi:
                </h2>
                <div class="row centered">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nome_evento = $row['nome_evento'];
                        $data_evento = $row['data_evento'];
                    ?>
                        <!-- // Creazione della card con i dati dell'evento -->
                        <div class="card">
                            <h4 class="text-center"><?php echo $nome_evento; ?></h4>
                            <p class="text-center"><?php echo $data_evento; ?></p>
                            <button class="submit">Join</button>
                        </div>
                    <?php
                    }
                    ?>
                </div>


            </div>

        </main>
    </div>

</body>

</html>