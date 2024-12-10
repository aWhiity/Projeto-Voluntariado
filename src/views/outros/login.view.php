<?php
    $titulo = "Login";
    include './views/header.php';
?>
       
       <form method="post" action=".//">
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
        <p>Não possui uma conta? <a href="./cadastro-organizacao">Cadastre-se aqui</a></p>
    
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Email ou senha inválidos!</p>
        <?php endif; ?>
    </main>
<?php
    include './views/footer.php';
?>
