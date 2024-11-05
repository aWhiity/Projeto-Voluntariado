

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
        require_once 'C:\\xampp\\htdocs\\Projeto-Voluntariado\\src\\controllers\\listar_voluntarios.controller.php';

        $controller = new ListarVoluntariosController();
        $voluntarios = $controller->listar();

        if (empty($voluntarios)) {
            echo "<p>Nenhum voluntário cadastrado.</p>";
        } else {
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>Email</th><th>Data de Criação</th><th>Ações</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            
            foreach ($voluntarios as $voluntario) {
                echo "<tr>";
                echo "<td>{$voluntario['id']}</td>";
                echo "<td>{$voluntario['nome']}</td>";
                echo "<td>{$voluntario['cpf']}</td>";
                echo "<td>{$voluntario['telefone']}</td>";
                echo "<td>{$voluntario['email']}</td>";
                echo "<td>{$voluntario['data_criacao']}</td>";
                echo "<td><a href='editar_voluntario.view.php?id={$voluntario['id']}'>Editar</a></td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        }
        ?>
    </main>
</body>
</html>
