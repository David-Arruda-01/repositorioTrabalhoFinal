<?php

// Verifique se o script está sendo executado no modo de desenvolvimento
define('ENVIRONMENT', 'development'); // Mudar para 'production' para bloquear acesso

if (ENVIRONMENT !== 'development') {
    die("Este script só pode ser executado no modo de desenvolvimento.");
}

// Configurações do banco de dados
$host = 'localhost';
$user = 'seu_usuario';
$password = 'sua_senha';

// Função para conectar ao banco de dados MySQL
function connectToDatabase($host, $user, $password) {
    try {
        $pdo = new PDO("mysql:host=$host", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
}

// Função para listar os arquivos SQL disponíveis na pasta "sql"
function listSqlFiles($directory) {
    $files = glob($directory . "/*.sql");
    if (empty($files)) {
        die("Nenhum arquivo SQL encontrado na pasta 'sql'.\n");
    }
    return $files;
}

// Função para ler o conteúdo do arquivo SQL
function readSqlFile($filePath) {
    if (!file_exists($filePath)) {
        die("Arquivo não encontrado: $filePath\n");
    }
    return file_get_contents($filePath);
}

// Função para executar o SQL
function executeSql($pdo, $sql) {
    try {
        $pdo->exec($sql);
        echo "SQL executado com sucesso!\n";
    } catch (PDOException $e) {
        echo "Erro ao executar o SQL: " . $e->getMessage() . "\n";
    }
}

// Início do script
echo "Conectando ao banco de dados MySQL...\n";
$pdo = connectToDatabase($host, $user, $password);

echo "Conexão bem-sucedida.\n";

// Listando arquivos SQL disponíveis
$sqlDirectory = __DIR__ . '/sql';
$sqlFiles = listSqlFiles($sqlDirectory);

echo "Arquivos SQL disponíveis:\n";
foreach ($sqlFiles as $index => $file) {
    echo "[" . ($index + 1) . "] " . basename($file) . "\n";
}

// Pergunta ao usuário qual arquivo deseja executar
echo "Digite o número do arquivo SQL que você deseja executar: ";
$choice = intval(fgets(STDIN)) - 1;

if (!isset($sqlFiles[$choice])) {
    die("Seleção inválida.\n");
}

$selectedFile = $sqlFiles[$choice];
echo "Você escolheu o arquivo: " . basename($selectedFile) . "\n";

// Ler e executar o conteúdo do arquivo SQL
$sqlContent = readSqlFile($selectedFile);
executeSql($pdo, $sqlContent);

?>