<?php
    function convertirEntrada($entrada){
        $numeros = explode (",", str_replace(" ", "",$entrada));
        //str_replace basicamente con los parametros que se le dieron borra los espacios que existan
        //explode cada vez que encuentra una coma lo separa y lo convierte en un array
        $conjunto = [];
       foreach($numeros  as $x){
            if ($numeros !== "" && is_numeric($x)){
                $conjunto[] = (int)$x; //aqui le aplicamos una conversion directa a entero, 
                // puesto que el array existente es de strings                                             
            }   
        }
        $conjunto = array_unique($conjunto);//esta funcion permite elimiar datos repetidos en un array
        sort($conjunto);//los ordena 
        return $conjunto;    
    }
    function mostrarConjuntosIngresados($conjuntoA, $conjuntoB) {
    $a = mostrarConjunto($conjuntoA);
    $b = mostrarConjunto($conjuntoB);
    return "<p><strong>Conjunto A:</strong> $a</p><p><strong>Conjunto B:</strong> $b</p>";
    }
    function mostrarConjunto($conjunto){
        if (empty($conjunto)){    //si no se igresa nada pues esto es lo que arrojara
            return "∅ conjunto vacío";  
        }
        return "{" .implode(",", $conjunto). "}"; //como generlamente algo se ingresa esto es lo que se ejecuta
    }
    function unionConjuntos($conjuntoA,$conjuntoB) {
        $union = array_unique(array_merge($conjuntoA,$conjuntoB)); //el array merge fuciona los dos arrays y el array unique elimina lo que este repetido
        sort($union); // lo ordena
        return $union;//lo que devuelve
    }
    function interseccionConjuntos($conjuntoA,$conjuntoB){
        $interseccion = array_intersect($conjuntoA,$conjuntoB);//el array intersect devuelve lo que coincide en cambos arrays (conjuntos)
        sort($interseccion); //lo ordena
        return $interseccion; //lo que devuelve
    }
    function diferenciaConjuntosAB($conjuntoA,$conjuntoB){
        $diferencia = array_diff($conjuntoA,$conjuntoB);//este array devuelve las diferencias 
        sort($diferencia);
        return $diferencia;
    }
    function diferenciaConjuntosBA($conjuntoA,$conjuntoB){
        $diferencia = array_diff($conjuntoB,$conjuntoA);//este array devuelve las diferencias 
        sort($diferencia);
        return $diferencia;
    }
    //solo cambia el orden en array_diff
?>
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
     <?php
          if ($_POST){
                $conjuntoA = convertirEntrada($_POST['conjuntoA']);
                $conjuntoB = convertirEntrada($_POST['conjuntoB']);
                echo "<h1>Resultados</h1>";
                echo mostrarConjuntosIngresados($conjuntoA, $conjuntoB);
                echo "<h2>UNION DE CONJUNTOS</h2>";  
                echo mostrarConjunto(unionConjuntos($conjuntoA,$conjuntoB));   
                echo "<h2>INTERSECCION DE CONJUNTOS</h2>";
                echo mostrarConjunto(interseccionConjuntos($conjuntoA,$conjuntoB));
                echo "<h2>DIFERENCIA DE CONJUNTOS AB</h2>";
                echo mostrarConjunto(diferenciaConjuntosAB($conjuntoA,$conjuntoB));
                echo "<h2>DIFERENCIA DE CONJUNTOS BA</h2>";
                echo mostrarConjunto(diferenciaConjuntosBA($conjuntoA,$conjuntoB));
            }
        ?>
    </div>
</body>
</html>