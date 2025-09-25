<?php
// creamos una clase para representar un noto del arbol binario.
class NodoArbol {
    public $valor;
    public $hijoIzquierdo;
    public $hijoDerecho;
    
    public function __construct($valor) {
        $this->valor = $valor;
        $this->hijoIzquierdo = null;
        $this->hijoDerecho = null;
    }
}
function construirArbolDesdePreordenInorden($preorden, $inorden) {// esta fucion sirve para crear un arbol a partir del preorden y el Inorden
    if (empty($preorden) || empty($inorden)) {
        return null;
    }

    $valorRaiz = array_shift($preorden);// array_shift busca el primer elemento en este caso del preorden, lo elimina y devuelve su valor
    $nodoRaiz = new NodoArbol($valorRaiz); // aquí crea un nuevo nodo y lo asigna en la variable nodo raiz

    $posicionRaiz = array_search($valorRaiz, $inorden);//busca el valorRaiz en el array de inorden y devuelve su posicion en la que se encuentra

    $inordenSubarbolIzquierdo = array_slice($inorden, 0, $posicionRaiz);//basicamente lo que esta a lado izquierdo de la raiz($posicionRaiz) es el subabol Izquierdo
    $inordenSubarbolDerecho = array_slice($inorden, $posicionRaiz + 1);//basicamente lo que esta a lado derecho de la raiz($posicionRaiz)es el subabol derecho

    $preordenSubarbolIzquierdo = array_slice($preorden, 0, count($inordenSubarbolIzquierdo));// Dividir el preorden en subárbol izquierdo
    $preordenSubarbolDerecho = array_slice($preorden, count($inordenSubarbolIzquierdo));// Dividir el preorden en subárbol derecho
    // Construir recursivamente los subárboles
    $nodoRaiz->hijoIzquierdo = construirArbolDesdePreordenInorden($preordenSubarbolIzquierdo, $inordenSubarbolIzquierdo);//accede a un atributo del objeto nodo raiz y construlle el arbol
    $nodoRaiz->hijoDerecho = construirArbolDesdePreordenInorden($preordenSubarbolDerecho, $inordenSubarbolDerecho);//accede a un atributo del objeto nodo raiz y construlle el arbol

    return $nodoRaiz;
}
// Función para construir árbol a partir de recorrido Postorden e Inorden , hace lo mismo que lo anterio solo que utliza otro recorrido
function construirArbolDesdePostordenInorden($postorden, $inorden) {
    if (empty($postorden) || empty($inorden)) {
        return null;
    }

    // El último elemento del postorden siempre es la raíz
    $valorRaiz = array_pop($postorden);
    $nodoRaiz = new NodoArbol($valorRaiz);

    // Encontrar la posición de la raíz en el recorrido inorden
    $posicionRaiz = array_search($valorRaiz, $inorden);

    // Dividir el inorden en subárbol izquierdo y derecho
    $inordenSubarbolIzquierdo = array_slice($inorden, 0, $posicionRaiz);
    $inordenSubarbolDerecho = array_slice($inorden, $posicionRaiz + 1);

    // Dividir el postorden en subárbol izquierdo y derecho
    $postordenSubarbolIzquierdo = array_slice($postorden, 0, count($inordenSubarbolIzquierdo));
    $postordenSubarbolDerecho = array_slice($postorden, count($inordenSubarbolIzquierdo));

    // Construir recursivamente los subárboles
    $nodoRaiz->hijoIzquierdo = construirArbolDesdePostordenInorden($postordenSubarbolIzquierdo, $inordenSubarbolIzquierdo);
    $nodoRaiz->hijoDerecho = construirArbolDesdePostordenInorden($postordenSubarbolDerecho, $inordenSubarbolDerecho);

    return $nodoRaiz;
}
// Función para mostrar árbol de forma horizontal
function mostrarArbolHorizontal($nodo, $nivel = 0) {
    if ($nodo == null) {
        return;
    }
    
    mostrarArbolHorizontal($nodo->hijoDerecho, $nivel + 1);
    
    echo str_repeat("           ", $nivel);
    echo $nodo->valor . "<br>";
    
    mostrarArbolHorizontal($nodo->hijoIzquierdo, $nivel + 1);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arboles</title>
    <link rel ="stylesheet" href = "estilos.css">
</head>
<body>
    <div> 
        <h1>Constructor de Arboles Binarios</h1>   
        <p> OJO > Debes ingresar dos recorridos, (preorden+inorden) o (postorden+inorden) </p>
    </div>
    <div> 
        <form method="POST" >
            <label for = "preorden">Preorden (Separelo con comas)</label>
            <input type= "text" name ="preorden" id= "preorden" placeholder="ej: A,B,C,D,E......">
            <br><br>
            <label for = "inorden">Inorden (Separelo con comas)</label>
            <input type= "text" name ="inorden" id= "inorden" placeholder="ej: D,B,E,A,C......" required>
            <br><br>
            <label for = "postorden">Postorden (Separelo con comas)</label>
            <input type= "text" name ="postorden" id= "postorden" placeholder="ej: D,E,B,C,A......">
            <button type="submit">Construir Arbol</button>
        </form>
    </div>
    <br>
    
        <?php
        if ($_POST) {
            echo "<div>";
            echo '<h2>Resultados</h2>';
            // Limpiar y procesar los datos de entrada
            $preordenEntrada = !empty($_POST['preorden']) ? 
            explode(",", str_replace(" ", "", $_POST['preorden'])) : [];
            $inordenEntrada = !empty($_POST['inorden']) ? 
            explode(",", str_replace(" ", "", $_POST['inorden'])) : [];
            $postordenEntrada = !empty($_POST['postorden']) ? 
            explode(",", str_replace(" ", "", $_POST['postorden'])) : [];
            $arbolConstruido = null;
            $metodoConstruccion = "";
            // Determinar qué método de construcción usar
            if (!empty($preordenEntrada) && !empty($inordenEntrada)) {
            $arbolConstruido = construirArbolDesdePreordenInorden($preordenEntrada, $inordenEntrada);
            $metodoConstruccion = "Preorden + Inorden";
            } elseif (!empty($postordenEntrada) && !empty($inordenEntrada)) {
            $arbolConstruido = construirArbolDesdePostordenInorden($postordenEntrada, $inordenEntrada);
            $metodoConstruccion = "Postorden + Inorden";
            } 
            // Mostrar resultados si el árbol fue construido
            echo "</div>";
            if ($arbolConstruido) {
                echo '<br><br>';
                echo '<div class="arbol_visualizacion">';
                echo "<h3>Arbol Construido con: " . $metodoConstruccion . "</h3>";
                echo 'Estructura del árbol (Visualización Horizontal):<br>';
    
                mostrarArbolHorizontal($arbolConstruido);
                echo '</div>';
           }   
        }
        ?>
</body>
</html>