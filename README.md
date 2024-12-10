# Projeto Voluntariado

Este projeto é uma plataforma de voluntariado que conecta pessoas físicas e organizações. Usuários voluntários podem se inscrever e se candidatar para ajudar em pedidos postados por organizações, enquanto estas podem gerenciar os pedidos de ajuda e avaliar os voluntários.

---

## **Participantes**

- **Bárbara Hoffmam Wosiack**: Controle de login, dashboards de voluntário e organização, cadastro de oportunidades.
- **Luiz Felipe Hildebrant**: Controle de cadastro, listagem de oportunidades, voluntários e organizações, e configuração de rotas.
- **Milena Alves Andrade**: Criação dos arquivos model e banco de dados.

---

## **Instalação**

### **Pré-requisitos**

1. Instale o [XAMPP](https://www.apachefriends.org/) (ou outro servidor com suporte a PHP e MySQL).
2. Clone este repositório para o diretório `htdocs` do XAMPP.

### **Configuração do Banco de Dados**

1. Abra o phpMyAdmin e crie um banco de dados chamado `voluntariado`.
2. Importe o arquivo `voluntariado.sql` para configurar as tabelas.
3. Defina o nome do projeto como `Projeto-Voluntariado`.

### **Configuração do Projeto**

1. Defina os parâmetros de conexão com o banco de dados no arquivo `config.php`, localizado na pasta `src`.

### **Iniciar o Projeto**

1. Instale o Composer seguindo as instruções em [getcomposer.org](https://getcomposer.org/).
2. No terminal do VS Code (dentro da pasta `Projeto-Voluntariado`), execute:
   ```bash
   composer init
   ```
   e preencha os dados necessários.

3. Em seguida, instale o Pecee SimpleRouter:
   ```bash
   composer require pecee/simple-router
   ```

4. Atualize o arquivo `composer.json` adicionando o seguinte bloco:
   ```json
   "autoload": {
       "classmap": ["./"]
   }
   ```

5. Se ocorrerem erros de rota, execute:
   ```bash
   composer dump-autoload
   ```

6. No painel do XAMPP, ative o servidor **Apache** e o **MySQL**.
7. Acesse a aplicação em: [http://localhost/Projeto-Voluntariado](http://localhost/Projeto-Voluntariado).

---

## **Uso**

1. Acesse a página de Login para cadastrar-se como voluntário ou organização.
2. **Voluntários** podem:
   - Visualizar os pedidos de ajuda disponíveis.
   - Avaliar as organizações.
3. **Organizações** podem:
   - Criar pedidos de ajuda.
   - Avaliar voluntários que participaram dos eventos.

---

## **Funcionalidades**

- Cadastro e login.
- Dashboard para voluntários.
- Cadastro em oportunidades de voluntariado.
- Dashboard para organizações.
- Cadastro de oportunidades de voluntariado.
- Aprovação/reprovação de voluntários por organizações.
- Melhorias no login e validação dos dados.

---

## **Bugs e Funcionalidades Faltantes**

- Falhas nas avaliações de organizações e voluntários.
- Página de perfil não implementada.
- CSS ausente nos feedbacks de cadastro.

---
