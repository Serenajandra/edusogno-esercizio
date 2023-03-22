<?php
session_start();
include __DIR__ . "/scripts/personal.php";

// if (!isset($_SESSION["password"])) {
//     header("Location: __DIR__ login-page.php");
// } else {
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
                <a href="logout.php">Logout</a>
            </div>
        </main>
    </div>

</body>

</html>
<?php
// }
?>