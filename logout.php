<?php
// Inicia a sessão (obrigatório para manipulação)
session_start();

// Limpa todas as variáveis da sessão
session_unset();

// Destrói a sessão no servidor
session_destroy();

// Redireciona para a página de login
header('Location: index.php');
exit;
?>