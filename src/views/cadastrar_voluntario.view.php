<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <title>Cadastro Voluntario</title>
</head>
<body>
    <header><h1>Cadastro de Voluntario</h1></header>
    <main>
        <form action="/Projeto-Voluntariado/src/controllers/cadastrar_voluntario.controller.php" method="POST">

            <label>Nome: </label> <input type="text" name="nome" value =<?= $nome ?? '' ?> > <br>
            <label>CPF/CNPJ: </label> <input type="text" name="cpf" value =<?= $cpf ?? '' ?> > <br>
            <label>Telefone: </label> <input type="text" name="telefone" value =<?= $telefone ?? '' ?> > <br>
            <label>Email: </label> <input type="text" name="email" value =<?= $email ?? '' ?> > <br>
            <label>Senha: </label> <input type="text" name="senha" value =<?= $senha ?? '' ?> > <br>
            <button>Enviar</button>
        </form>
    </main>
</body>
</html>