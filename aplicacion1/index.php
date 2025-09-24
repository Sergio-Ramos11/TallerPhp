<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1>Generador de Acrónimos</h1>

    <!-- El formulario -->
    <form action="" method="post">
        <!-- Campo de entrada: lo que el usuario escribe -->
        <label for="frase">Escribe una frase:</label>
        <input type="text" id="frase" name="frase" required>

        <!-- Botón para enviar la frase -->
        <button type="submit">Convertir</button>
    </form>

    <?php

    $frase = $_POST['frase'];
    echo "La frase que ingresaste es: " . $frase;

    $array = preg_split('/[\s-]+/', trim($frase));
    //echo "<br>" . implode(", ", $array);
    //implode para pasar de array a string

    $acronimo = "";
    foreach($array as $palabra) {
        $acronimo .= strtoupper($palabra[0]);
    }

    echo "<br>El acrónimo es: " . $acronimo;

    ?>
    <br>

</body>

</html>