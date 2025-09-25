<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Convertidor</title>
</head>

<body>
    <h1>Convertidor de numero decimal a binario</h1>

    <div>
        <form method="POST">
            <label for="decimal">Escriba el número decimal a convertir:</label>
            <input type="text" id="decimal" name="decimal" placeholder="Numero decimal" required>

            <button type="submit">Enviar</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $decimal = $_POST['decimal'];
        $binario = decbin($decimal);
        //$binario = convertir($decimal);
        echo "<h2>El numero decimal $decimal en binario es: $binario</h2>";
    }


    /*function convertir($decimal)
    {
        $binario = "";
        while ($decimal > 0) {
            $binario = ($decimal % 2) . $binario; // resto concatenado a la izquierda
            $decimal = intdiv($decimal, 2);       // división entera por 2
        }
        return $binario; // por si el número era 0
    }*/

    ?>
</body>

</html>