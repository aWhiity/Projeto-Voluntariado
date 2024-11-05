<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <title>Editar Voluntário</title>
</head>
<body>
    <header><h1>Editar Voluntário</h1></header>
    <main>
        <?php
        require_once 'D:\\xampp\\htdocs\\Projeto-Voluntariado\\src\\models\\voluntario.model.php';

        $id = $_GET['id'] ?? null;
        $voluntarioModel = new VoluntarioModel();
        $inscricao = $voluntarioModel->selecionarPorId($id);

        if (!$inscricao) {
            echo "<p>Voluntário não encontrado.</p>";
            exit;
        }

        $nome = $inscricao['nome'];
        $cpf = $inscricao['cpf'];
        $telefone = $inscricao['telefone'];
        $email = $inscricao['email'];
        ?>

        <form action="/Projeto-Voluntariado/src/controllers/editar_voluntario.controller.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">

            <label>Nome: </label> 
            <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>"> <br>
            
            <label>CPF/CNPJ: </label> 
            <input type="text" name="cpf" value="<?= htmlspecialchars($cpf) ?>"> <br>
            
            <label>Telefone: </label> 
            <input type="text" name="telefone" value="<?= htmlspecialchars($telefone) ?>"> <br>
            
            <label>Email: </label> 
            <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"> <br>
            
            <button type="submit">Salvar Alterações</button>
        </form>
    </main>
</body>
</html>
