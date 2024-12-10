# Projeto-Voluntariado
 
Projeto de Plataforma de Voluntariado
Este projeto é uma plataforma de voluntariado que conecta pessoas físicas e organizações. Usuários voluntários podem se inscrever e se candidatar para ajudar em pedidos postados por organizações, enquanto estas podem gerenciar os pedidos de ajuda e avaliar os voluntários.

## Participantes
- Bárbara Hoffmam Wosiack - Controle de login, dashboards de voluntário e organização, cadastro de oportunidades;
- Luiz Felipe Hildebrant - Controle de cadastro, listagem de oportunidades, voluntários e organizações e configuração de rotas.
- Milena Alves Andrade - Criação dos arquivos model e banco de dados.

## Instalação
Pré-requisitos:

Instale o XAMPP (ou um servidor com suporte a PHP e MySQL).
Clone este repositório para o diretório htdocs do XAMPP.
Configuração do Banco de Dados:

Abra o phpMyAdmin e crie um banco de dados chamado voluntariado.
Importe o arquivo voluntariado.sql para configurar as tabelas.
Defina o nome do projeto como Projeto-Voluntariado.

Configuração do Projeto:
Defina os parâmetros de conexão com o banco de dados no arquivo config.php, localizado na pasta src.
Iniciar o Projeto:

Instale o composer em https://getcomposer.org/
no terminal do vscode (dentro do Projeto-Voluntariado - ver mais nas instruções do XAMPP), dê o comando composer init.
preencha os dados necessários.
em seguida, dê o comando composer require pecee/simple-router
no arquivo composer.json, abaixo de “authors”, escreva 
"autoload": { 
"classmap": ["./"] 
},
No caso de erros de rota, é recomendado usar o comando composer dump-autoload


No painel do XAMPP, ative o servidor Apache e o MySQL.
Acesse http://localhost/Projeto-Voluntariado no navegador para iniciar a aplicação.

## Uso
Ao acessar a página de Login, o usuário pode cadastrar-se como voluntário ou organização.
Como voluntário, é possível visualizar os pedidos de ajuda e avaliar organizações.
Como organização, é possível criar pedidos de ajuda e avaliar os voluntários que auxiliaram.


## Funcionalidades
- Cadastro e login;
- Dashboard para voluntários;
- Cadastro em oportunidades de voluntariado;
- Dashboard para organizações;
- Cadastro de oportunidades de voluntariado;
- Organizações podem aprovar/reprovar o cadastro de um voluntário;
- Melhorias no login e validação dos dados.

## Bugs e Funcionalidades faltantes
- Falhas nas avaliações de organizações e voluntários.
- Página de perfil não implementada.
- CSS não implementado nos feedbacks de cadastro.


