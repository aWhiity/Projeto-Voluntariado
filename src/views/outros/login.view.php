
<?php
    $titulo = "Login";
    include '../header.php';
?>
    <main>
        <form method="post" action="../controllers/login.controller.php">
            <label>Email: </label>
            <input type="email" name="email" required>
            <label>Senha: </label>
            <input type="password" name="senha" required>
            <br>
            <input type="checkbox" id="voluntarioCheck" name="voluntario" />
            <label for="voluntarioCheck">Sou voluntário</label>
            <br>
            <button type="submit">Enviar</button>
        </form>

        <p>Não possui uma conta? <a href="../views/cadastrar_voluntario.view.php">Cadastre-se aqui</a></p>
        
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Email ou senha inválidos!</p>
        <?php endif; ?>
    </main>
<?php
    include '../footer.php';
?>
