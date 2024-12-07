<?php
    $titulo = "Cadastrar Organização";
    include './views/header.php';
?>

<main>
    <form action="/Projeto-Voluntariado/src/controllers/cadastrar_organizacao.controller.php" method="POST">

        <label>Nome: </label> <input type="text" name="nome" value =<?= $nome ?? '' ?> > <br>
        <label>CPF/CNPJ: </label> <input type="text" name="nr_documento" value =<?= $cpf ?? '' ?> > <br>
        <label>Endereço: </label> <input type="text" name="endereco" value =<?= $endereco ?? '' ?> > <br>
        <label>Telefone: </label> <input type="text" name="telefone" value =<?= $telefone ?? '' ?> > <br>
        <label>Email: </label> <input type="text" name="email" value =<?= $email ?? '' ?> > <br>
        <label>Senha: </label> <input type="text" name="senha" value =<?= $senha ?? '' ?> > <br>
        <label>Descrição: </label> <input type="text" name="descricao" value =<?= $descricao ?? '' ?> > 

        <button>Enviar</button>
    </form>
</main>
<?php
    include './views/footer.php';
?>