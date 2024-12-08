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
            //login
            SimpleRouter::get('/', 'LoginController@verificar');
            SimpleRouter::post('/','LoginController@validarLogin');
            //home pessoa
            SimpleRouter::get('/home-pessoa','HomeVoluntarioController@index');
            //cadastro de voluntario
            SimpleRouter::get('/cadastro-voluntario','VoluntarioFormController@index');   
            SimpleRouter::post('/cadastro-voluntario','VoluntarioFormController@construtor');
            //cadastro de organizaçao
            SimpleRouter::get('/cadastro-organizacao','OrganizacaoFormController@index');
            SimpleRouter::post('/cadastro-organizacao','OrganizacaoFormController@construtor');
            //home organizaçao
            SimpleRouter::get('/home-organizacao','HomeOrganizacaoController@index');
            //pedir ajuda (organizaçao)
            SimpleRouter::post('/home-organizacao','OportunidadeFormController@construtor');
            //botão sair
            SimpleRouter::post('/sair','LogoutController@sair');

            SimpleRouter::get('/home-organizacao','HomeOrganizacaoController@index');
            
            SimpleRouter::get('/listar-oportunidade','ListarOportunidadeController@index');

            SimpleRouter::get('/cadastro-inscricao','CadastrarInscricaoController@index');
            SimpleRouter::post('/cadastro-inscricao', 'CadastrarInscricaoController@construtor');


            
            
            /*SimpleRouter::get('/cadastro-voluntario', function() {
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
