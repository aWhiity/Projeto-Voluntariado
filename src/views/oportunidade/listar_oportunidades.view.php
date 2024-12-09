
<?php
    $titulo = "Lista de Oportunidades";
    include './views/header.php';
?>
<main>
    <?php 
        require_once '..\\controllers\\listar_oportunidades.controller.php';
        $controller = new ListarOportunidadeController();
        $inscricoes = $controller->listar();

        if (empty($inscricoes)):
            echo "<h2>Nada por aqui!</h2><br><p>Tente novamente mais tarde.</p>";
        else:
            foreach($inscricoes as $inscricao){
                
    ?>
        <div class="container">
            <h3><?=$inscricao['titulo']?></h3>
            <ul>
                <li><?=$inscricao['descricao']?></li>
                <li><?=$inscricao['data_evento']?></li>
                <li><?=$inscricao['localizacao']?></li>
            </ul>
        </div>
    
        <?php 
            }
        endif;
        ?>
    
</main>
<?php
    include './views/footer.php';
?>