<?php

    function calcularfibonacci($numero){ //funcion con parametro numero ingresado por el ususario
        $serie = [];// array vacio
        if($numero === 0 ) {
            echo "Pediste 0 elementos de la sucesion de FIBONACCI";
            return[];
        }
      
        if($numero >= 1) $serie[] = 0 ; //agrega el cero siempre a nuestro array 
        if($numero >= 2) $serie[] = 1 ; //agrega el 1 a nuestro array  
        for ($indice = 2 ; $indice < $numero; $indice++){
            $serie[] = $serie[$indice-1] + $serie[$indice-2] ;
        }
        return $serie;
    }   

    function calcularFactorial($numero){
        if ($numero == 0 || $numero == 1){
            return [ 'resultado' => 1, 'proceso' => [1]  // inmeditamente devuelve 1 y mostramos el proceso también 
            ]; //el return anterio es un array asociativo donde se asigna entre comillas sencillas una clave y luego con => un valor 

        } //si el usuario ingresa 1 o 0 , el factorial de cero simepre sea 1 

        $resultado = 1;
        $proceso = []; //creamos un array vacio 
        for($contador = $numero; $contador >= 1 ; $contador--){//esta iteracion basicamente disminuye ne base al numero que ingreso el usuaio 
            $resultado *= $contador;
            $proceso[] = $contador;
        
        }
        return ['resultado' => $resultado, 'proceso' => $proceso];

        //cuando la iteracion llega a cero , ya no se ejecuta por que no 
        //cumpliria la condicion de que el contador sea mayor o igual que 1
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel = "stylesheet" href="estilos.css">
</head>
<body>
    <div>
        <h1>FIBONACCI O  FACTORIAL</h1>
        <form method = "POST">
            <label for ="numero">Porfavor Ingresa un numero :</label>
            <br> 
            <input type = "number" name= "numero" id = "numero" min = "0" required>
            <br>
            <label for= "operacion" >Porfavor Ingresa una operacion:</label>
            <select name="operacion" id = "operacion">
            <option value = "FIBONACCI">FIBONACCI</option>
            <option value = "FACTORIAL">FACTORIAL</option>
            </select>
            <br><br>
            <input type="submit" value="Calcular">
        </form>
    </div>
    <div>
     <?php
        if ($_POST){
            $numero = (int)$_POST['numero'];
            $operacion= $_POST['operacion'];
            echo "<h1>RESULTADOS</h1>";

            if ($operacion == "FIBONACCI" ){    
                $serie = calcularfibonacci($numero);//se calcula fibonacci respecto al numero ingresado
                echo "<h2>Terminos solicitados >$numero<  </h2>";//se crea un titulo
                echo "<p>" . implode(" - ", $serie). "</p>";//implode separa los elementos del array 
            }elseif ($operacion == "FACTORIAL") {//esto tiene la misma logica
            $resultado = calcularFactorial($numero);
            echo "<h2>Factorial del $numero ! </h2>";
            echo "<p> Proceso:" . implode( " x ", $resultado['proceso']) . "</p>";
            echo "<p> = {$resultado['resultado'] } </p>";
            }
        }
     ?>
    </div>              
</body>
</html>

