# Projeto-Voluntariado
 
Projeto de Plataforma de Voluntariado
Este projeto é uma plataforma de voluntariado que conecta pessoas físicas e organizações. Usuários voluntários podem se inscrever e se candidatar para ajudar em pedidos postados por organizações, enquanto estas podem gerenciar os pedidos de ajuda e avaliar os voluntários.

## Participantes
- Bárbara Hoffmam Wosiack - Controle de login e dashboards de voluntário e organização;
- Luiz Felipe Hildebrant - Controle de cadastro e listagem de oportunidades, voluntários e organizações;
- Milena - Criação dos arquivos model e banco de dados.

## Instalação
Pré-requisitos:

Instale o XAMPP (ou um servidor com suporte a PHP e MySQL).
Clone este repositório para o diretório htdocs do XAMPP.
Configuração do Banco de Dados:

Abra o phpMyAdmin e crie um banco de dados chamado voluntariado.
Importe o arquivo voluntariado.sql para configurar as tabelas.
Configuração do Projeto:

Defina os parâmetros de conexão com o banco de dados no arquivo config.php, localizado na pasta src.
Iniciar o Projeto:

No painel do XAMPP, ative o servidor Apache e o MySQL.
Acesse http://localhost/nomedopastaprojeto no navegador para iniciar a aplicação.


## Uso
Ao acessar a página de Login, o usuário pode cadastrar-se como voluntário ou organização.
Como voluntário, é possível vizualizar os pedidos de ajuda e avaliar organizações.
Como organização, é possível criar pedidos de ajuda e avaliar os voluntários que auxiliaram.


## Funcionalidades
- Cadastro e Login;
- Dashboard para Voluntários;
- Dashboard para Organizações.

## Funcionalidades faltantes
- Conectividade ao banco de dados para visualização das tabelas nas páginas iniciais;
- Cadastro de/para oportunidades;
