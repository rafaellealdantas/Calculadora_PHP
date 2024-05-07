<?php
session_start();

$num1 = $_GET['num1'] ?? null;
$num2 = $_GET['num2'] ?? null;
$operacao = $_GET['operacao'] ?? null;

if ($num1 !== null && $num2 !== null && $operacao !== null && !isset($_SESSION['resultado'])) {
    switch ($operacao) {
        case '+':
            $resultado = $num1 + $num2;
            break;
        case '-':
            $resultado = $num1 - $num2;
            break;
        case '/':
            if ($num2 == 0) {
                $resultado = "divisão por zero é inválida";
            } else {
                $resultado = $num1 / $num2;
            }
            break;
        case '*':
            $resultado = $num1 * $num2;
            break;
        case '^':
            $resultado = pow($num1, $num2);
            break;
        case 'n!':
            $resultado = fatorial($num1);
            break;
        default:
            $resultado = "operação inválida";
            break;
    }

    // Adiciona o cálculo ao histórico
    $_SESSION['historico'][] = "$num1 $operacao $num2 = $resultado";
    $_SESSION['resultado'] = $resultado;
} elseif (!isset($_SESSION['resultado'])) {
    unset($_SESSION['historico']);
    $resultado = null;
} else {
    $resultado = $_SESSION['resultado'];
}

function fatorial($numero) {
    if ($numero <= 1) {
        return 1;
    } else {
        return $numero * fatorial($numero - 1);
    }
}

// Apagar histórico
if (isset($_GET['apagar'])) {
    unset($_SESSION['historico']);
    unset($_SESSION['resultado']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="site">
    <div class="cabeçalho">
        <h1>CALCULADORA PHP</h1>
    </div>
    <form action="" method="get">
        <div class="balao1"></div>
        <input type="text" name="num1" id="num1">

        <select name="operacao" id="operacao">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value=""></option>
            <option value="/">/</option>
            <option value="^">^</option>
            <option value="n!">n!</option>
        </select>

        <div class="balao2"></div>
        <input type="text" name="num2" id="num2">

        <button id="calcular">Calcular</button>
    </form>
    <div class="resultado">
        <?php
        if (isset($resultado)) {
            echo $resultado;
        }
        ?>
    </div>
    <form action="" method="get">
        <button type="submit" name="apagar" id="apagar">Apagar Histórico</button>
        <!-- Botões movidos para o lado do botão "Apagar Histórico" -->
        <button id="salvar">Salvar</button>
        <button id="pegar">Pegar Valores</button>
        <button id="M">M</button>
    </form>
    <div class="historico">
        <h1>Histórico</h1>
        <?php
        if (isset($_SESSION['historico'])) {
            foreach ($_SESSION['historico'] as $calculado) {
                echo "<p>$calculado</p>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>