<?php
$archivo = 'registros.txt';

if ($_SERVER["REQUEST_METHOD"] === "POST") { /*SI EL METODO DE ENVIO ES IGUAL, HAS LO SIGUIENTE*/ 
    /*$_POST['name_del_campo']*/
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $sede = $_POST['sede'];
    $tipo = $_POST['tipo'];
    $relacion = $_POST['relacion'];
    $facultad = $_POST['facultad'];
    $asociado = $_POST['asociado'];
    $contexto = $_POST['contexto'];
    $subir = $_POST['subir'];
    $fecha = date("Y-m-d H:i:s");

    $registro = "$fecha | $tipo | $rut | $nombre  $apellido | $email | $sede | $relacion | $facultad | $asociado | $contexto | $subir\n";
    /*                                  agrega el contenido sin borra el anterior | evita que sea modifico por otro proceso*/
    file_put_contents($archivo, $registro, FILE_APPEND | LOCK_EX);
} else {/*Si se intenta abrir el archivo sin enviar el formulario */
    echo "Acceso no permitido.";
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviado</title>
    <link rel="stylesheet" href="enviadoStyle.css">
    <link rel="icon" href="img/webubo.png" type="image/png">
</head>
<body>
<div class="mensaje">
            <h2>Tu <?php echo htmlspecialchars($tipo); ?> fue recibido con éxito.</h2>
            <a class="link" href="ver_registros.php">Ver sugerencias y reclamos anteriores</a>
        </div>
</body>



