<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel = "stylesheet" href="./estilos.css">
</head>
<body>
<div>
    <div>
        <h1>FIBONACHI O  FACTORIAL</h1>
        <form method = "POST">
            <label for ="numero">Porfavor Ingresa un numero :</label>
            <br> 
            <input type = "number" name= "numero" id = "numero" min = "0" required>
            <br>
            <label for= "operacion" >Porfavor Ingresa una operacion</label>
            <select name="operacion" id = "operacion">
            <option value = "FIBONACCI">FIBONACCI</option>
            <option value = "FACTORIAL">FACTORIAL</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
        </form>
    </div>
</div> 
</body>
</html>

