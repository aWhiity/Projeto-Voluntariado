<?php
    $titulo = "Menu Inicial";
    include './views/header.php';
?>
        <main>
        <?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
                header("Location: login.view.php");
                exit();
            }
        ?>

        <div class="container">
            <h1>Bem-vindo(a), Organização!</h1>

        <div class="logout-container">
            <form action="./sair" method="post">
                <button type="submit" class="button" style="background-color: red;">Sair</button>
            </form>
        </div>

        <div class="section">
            <h2>Pedidos de Ajuda</h2>

            <?php
            $controller = new ListarOportunidadeController();
            $inscricoes = $controller->listarPorId();
            
            if (empty($inscricoes)) {
                echo "<h2>Nada por aqui!</h2><br><p>Tente novamente mais tarde.</p>";
            }

            else {
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Data Evento</th>
                        <th>Localização</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($inscricoes as $inscricao) {
                        echo "<tr>";
                        echo "<td>{$inscricao['titulo']}</td>";
                        echo "<td>{$inscricao['descricao']}</td>";
                        echo "<td>{$inscricao['status']}</td>";
                        echo "<td>{$inscricao['data_evento']}</td>";
                        echo "<td>{$inscricao['localizacao']}</td>";
                        /*echo "<td>
                                <form action='./atualizar-inscricao' method='post'>
                                    <input type='hidden' name='idInscricao' value='{$inscricao['id']}'>
                                    <input type='hidden' name='status' value='true'>
                                    <button type='submit'>Aceitar</button>
                                </form>
                            </td>";
                        echo "<td>
                                <form action='./atualizar-inscricao' method='post'>
                                    <input type='hidden' name='idInscricao' value='{$inscricao['id']}'>
                                    <input type='hidden' name='status' value='false'>
                                    <button type='submit'>Recusar</button>
                                </form>
                            </td>";*/
                        echo "</tr>";
                    } 
                    
                    echo "</tbody>";
                    echo "</table>";
                ?>
            </table>

            <?php
            }
            ?>
    
        </div>

        <div class="section">
            <h2>Pedir Ajuda</h2>
            <main>
                <form action="./home-organizacao" method="POST">

                <label>Titulo: </label> <input type="text" name="titulo" value =<?= $titulo ?? '' ?> > <br>
                <label>Descrição: </label> <input type="text" name="descricao" value =<?= $descricao ?? '' ?> > <br>
                <label>Data do Evento: </label> <input type="text" name="data" value =<?= $data ?? '' ?> > <br>
                <label>Localização: </label> <input type="text" name="local" value =<?= $local ?? '' ?> > <br>

                <button>Enviar</button>
                </form>
            </main>
        </div>

        <h2>Aprovar Voluntarios</h2>
            <?php 
            $controller = new ListarInscricoesController();
            $inscricoes = $controller->listar();

            if (empty($inscricoes)) {
                echo "<h2>Nada por aqui!</h2><br><p>Tente novamente mais tarde.</p>";
            }
            else {
                echo "<table>";
                echo "<thead>";
                echo "<tr><th>Nome Voluntario</th><th>Telefone</th><th>Oportunidade</th><th>Data Evento</th><th></th><th></th>";
                echo "</thead>";
                echo "<tbody>";
                
                foreach ($inscricoes as $inscricao) {
                    echo "<tr>";
                    echo "<td>{$inscricao['nome']}</td>";
                    echo "<td>{$inscricao['telefone']}</td>";
                    echo "<td>{$inscricao['titulo']}</td>";
                    echo "<td>{$inscricao['data_evento']}</td>";
                    echo "<td>
                            <form action='./atualizar-inscricao' method='post'>
                                <input type='hidden' name='idInscricao' value='{$inscricao['id']}'>
                                <input type='hidden' name='status' value='true'>
                                <button type='submit'>Aceitar</button>
                            </form>
                        </td>";
                    echo "<td>
                            <form action='./atualizar-inscricao' method='post'>
                                <input type='hidden' name='idInscricao' value='{$inscricao['id']}'>
                                <input type='hidden' name='status' value='false'>
                                <button type='submit'>Recusar</button>
                            </form>
                        </td>";
                    echo "</tr>";
                } 
                
                echo "</tbody>";
                echo "</table>";
            }     
        ?>
    </main>
<?php
    include './views/footer.php';
?>
