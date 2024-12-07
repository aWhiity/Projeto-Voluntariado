
<?php
    $titulo = "Lista de Voluntarios";
    include '../header.php';
?>
<main>
    <?php
    require_once '..\\controllers\\listar_voluntarios.controller.php';

    $controller = new ListarVoluntariosController();
    $inscricoes = $controller->listar();

    if (empty($inscricoes)) {
        echo "<p>Nenhum voluntário cadastrado.</p>";
    } else {
        echo "<table>";
        echo "<thead>";
        echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>Email</th><th>Data de Criação</th><th>Ações</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        
        foreach ($inscricoes as $inscricao) {
            echo "<tr>";
            echo "<td>{$inscricao['id']}</td>";
            echo "<td>{$inscricao['nome']}</td>";
            echo "<td>{$inscricao['cpf']}</td>";
            echo "<td>{$inscricao['telefone']}</td>";
            echo "<td>{$inscricao['email']}</td>";
            echo "<td>{$inscricao['data_criacao']}</td>";
            echo "<td><a href='editar_voluntario.view.php?id={$inscricao['id']}'>Editar</a></td>";
            echo "</tr>";
        }
        
        echo "</tbody>";
        echo "</table>";
    }
    ?>
</main>
<?php
    include '../footer.php';
?>
