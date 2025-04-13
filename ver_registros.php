<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="phpstyle.css"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamos y Sugerencias</title>
    <link rel="icon" href="img/webuno.png" type="image/png">
</head>
    <body>
        <?php
        $archivo = 'registros.txt';
        echo "<h1>Listado de sugerencias y reclamos</h1>";

        if (file_exists($archivo)) {/*Si el archivo existe*/
            $lineas = file($archivo);/*carga el archivo y convierte cada lina en un elemento de un arreglo*/
            echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
            echo "<tr><th>Fecha</th><th>Tipo</th><th>RUT</th><th>Nombre</th><th>Email</th><th>Sede</th><th>Relación</th><th>Facultad</th><th>Asociado a</th><th>Mensaje</th><th>Archivo</th></tr>";
            foreach ($lineas as $linea) { /*recorre todas las líneas del archivo*/
                $datos = explode(" | ", $linea);/*separa cada línea, ahora datos guardara cada dato*/ 
                echo "<tr>";
                foreach ($datos as $i =>$dato ) {
                    if($i == 3){/*si el nombre es muy largo, lo muestra abreviado visualmente*/
                        echo "<td  class=truncate-cell title='"  . htmlspecialchars($dato) .  "' >" . htmlspecialchars($dato) . "</td>";
                    }else{
                            echo "<td>" . htmlspecialchars($dato) . "</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay registros aún.</p>";
        }
        echo '<iframe src="reclamos.html" width="100%" height="500px" style="border:1px solid #ccc; margin-top: 20px;"></iframe>';
        ?>

        <div>
        <a href="reclamos.html" class="btn">Volver</a>  
        </div>

    <div class="footer-derechos">
        <p>&copy; 2025 Universidad X. Todos los derechos reservados.</p> 
    </div>
    </body>
</html>
