<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

try {

    $id_carro = $_POST['id'];
    $id_cliente = $_POST['id_c'];
    $total_piezas = $_POST['TbTotalPrecio'];
    $mano_de_obra = $_POST['TbManoDeObra'];

    $base = new PDO('mysql:host=localhost; dbname=manolo', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    // Informacion del taller
    echo "<br>";
    echo " &nbsp;&nbsp;&nbsp;&nbsp; TALLER MANOLO <br>";
    echo " &nbsp;&nbsp;&nbsp;&nbsp; MECANICA DIESEL GASOLINA <br>";
    echo " &nbsp;&nbsp;&nbsp;&nbsp; PROP: Joel Ernesto Lopez Verdugo <br>";
    echo " &nbsp;&nbsp;&nbsp;&nbsp; R.F.C: LOVJ750725L18 <br>";

    // Informacion del cliente
    $sql = "SELECT NOMBRE, APELLIDO, CELULAR, EMPRESA, RFC 
            FROM CLIENTES
            WHERE ID = '$id_cliente'";

    $resultado = $base->prepare($sql);
    $resultado->execute();

    $registro = $resultado->fetch();

    echo
    " <br>
    &nbsp;&nbsp;&nbsp;&nbsp; NOMBRE DEL CLIENTE: " . $registro['NOMBRE'] . " " . $registro['APELLIDO'] . " <br>
    &nbsp;&nbsp;&nbsp;&nbsp; CELULAR: " . $registro['CELULAR'] . " <br>
    &nbsp;&nbsp;&nbsp;&nbsp; EMPRESA: " . $registro['EMPRESA'] . " &nbsp;&nbsp;&nbsp;&nbsp; R.F.C: " . $registro['RFC'] . " <br>
    ";

    // Informacion de las refacciones
    $sql = "SELECT NOMBRE, PRECIO
            FROM REFACCIONES
            WHERE ID_CARRO = '$id_carro'";
        
    $resultado = $base->prepare($sql);
    $resultado->execute();

    $vueltas = 0;
    $total_piezas = 0;

    while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {

        if($vueltas == 0)
            echo "  &nbsp;&nbsp;&nbsp;&nbsp; D E S C R I P C I O N  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; IMPORTE  <br>";

        echo "  &nbsp;&nbsp;&nbsp;&nbsp; " . $registro['NOMBRE'] . "  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; $" . $registro['PRECIO'] . ".00  <br>";
        
        $vueltas = $vueltas + 1;
        $total_piezas = $total_piezas + $registro['PRECIO'];

    }

    $TOTAL = $mano_de_obra + $total_piezas;

    // Informacion de mano de obra
    echo "  &nbsp;&nbsp;&nbsp;&nbsp; MANO DE OBRA  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; $ " . $mano_de_obra . ".00 <br>";

    // TOTAL
    echo "  &nbsp;&nbsp;&nbsp;&nbsp; TOTAL  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; $ " . $TOTAL . ".00 <br>";


} catch (Exception $e) {

    die ("Error: " . $e->getMessage());

}

$base = null;

?>

</body>
</html>