<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <title>Cadastro Organização</title>
</head>
<body>
    <header><h1>Cadastro de Organização</h1></header>
    <main>
        <form action="organizacao_form.controller.php" method="POST" >

            <label>Nome: </label> <input type="text" name="nome" value =<?= $nome ?? '' ?> > <br>
            <label>CPF/CNPJ: </label> <input type="text" name="nr_documento" value =<?= $nr_documento ?? '' ?> > <br>
            <label>Endereço: </label> <input type="text" name="endereço" value =<?= $endereco ?? '' ?> > <br>
            <label>Telefone: </label> <input type="text" name="telefone" value =<?= $telefone ?? '' ?> > <br>
            <label>Email: </label> <input type="text" name="email" value =<?= $email ?? '' ?> > <br>
            <label>Descrição: </label> <input type="text" name="descricao" value =<?= $descricao ?? '' ?> > <br>
            <label for="areaAcao">Área de ação: </label> <select id="areaAcao" name="areaAcao" >
                <option value="">Selecione um tipo de ação</option>
                <option value="educacao">Educação</option>
                <option value="saude">Saúde</option>
                <option value="meio_ambiente">Educação</option>
            </select>

            <button>Enviar</button>
        </form>
    </main>
</body>
</html>