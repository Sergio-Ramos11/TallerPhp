<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Acrónimos</title>
</head>

<body>
    <h1>Generador de Acrónimos</h1>

    <body>
        <form action="" method="post">
            <!-- Campo de entrada: lo que el usuario escribe -->
            <label for="frase">Escribe una frase:</label>
            <input type="text" id="frase" name="frase" required>

            <!-- Botón para enviar la frase -->
            <button type="submit">Convertir</button>
        </form>
    </body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $frase = $_POST['frase'];
        echo "<h2>La frase que ingresaste es: " . $frase . "</h2>";

        $array = preg_split('/[\s-]+/', trim($frase));
        //echo "<br>" . implode(", ", $array);
        //implode para pasar de array a string

        $acronimo = "";
        foreach ($array as $palabra) {
            $acronimo .= strtoupper($palabra[0]);
        }

        echo "<br><h2>El acrónimo es: " . $acronimo . "</h2>";
    }

    ?>
    <br>

</body>

</html>