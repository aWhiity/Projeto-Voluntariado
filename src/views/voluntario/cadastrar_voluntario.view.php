<?php
    $titulo = "Cadastrar Voluntario";
    include '../header.php';
?>
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
<?php
    include '../footer.php';
?>