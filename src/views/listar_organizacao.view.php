<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Lista de Organizações</h1>
    </header>
    <main>
        <?php 
        require_once 'C:\\xampp\\htdocs\\Projeto-Voluntariado\\src\\controllers\\listar_organizacao.controller.php';
        $controller = new ListarOrganizacaoController();
        $organizacoes = $controller->listar();
        

        if (empty($organizacoes)):
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Email</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                </tr>
            </tbody>
        </table>
        <?php else:?>
            <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Email</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($organizacoes as $organizacao){
                        echo "<tr>";
                        echo "<td>{$organizacao['id']}</td>";
                        echo "<td>{$organizacao['nome']}</td>";
                        echo "<td>{$organizacao['cnpj']}</td>";
                        echo "<td>{$organizacao['telefone']}</td>";
                        echo "<td>{$organizacao['endereco']}</td>";
                        echo "<td>{$organizacao['email']}</td>";
                        echo "<td>{$organizacao['descricao']}</td>";
                        echo "<td>{$organizacao['data_criacao']}</td>";
                        echo "</tr>";
                    }
                endif;
                ?>
                
            </tbody>
        </table>
    </main>
</body>
</html>