<?php
    $titulo = "Menu Inicial";
    include './views/header.php';
?>
    <?php 
        session_start();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: login.view.php");
            exit();
        }

        include('../models/organizacao.model.php');
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
            </table>
        </div>

        <div class="section">
            <h2>Pedir Ajuda</h2>
            <main>
                <form action="../controllers/cadastrar_oportunidade.controller.php" method="POST">

                <label>Titulo: </label> <input type="text" name="titulo" value =<?= $titulo ?? '' ?> > <br>
                <label>Descrição: </label> <input type="text" name="descricao" value =<?= $descricao ?? '' ?> > <br>
                <label>Data do Evento: </label> <input type="text" name="data" value =<?= $data ?? '' ?> > <br>
                <label>Localização: </label> <input type="text" name="local" value =<?= $local ?? '' ?> > <br>

                <button>Enviar</button>
                </form>
            </main>
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
<?php
    include './views/footer.php';
?>
