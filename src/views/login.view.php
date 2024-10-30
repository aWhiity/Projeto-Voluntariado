<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form method="post" action="../controllers/login.controller.php">
        <label>Usuário: </label>
        <input type="text" name="usuario" required>
        <label>Senha: </label>
        <input type="password" name="senha" required>
        <button type="submit">Enviar</button>
    </form>

    <p>Não possui uma conta? <a href="../views/register.view.php">Cadastre-se aqui</a></p>
    
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">Usuário ou senha inválidos!</p>
    <?php endif; ?>
</body>
</html>
