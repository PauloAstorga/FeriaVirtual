<?php

    session_start();
    include 'resources/php/db.php';

            $codigo = 18;
            $puesto = 3;
            $cero = 0;
            $consulta = "SELECT * FROM producto WHERE codigo = ? AND codigo_puesto =?";
            $resultado = mysqli_prepare($conexion, $consulta);

            if (!$resultado) {
                echo "Error con resultado: ".mysqli_error($conexion);
            }

            $ok = mysqli_stmt_bind_param($resultado, "ii", $codigo,$puesto);
                $ok = mysqli_stmt_execute($resultado);

            if (!$ok) {
                echo "Error con ok: ".mysqli_error($conexion);
            }

            echo "Antes de ok: ";
            $ok = mysqli_stmt_bind_result($resultado, $cod, $categoria, $nombre, $descripcion, $precio, $imagen, $cantidad, $codpues);
            echo "Despues de ok: ";
            while(mysqli_stmt_fetch($resultado)) {
                                     echo "Dentro del primer while: ";
                                    $resultado->free_result();
                                    
                                    $consulta = "SELECT tipo FROM categoria";
                                    $resultado2 = mysqli_query($conexion, $consulta);
                                    while ($fila = mysqli_fetch_row($resultado2)) {
                                                echo "<br>Dentro del segundo while: ";
                                                 echo "".$fila[0];
                                            }
                                            
                                        
            
            }
            echo "Despues del while ";
?>