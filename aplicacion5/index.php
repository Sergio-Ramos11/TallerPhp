<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Convertidor</title>
</head>

<body>
    <h1>Convertidor de numero entero a binario</h1>

    <div>
        <form method="POST">
            <label for="entero">Escriba el número entero a convertir:</label>
            <input type="text" id="entero" name="entero" placeholder="Numero entero" required>

            <button type="submit">Enviar</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $entero = $_POST['entero'];
        $binario = decbin($entero);
        //$binario = convertir($entero);
        echo "<h2>El numero entero $entero en binario es: $binario</h2>";
    }


    /*function convertir($entero)
    {
        $binario = "";
        while ($entero > 0) {
            $binario = ($entero % 2) . $binario; // resto concatenado a la izquierda
            $entero = intdiv($entero, 2);       // división entera por 2
        }
        return $binario; // por si el número era 0
    }*/

    ?>
</body>

</html>