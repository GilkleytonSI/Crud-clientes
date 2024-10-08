# CRUD de Clientes em PHP Orientado a Objetos

Este projeto é uma aplicação CRUD (Create, Read, Update, Delete) simples para gerenciar clientes. Ele utiliza PHP com orientação a objetos, conectando-se a um banco de dados MySQL para armazenar, listar, atualizar e excluir clientes.


## Estrutura do Projeto

O projeto segue a arquitetura MVC (Model-View-Controller), separando as responsabilidades em três camadas principais:

 - Modelo (Model): Responsável pela interação com o banco de dados.

 - Controlador (Controller): Processa as requisições e chama o modelo.

 - Visão (View): Interface que o usuário interage diretamente, exibindo os dados e recebendo entradas.


 ## Estrutura dos Arquivos
- Cliente.php: Classe que define o modelo de cliente e a lógica de negócios.

- ClienteController.php: Controlador responsável por receber os dados da View e interagir com o modelo.

- Database.php: Classe para estabelecer a conexão com o banco de dados MySQL.

- index.php: Página principal que exibe o formulário e a tabela de clientes.

- README.md: Este arquivo de documentação.

## Requisitos

- PHP 7.x ou superior.
- Servidor Web (Apache, Nginx, etc.).
- MySQL.
- Extensão PDO habilitada no PHP.

## Instalação

1 - Clone o repositório ou faça o download dos arquivos.

    https://github.com/GilkleytonSI/Crud-clientes.git

2 - Configure seu banco de dados MySQL:

    * Crie um banco de dados chamado - clientes_db.
    * Execute o script SQL abaixo para criar a tabela:
    
    CREATE TABLE clientes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
    );


3 - Configure as credenciais do banco de dados no arquivo Database.php:

    private $host = "localhost";
    private $db_name = "clientes_db";
    private $username = "root";
    private $password = "";


4 - Coloque os arquivos do projeto em seu servidor web e acesse o index.php pelo navegador.

## Funcionalidades

* Criar Cliente: Adicione novos clientes preenchendo o formulário com nome e email.
* Listar Clientes: Exibe uma tabela com todos os clientes cadastrados.
* Atualizar Cliente: Atualize os dados de um cliente existente.
* Excluir Cliente: Remova um cliente da lista.
* Responsividade: Layout adaptado para telas de diferentes tamanhos, desde desktops até smartphones.
* Interface moderna: Inclui ícones de ação (edição e exclusão) e estilos minimalistas.

## Tecnologias Utilizadas

* PHP (Orientado a Objetos)
* MySQL (Banco de dados)
* HTML5 e CSS3 (para a estrutura e estilização da interface)
* Font Awesome (para ícones)
* CSS Externo: O estilo foi separado para um arquivo CSS, melhorando a organização do código.
* Responsividade: Utilizamos media queries para adaptar o layout a dispositivos móveis.

# Estrutura do Código

## Modelo: Cliente.php

- Esta classe contém os métodos principais para manipular os dados do cliente:

* criar(): Insere um novo cliente no banco de dados.
* ler(): Retorna todos os clientes cadastrados.
* atualizar(): Atualiza os dados de um cliente existente.
* excluir(): Remove um cliente do banco de dados.

## Controlador: ClienteController.php

- O controlador interage com a classe Cliente e processa as entradas da interface:

* criarCliente($nome, $email): Chama o método criar do modelo.
* listarClientes(): Chama o método ler para obter todos os clientes.
* atualizarCliente($id, $nome, $email): Atualiza os dados do cliente.
* excluirCliente($id): Exclui um cliente específico.

## Visão: index.php

- A interface que o usuário vê, composta por:

* Um formulário para adicionar novos clientes.
* Uma tabela que exibe a lista de clientes cadastrados com opções para excluir/editar.

## Melhorias Futuras

* Adicionar a funcionalidade de atualização diretamente na interface.
* Melhorar o design com frameworks CSS como Bootstrap ou Tailwind.
* Implementar validação de dados no frontend e backend.
* Utilizar AJAX para operações CRUD sem recarregar a página.

## Contribuição

Sinta-se à vontade para fazer um fork do projeto e enviar pull requests para melhorias ou correções.
