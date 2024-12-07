<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        require '../vendor/autoload.php';

        use Pecee\SimpleRouter\SimpleRouter;

        // Define o prefixo para as rotas
        SimpleRouter::group(['prefix' => '/Projeto-Voluntariado/src'], function () {
            SimpleRouter::get('/', 'LoginController@verificar');
            SimpleRouter::post('/','LoginController@validarLogin');

            SimpleRouter::get('/home-pessoa','HomeVoluntarioController@index');
            SimpleRouter::get('/home-','HomeVoluntarioController@index');

            
            SimpleRouter::get('/home-organizacao','HomeOrganizacaoController@index');
            SimpleRouter::get('/home-o','HomeOrganizacaoController@index');

            
            /*SimpleRouter::get('/home-pessoa', function() {
                echo '<h1>Pong</h1>';
            });*/

            /*SimpleRouter::get('/home-pessoa', function() {
                require '../views/homePessoa.view.php';
            });*/
        });

        SimpleRouter::start();
        
    ?>
</body>
</html>
