# Projeto-Voluntariado
 
Projeto de Plataforma de Voluntariado
Este projeto é uma plataforma de voluntariado que conecta pessoas físicas e organizações. Usuários voluntários podem se inscrever e se candidatar para ajudar em pedidos postados por organizações, enquanto estas podem gerenciar os pedidos de ajuda e avaliar os voluntários.

## Participantes
- Bárbara Hoffmam Wosiack - Controle de login e dashboards de voluntário e organização;
- Luiz Felipe Hildebrant - Controle de cadastro e listagem de oportunidades, voluntários e organizações;
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

No painel do XAMPP, ative o servidor Apache e o MySQL.
Acesse http://localhost/Projeto-Voluntariado no navegador para iniciar a aplicação.


## Uso
Ao acessar a página de Login, o usuário pode cadastrar-se como voluntário ou organização.
Como voluntário, é possível vizualizar os pedidos de ajuda e avaliar organizações.
Como organização, é possível criar pedidos de ajuda e avaliar os voluntários que auxiliaram.


## Funcionalidades
- Cadastro e Login;
- Dashboard para Voluntários;
- Dashboard para Organizações.

## Bugs e Funcionalidades faltantes
- Listar_organizacao.model e listar_voluntario.model não estão ligados a controller e view.
- Bug no pedido de ajuda de voluntariado na homeOrganizacao.
- Falhas nas avaliações de organizações e voluntários.
- Página de perfil não implementada.
- Bugs nas páginas iniciais.
