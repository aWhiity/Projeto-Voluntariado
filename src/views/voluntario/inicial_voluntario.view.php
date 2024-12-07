<?php
    $titulo = "Menu Inicial";
    include '../header.php';
?>
    <?php 
        session_start();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: login.view.php");
            exit();
        }
    ?>
    <div class="container">
        <h1>Bem-vindo(a)!</h1>
        <div class="logout-container">
            <form action="../controllers/logout.controller.php" method="post">
                <button type="submit" class="button" style="background-color: red;">Sair</button>
            </form>
        </div>
        
        <h2>Organizações que você ajudou</h2>
           
                    <?php
                        require_once '..\\controllers\\home_voluntario.controller.php';

                        $controller = new HomeVoluntarioController();
                        $inscricoes = $controller->listar();

                        if (empty($inscricoes)) {
                            echo "<p>Você ainda não ajudou nenhuma organização.</p>";
                        } else {
                            echo "<table>";
                            echo "<thead>";
                            echo "<tr><th>Nome</th><th>Titulo</th><th>Descricao</th><th>Localizacao</th><th>Data</th>";
                            echo "</thead>";
                            echo "<tbody>";
                            
                            foreach ($inscricoes as $inscricao) {
                                echo "<tr>";
                                echo "<td>{$inscricao['nome']}</td>";
                                echo "<td>{$inscricao['titulo']}</td>";
                                echo "<td>{$inscricao['descricao']}</td>";
                                echo "<td>{$inscricao['localizacao']}</td>";
                                echo "<td>{$inscricao['data_criacao']}</td>";
                                echo "</tr>";
                            }
                            
                            echo "</tbody>";
                            echo "</table>";
                        }
                    ?>


        <div class="rating">
            <h2>Avalie uma Organização</h2>
            <label for="orgName">Nome da Organização:</label>
            <select id="orgName">
                <option value="Organização A">Organização A</option>
                <option value="Organização B">Organização B</option>
            </select>
            <br><br>

            <label for="rating">Sua Avaliação:</label>
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
        function contatarOrganizacao(nomeOrg) {
            alert("Contatando " + nomeOrg + "...");
        }

        function enviarAvaliacao() {
            const nomeOrg = document.getElementById('orgName').value;
            const rating = document.getElementById('rating').value;
            alert("Avaliação enviada para " + nomeOrg + " com nota: " + rating);
        }
    </script>
<?php
    include '../footer.php';
?>
