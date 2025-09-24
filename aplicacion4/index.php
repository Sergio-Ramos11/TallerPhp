<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conjuntos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div>
        <h1>Calculadora de Conjuntos</h1>
        <p>Esta aplicacion te permitira calcular union interseccion y diferencia entre dos Conjuntos</p>
    </div>
    <div>
        <form method = "POST">
            <label for = "conjuntoA">Numeros del conjunto A(Separelos con comas):</label>
            <input type = "text" name= "conjuntoA" id="conjuntoA" placeholder="ej: 1 , 2 , 3 , 4 , ......" required>
            <br>
            <label for = "conjuntoB">Numeros del conjunto B(Separelos con comas):</label>
            <input type = "text" name= "conjuntoB" id="conjuntoB" placeholder="ej: 1 , 2 , 3 , 4 , ......" required>
            <button type="submit">Calcular</button>
        </form>
    </div>
    <div>
    </div>
</body>
</html>


