<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../aplicacion3/estilo.css">
    <title>Document</title>
</head>
<body>

    <h1>Media, mediana y moda</h1>
    
    <form method="post">
        <label for="cantidad">Escriba los numeros que desee separados por un espacio</label>
        <input type="text" id="cantidad" name="cantidad" required>

        <button type="submit">Enviar</button>
    </form>


    <?php

    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        $cantidad = $_POST['cantidad'];
        $cantidad = explode(" ", $cantidad);
    }

    $rmedia = media($cantidad);
    $rmediana = mediana($cantidad);
    $rmoda = moda($cantidad);
    echo $rmedia. "<br>";
    echo $rmediana. "<br>";
    echo $rmoda;


    function media($cantidad){
        $n = count($cantidad);
        $suma = array_sum($cantidad);
        $media = $suma / $n;
        return $media;
    }

    function mediana($cantidad){
        if(count($cantidad) % 2 == 1){
            sort($cantidad);
            $n = $cantidad[(count($cantidad) - 1) / 2];
            return $n;
        }else if(count($cantidad) % 2 == 0){
            sort($cantidad);
            $n1 = $cantidad[count($cantidad) / 2];
            $n2 = $cantidad[(count($cantidad) / 2) - 1];
            return ($n1 + $n2) / 2;
        }
    }

    function moda($cantidad){
        $valores = array_count_values($cantidad);
        $moda = array_search(max($valores), $valores);
        $modaArray = [];
        foreach($valores as $val => $value){
            if($value == $valores[$moda]){
                array_push($modaArray, $val);
                $resultado = implode(", ", $modaArray);
            }
        }
        return $resultado;
    }

    ?>

</body>
</html>