
<?php
    $titulo = "Cadastrar Voluntario";
    include '../header.php';
?>
<main>
    <?php 
        require_once '..\\controllers\\listar_oportunidades.controller.php';
        $controller = new ListarOportunidadeController();
        $oportunidades = $controller->listar();

        if (empty($oportunidades)):
            echo "<h2>Nada por aqui!</h2><br><p>Tente novamente mais tarde.</p>";
        else:
            foreach($oportunidades as $oportunidade){
                
    ?>
        <div class="container">
            <h3><?=$oportunidade['titulo']?></h3>
            <ul>
                <li><?=$oportunidade['descricao']?></li>
                <li><?=$oportunidade['data_evento']?></li>
                <li><?=$oportunidade['localizacao']?></li>
            </ul>
        </div>
    
        <?php 
            }
        endif;
        ?>
    
</main>
</body>
</html>