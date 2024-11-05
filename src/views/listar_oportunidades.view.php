<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    <style>
        .container{
            padding: 10px;
        }
    </style>

    <title>Listar Oportunidades</title>
</head>
<body>
    <header><h1>Listar Oportunidade</h1></header>

    <main>
        <?php 
            require_once 'C:\\xampp\\htdocs\\Projeto-Voluntariado\\src\\controllers\\listar_oportunidades.controller.php';
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