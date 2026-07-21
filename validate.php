<?php
// ===================================================
// API DE VALIDAÇÃO DE KEYS - FLY CHAOS
// ===================================================

// Configuração
header('Content-Type: text/plain');
header('Access-Control-Allow-Origin: *');

// Pega a key da URL
$key = $_GET['key'] ?? '';

// ===================================================
// REGRAS DE VALIDAÇÃO:
// 1. Deve começar com "key_script_fly_"
// 2. Deve ter pelo menos 30 caracteres no total
// 3. Deve conter apenas letras minúsculas e números
// ===================================================

function isValidKey($key) {
    // Verifica se começa com o prefixo correto
    if (strpos($key, 'key_script_fly_') !== 0) {
        return false;
    }
    
    // Pega a parte depois do prefixo
    $code = substr($key, 15);
    
    // Verifica se tem pelo menos 10 caracteres
    if (strlen($code) < 10) {
        return false;
    }
    
    // Verifica se contém apenas letras minúsculas e números
    if (!preg_match('/^[a-z0-9]+$/', $code)) {
        return false;
    }
    
    return true;
}

// ===================================================
// VALIDA E RETORNA
// ===================================================

if (isValidKey($key)) {
    echo "VALID";
} else {
    echo "INVALID";
}
?>
