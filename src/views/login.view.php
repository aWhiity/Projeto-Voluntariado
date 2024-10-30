<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <?php 
        //require('config.php');
    ?>

    <form method="post" action="../src/controllers/login.controller.php">

        <label>Usuário: </label><input type="text" name="usuario">
        <label>Senha: </label><input type="password" name="senha">

        <button>Enviar</button>

    </form>
    <p>Não possui uma conta?</p>
    <!-- link para cadastro -->
</body>
</html>