<?php
function fibonacci($n) {
    $a = 1; $b = 1;
    echo "Serie Fibonacci: 1 1";
    for ($i = 3; $i <= $n; $i++) {
        $c = $a + $b;
        echo " $c";
        $a = $b; $b = $c;
    }
}

function cuboDigitos($max) {
    $resultados = [];
    for ($i = 1; $i <= $max; $i++) {
        $sum = array_sum(array_map(function($d) {
            return pow($d, 3);
        }, str_split($i)));
        
        if ($sum == $i) $resultados[] = $i;
    }
    return $resultados;
}

function calcularFraccion($a, $b, $c, $d) {
    return $a + ($b * $c) - $d;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $option = $_POST['option'] ?? '';
    switch ($option) {
        case '1':
            $num = intval($_POST['num'] ?? 0);
            if ($num < 1 || $num > 50) {
                echo "Número fuera de rango (1-50).";
            } else {
                fibonacci($num);
            }
            break;
        case '2':
            $numeros = cuboDigitos(1000000);
            echo "Números que cumplen la condición: " . implode(", ", $numeros);
            break;
        case '3':
            $a = intval($_POST['a'] ?? 0);
            $b = intval($_POST['b'] ?? 0);
            $c = intval($_POST['c'] ?? 0);
            $d = intval($_POST['d'] ?? 0);
            echo "Resultado: " . calcularFraccion($a, $b, $c, $d);
            break;
        default:
            echo "Seleccione una opción válida.";
    }
    echo "<br><a href='menu2.php'>Volver</a>";
} else {
?>
<form method="POST">
    <label>Opción:</label>
    <select name="option" required>
        <option value="">Selecciona...</option>
        <option value="1">Fibonacci</option>
        <option value="2">Cubo de Dígitos</option>
        <option value="3">Fraccionarios</option>
    </select>
    <br><br>
    <label>Número (1-50):</label>
    <input type="number" name="num" min="1" max="50">
    <br><br>
    <br><br>
    <button type="submit">Calcular</button>
</form>
<?php
}
?>
