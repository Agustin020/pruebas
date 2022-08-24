<?php
session_start();
echo session_cache_expire();
if (isset($_SESSION['tiempo'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        Bienvenido
        <br>
        <button>amadowinwoaid</button>
    </body>

    </html>

<?php

} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        SESION CADUCADA. <a href="a.php">Iniciar</a>
    </body>

    </html>
<?php
}
?>