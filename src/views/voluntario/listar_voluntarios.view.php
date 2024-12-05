

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <title>Lista de Voluntários</title>
</head>
<body>
    <header><h1>Lista de Voluntários</h1></header>
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
</body>
</html>
