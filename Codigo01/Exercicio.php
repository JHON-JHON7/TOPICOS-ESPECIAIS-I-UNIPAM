<?php
// Declaração das variáveis conforme solicitado

// Primeira variável: atribuindo um número real (float)
$numeroReal = 124.45;

// Segunda variável: atribuindo um texto (string)
$textoVariavel = "Olá, este é um texto de exemplo!";

// Exibindo os tipos das variáveis para verificação
echo "Tipo da primeira variável: " . gettype($numeroReal) . "\n";
echo "Tipo da segunda variável: " . gettype($textoVariavel) . "\n";
echo "Separador: " . str_repeat("-", 40) . "\n";

// Verificação se a primeira variável é do tipo inteiro
if (is_int($numeroReal)) {
    // Caso verdadeiro: imprime o conteúdo das duas variáveis
    echo "A primeira variável É do tipo inteiro!\n";
    echo "Conteúdo da primeira variável (número): " . $numeroReal . "\n";
    echo "Conteúdo da segunda variável (texto): " . $textoVariavel . "\n";
} else {
    // Caso falso: informa que a primeira variável não é inteira
    echo "A primeira variável NÃO é do tipo inteiro.\n";
    echo "Tipo atual: " . gettype($numeroReal) . "\n";
    echo "Valor atual: " . $numeroReal . "\n";
}

echo "\n" . str_repeat("=", 50) . "\n";

// Exemplo adicional: testando com um número inteiro
echo "EXEMPLO COM NÚMERO INTEIRO:\n";

// Alterando a primeira variável para um inteiro
$numeroReal = 42; // Agora é um inteiro

echo "Tipo da primeira variável após alteração: " . gettype($numeroReal) . "\n";

// Nova verificação
if (is_int($numeroReal)) {
    echo "Agora a primeira variável É do tipo inteiro!\n";
    echo "Conteúdo da primeira variável (número): " . $numeroReal . "\n";
    echo "Conteúdo da segunda variável (texto): " . $textoVariável . "\n";
} else {
    echo "A primeira variável ainda NÃO é do tipo inteiro.\n";
}

?>