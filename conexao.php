<?php
// Define as credenciais de conexão
$host = 'localhost'; 
$db   = 'painel_admin'; 
$user = 'root'; 
$pass = ''; // Senha padrão é vazia no XAMPP/WAMP
$charset = 'utf8mb4';

$dsn = "mysql:host={$host};dbname={$db};charset={$charset}";
$options = [
    // Lança exceções em caso de erros SQL
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // Define o modo de busca padrão para array associativo
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Desativa a emulação de prepared statements para segurança
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     // Exibe erro e encerra o script se a conexão falhar
     die("Erro de Conexão com o Banco de Dados: {$e->getMessage()}");
}
?>