<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    >
    <title>Document</title>
</head>
<body>
<?php 
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.view.php");
        exit();
    }
   
?>
    <h1>Bem vindo, <?=$_SESSION['usuario']?>!</h1>
    <p><a href="../views/login.view.php">Sair</a></p>


</body>
</html>