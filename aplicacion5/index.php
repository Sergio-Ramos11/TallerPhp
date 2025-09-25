<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Convertidor</title>
</head>
<body>
    <h1>Convertidor de numero decimal a binario</h1>

    <form method="POST">
        <label for="decimal">Escriba el número decimal a convertir:</label>
        <input type="text" id="decimal" name="decimal" placeholder="Numero decimal" required>
        
        <button type="submit">Enviar</button>
    </form>


    <?php
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $decimal = $_POST['decimal'];
            $binario = decbin($decimal);
            echo "El numero decimal $decimal en binario es: $binario";
        }
    ?>
</body>
</html>