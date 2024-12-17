<?php
function factorial($n) {
    $fact = 1;
    for ($i = 1; $i <= $n; $i++) $fact *= $i;
    return $fact;
}

function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i <= sqrt($n); $i++) if ($n % $i == 0) return false;
    return true;
}

function serieMatematica($n) {
    $resultado = 0;
    for ($i = 1; $i <= $n; $i++) {
        $signo = ($i % 2 == 0) ? -1 : 1;
        $resultado += $signo * (pow($i, 2) / factorial($i));
    }
    return $resultado;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $option = $_POST['option'];
    $num = intval($_POST['num']);
    if ($num < 0 || $num > 10) die("Número fuera de rango.");

    switch ($option) {
        case '1': echo "Factorial de $num: " . factorial($num); break;
        case '2': echo "$num " . (isPrime($num) ? "es primo" : "no es primo"); break;
        case '3': echo "Serie Matemática: " . serieMatematica($num); break;
    }
    echo "<br><a href='menu1.php'>Volver</a>";
} else {
?>
<form method="POST">
    <label>Elige una opción:</label>
    <select name="option">
        <option value="1">Factorial</option>
        <option value="2">Primo</option>
        <option value="3">Serie Matemática</option>
    </select>
    <br>
    <label>Número (0-10):</label>
    <input type="number" name="num" min="0" max="10" required>
    <br>
    <button type="submit">Calcular</button>
</form>
<?php } ?>
