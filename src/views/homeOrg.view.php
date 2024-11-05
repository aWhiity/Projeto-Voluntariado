<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Organização</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .button {
            padding: 8px 16px;
            font-size: 1em;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            text-align: center;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .logout-container {
            text-align: right;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .section {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <?php 
        session_start();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: login.view.php");
            exit();
        }

        include('../models/homeOrg.model.php');
    ?>

    <div class="container">
        <h1>Bem-vindo(a), Organização!</h1>

        <div class="logout-container">
            <form action="../controllers/logout.controller.php" method="post">
                <button type="submit" class="button" style="background-color: red;">Sair</button>
            </form>
        </div>

        <div class="section">
            <h2>Pedidos de Ajuda</h2>
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Data Limite</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $pedido): ?>
                        <tr>
                            <td><?= htmlspecialchars($pedido['descricao']) ?></td>
                            <td><?= htmlspecialchars($pedido['status']) ?></td>
                            <td><?= htmlspecialchars($pedido['data_limite']) ?></td>
                            <td><button class="button">Visualizar</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2>Pedir Ajuda</h2>
            <form action="../controllers/novoPedido.controller.php" method="post">
                <label>Descrição:</label>
                <textarea name="descricao" required></textarea>
                
                <label>Data Limite:</label>
                <input type="date" name="data_limite">

                <label>Requisitos:</label>
                <textarea name="requisitos" required></textarea>
                
                <button type="submit" class="button">Enviar Pedido</button>
            </form>
        </div>

        <div class="section">
            <h2>Avaliar Voluntário</h2>
            <label for="volunteerName">Nome do Voluntário:</label>
            <select id="volunteerName">
                <option value="Voluntário A">Voluntário A</option>
                <option value="Voluntário B">Voluntário B</option>
            </select>
            <br><br>

            <label for="rating">Avaliação:</label>
            <select id="rating">
                <option value="5">5 - Excelente</option>
                <option value="4">4 - Muito bom</option>
                <option value="3">3 - Bom</option>
                <option value="2">2 - Regular</option>
                <option value="1">1 - Ruim</option>
            </select>
            <br><br>

            <button class="button" onclick="enviarAvaliacao()">Enviar Avaliação</button>
        </div>
    </div>

    <script>
        function enviarAvaliacao() {
            const volunteerName = document.getElementById('volunteerName').value;
            const rating = document.getElementById('rating').value;
            alert("Avaliação enviada para " + volunteerName + " com nota: " + rating);
        }
    </script>
</body>
</html>
