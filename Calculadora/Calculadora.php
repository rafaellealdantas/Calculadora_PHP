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
            <option value="*">*</option>
            <option value="/">/</option>
        </select>  

        <div class="balao2"></div>
        <input type="text" name="num2" id="num2">  
        
        <button id="calcular">calcular</button>
    </form>
</div>
</body>
</html>
<?php
$num1 = $_GET['num1'];
echo $num1
?>