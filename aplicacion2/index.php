
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIBOnACHI Y FACTORIAL</title>
</head>
<body>
    <?php if (!isset($_POST['numero']) || $error): ?>
        <h1>Calculadra Matematica</h1>
        <form method="POST">
            <div>
                <label for="numero">Ingresa un numero:</label>
                <input type="number" id="numero" name="numero" min="0" required 
                       value="<?php echo isset($_POST['numero']) ? htmlspecialchars($_POST['numero']) : ''; ?>">
            </div>
            
            <div>
                <label for="operacion">Selecciona la operación:</label>
                <select name="operacion" id="operacion">
                <option value="fibonacci"
                <?php echo (!isset($_POST['operacion']) || $_POST['operacion'] === 'fibonacci') ? 'selected' : ''; ?>>
                Sucesión de Fibonacci
                </option>
                <option value="factorial"
                    <?php echo (isset($_POST['operacion']) && $_POST['operacion'] === 'factorial') ? 'selected' : ''; ?>>
                    Factorial
                    </option>
                 </select>
            </div>
            <button type="submit">calcular</button>
        </form>
    <?php endif; ?>

    <?php if ($error): ?>
        <div>
            <p><?php echo $error; ?></p>
            <a href="calculadora.php">Volver</a>
        </div>
    <?php elseif (isset($resultado)): ?>
        <h1>Resultado</h1>
        <div>
            <h2><?php echo $titulo; ?></h2>
            
            <?php if ($operacionSeleccionada === 'fibonacci'): ?>
                <div>
                    <p>Serie completa:</p>
                    <div>
                        <?php foreach ($resultado as $indice => $valor): ?>
                            <span>
                                <?php echo $valor; ?>
                            </span>
                            <?php if ($indice < count($resultado) - 1): ?>, <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            <?php else: ?>
                <div>
                    <p>
                        <strong><?php echo $numeroIngresado; ?>! = </strong>
                        <?php echo implode('×', $proceso); ?>
                    </p>
                    <p><strong>= <?php echo number_format($resultado); ?></strong></p>
                </div>
            <?php endif; ?>
            
            <a href="calculadora.php">Calcular otro número</a>
        </div>
    <?php endif; ?>   
</body>
</html>

