Painel Admin Pro: Login & Cadastro Seguro

🔹 Visão Geral

O Painel Admin Pro é um projeto minimalista e focado em segurança para a criação de áreas administrativas restritas.

Desenvolvido em PHP, ele demonstra a implementação correta de um sistema de autenticação, utilizando o padrão PDO para comunicação com o banco de dados e as funções de criptografia nativas do PHP para proteção de senhas.
⚙️ Características e Segurança

Este projeto prioriza a segurança e boas práticas:

    🔒 Criptografia de Senha (Hashing): Utiliza a função password_hash() para nunca armazenar senhas em texto puro no banco de dados, e password_verify() para a validação segura.

    🛡️ Segurança contra SQL Injection: Emprega Prepared Statements com o PDO em todos os processos de Login (processa_login.php) e Cadastro (processa_cadastro.php).

    🌐 Gerenciamento de Sessão: Uso correto das variáveis $_SESSION para controlar o estado de login e restringir o acesso à página admin.php.

    💅 Interface Amigável: Design moderno e responsivo com a integração do framework Bootstrap 5.

💻 Tecnologias Utilizadas
Categoria	Tecnologia	Versão
Backend	PHP	7.4+
Banco de Dados	MySQL/MariaDB	-
Conexão	PDO	Nativo PHP
Frontend	Bootstrap	5.3
🚀 Instalação e Configuração
1. Requisitos

Certifique-se de que você tem um ambiente de servidor local rodando (XAMPP, WAMP ou MAMP) com PHP e MySQL ativos.
2. Configuração do Banco de Dados

    Acesse seu phpMyAdmin ou cliente SQL.

    Crie um novo banco de dados chamado painel_admin.

    Execute o seguinte script SQL para criar a tabela usuarios com o campo senha no formato VARCHAR(255) (necessário para o hash da senha):

SQL

-- Garante que você está no banco de dados correto
USE `painel_admin`;

-- Criação da Tabela de Usuários
CREATE TABLE `usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(100) NOT NULL UNIQUE,
  `senha` VARCHAR(255) NOT NULL,
  `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

3. Ajuste de Conexão

Abra o arquivo conexao.php e verifique se as credenciais correspondem ao seu ambiente local:
PHP

// Arquivo: conexao.php
$host = 'localhost'; 
$db   = 'painel_admin'; 
$user = 'root'; // Seu usuário MySQL
$pass = ''; // Sua senha MySQL

🔑 Como Utilizar

    Cadastro: Acesse o index.php e clique em "Cadastre-se aqui". Crie um novo usuário.

    Login: Após o cadastro, o sistema o redirecionará para a tela de login (index.php). Insira suas credenciais.

    Acesso Restrito: Se o login for bem-sucedido, você será redirecionado para a área restrita: admin.php.

    Logout: O arquivo logout.php garante que a sessão seja destruída, encerrando o acesso seguro.

🤝 Contribuições

Sinta-se à vontade para sugerir melhorias, como validações front-end mais robustas ou mais funcionalidades de backend.
